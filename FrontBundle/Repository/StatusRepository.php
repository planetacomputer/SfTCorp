<?php
namespace TechCorp\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class StatusRepository extends EntityRepository{
	public function getStatusesAndUsers($deleted){
		//Metodo DQL
		/*return $this->_em->createQuery('
			SELECT s, u
			FROM TechCorpFrontBundle:Status s
			JOIN s.user u
			WHERE 
				s.deleted = :deleted
			ORDER BY
				s.createdAt DESC,
				s.id DESC
		')
		->setParameter('deleted', $deleted)->getResult();*/

		//Metodo QueryBuilder
		return $this->_em->createQueryBuilder()
			->select('s', 'u')
			->from("TechCorpFrontBundle:Status", 's')
			->join("s.user", 'u')
			->orderBy('s.createdAt', 'DESC')
			->getQuery()->getResult();
		
	}

	public function getFriendsTimeline($user){
		/*return $this->_em->createQueryBuilder()
			->select('s')
			->from("TechCorpFrontBundle:User", 'u')
			->join("u.friends", 'f')
			->where('user = ?', $user
			->orderBy('u.createdAt', 'DESC')
			->getQuery()->getResult();*/
		return $this->_em->createQuery('
			SELECT s, c, u
			FROM TechCorpFrontBundle:Status s
			LEFT JOIN s.comments c
			LEFT JOIN c.user u
			WHERE s.user IN (
				SELECT friends FROM
				TechCorpFrontBundle:User uf
				JOIN uf.friends friends
				WHERE uf = :user
				)
				ORDER BY
					s.createdAt DESC
			')
			->setParameter('user', $user);
	}

	public function getUserTimeline($user){
		return $this->_em->createQuery('
			SELECT s
			FROM TechCorpFrontBundle:Status s
			LEFT JOIN s.comments c
			LEFT JOIN c.user u
			WHERE 
				s.user = :user
				AND s.deleted = false
			ORDER BY
				s.createdAt DESC
		')->setParameter('user', $user);
	}
}