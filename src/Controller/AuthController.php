<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthController extends AbstractController
{
	private $em;

	public function __construct(EntityManagerInterface $entityManager)
	{
		$this->em = $entityManager;
	}

	/**
	 * @Route(
	 *     name="user_register",
	 *     path="/api/register",
	 *     methods={"POST"}
	 * )
	 *
	 * @param Request $request
	 * @param UserPasswordEncoderInterface $encoder
	 * @return Response
	 */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        if ($this->em->getRepository(User::class)->findBy(['username' => $username])) return new JsonResponse(['error' => 'Ce nom d\'utilisateur est déjà utilisé']);

        $user = new User();
		$user->setUsername($username);
		$user->setPassword($encoder->encodePassword($user, $password));

		$this->em->persist($user);
		$this->em->flush();

		return new JsonResponse(['success' => 'Utilisateur bien enregistré']);
    }
}