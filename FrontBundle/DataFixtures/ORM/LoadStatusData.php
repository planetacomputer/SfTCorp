<?php
namespace TechCorp\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use TechCorp\FrontBundle\Entity\Status;

class LoadStatusData implements FixtureInterface{
	const MAX_NB_STATUS = 50;
	public function load(ObjectManager $manager){

		for($i = 0; $i < self::MAX_NB_STATUS; ++$i){
			$status = new Status();
			$status->setContent('lorem ipsum...');
			$status->setDeleted(false);

			$manager->persist($status);
		
		}
		/*
		$status = new Status();
		$status->setContent('lorem ipsum...');
		$status->setDeleted(false);

		$manager->persist($status);

		$status2 = new Status();
		$status2->setContent('Salut tout le monde!');
		$status2->setDeleted(true);

		$manager->persist($status2);
		*/
		$manager->flush();
	}
}