<?php
namespace TechCorp\FrontBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
*  @ORM\Table(name="address")
*  @ORM\Entity
*/

class Address{
	/**
	*  
	*  @ORM\Column(name="id", type="bigint", nullable=false)
	*  @ORM\Id
	*  @ORM\GeneratedValue(strategy="IDENTITY")
	*/
	protected $id;

	/**
	*  Get id
	*  @return integer
	*/
	public function getId(){
		return $this->id;
	}
}
