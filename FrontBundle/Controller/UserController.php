<?php
namespace TechCorp\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller{
	private function manageFriendAction($friendId, $addFriend = true){
		$em = $this->getDoctrine()->getManager();
		$friend = $em->getRepository('TechCorpFrontBundle:user')->findOneById($friendId);
		$authenticatedUser = $this->get('security.token_storage')->getToken()->getUser();
		if(!$friend){
			return new Response("Utilisateur non existant", 400);
		}
		if(!$authenticatedUser){
			return new Response("Authetification necessaire", 401);
		}

		if($addFriend){
			if(!$authenticatedUser->hasFriend($friend)){
				$authenticatedUser->addFriend($friend);
			}
		}
		else{
			$authenticatedUser->removeFriend($friend);
		}

		$em->persist($authenticatedUser);
		$em->flush();
		return new Response("OK");
	}

	public function addFriendAction($friendId){
		return $this->manageFriendAction($friendId, true);
	}

	public function removeFriendAction($friendId){
		return $this->manageFriendAction($friendId, false);
	}
}