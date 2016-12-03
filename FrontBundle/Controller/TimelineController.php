<?php
namespace TechCorp\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TechCorp\FrontBundle\Entity\Status;
use TechCorp\FrontBundle\Form\StatusType;


class TimelineController extends Controller{

	public function timelineAction(){
		$em = $this->getDoctrine()->getManager();
		$statuses = $em->getRepository('TechCorpFrontBundle:Status')->getStatusesAndUsers(true);
		return $this->render('TechCorpFrontBundle:Timeline:timeline.html.twig', array(
			'statuses' => $statuses,
			));
	}

	public function userTimelineAction(Request $request, $userId){
		$em = $this->getDoctrine()->getManager();
		// 1)Recuperer l'utilisateur courant
		$user = $em->getRepository('TechCorpFrontBundle:User')->findOneById($userId);
		if(!$user){
			$this->createNotFoundException("Utilisateur non trouvé");
		}
		// 2) Creer le formulaire
		$authenticatedUser = $this->get('security.token_storage')->getToken()->getUser();
		$status = new Status();
		$status->setDeleted(false);
		$status->setUser($authenticatedUser);

		$form = $this->createForm('TechCorp\FrontBundle\Form\StatusType', $status);
		//$request = $this->getRequest();

		$form->handleRequest($request);
		//echo $form["content"]->getData()." ".$status->getContent();
		// 3) Traiter le formulaire
		if($authenticatedUser && $form->isValid()){
			$em->persist($status);
			$em->flush();
			$this->redirect($this->generateUrl(
				'tech_corp_front_user_timeline', array(
					'userId' => $authenticatedUser->getId())));
		}
		$statuses = $em->getRepository('TechCorpFrontBundle:Status')->getUserTimeline($user)->getResult();

		return $this->render('TechCorpFrontBundle:Timeline:user_timeline.html.twig',
			array(
				'user' => $user,
				'statuses' => $statuses,
				'form' => $form->createView()
			)
		);
	}

	public function friendsTimelineAction($userId){ 
		$em = $this->getDoctrine()->getManager(); $user =
		$em->getRepository('TechCorpFrontBundle:User')->findOneById($userId);
		if(!$user){ 
			$this->createNotFoundException('Utilisateur pas trouvé'); 
		}
		$statuses = $em->getRepository('TechCorpFrontBundle:Status')
				->getFriendsTimeline($user)->getResult();

		return $this->render('TechCorpFrontBundle:Timeline:friends_timeline.html.twig',
			array(
				'user' => $user,
				'statuses' => $statuses
		));

	}
}