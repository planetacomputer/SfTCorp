<?php
namespace TechCorp\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class StaticController extends Controller{

	public function homepageAction(){
		return new Response("Hello World!");
	}

}