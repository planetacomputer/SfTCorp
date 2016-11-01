<?php
namespace TechCorp\FrontBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
*  @ORM\Table(name="company")
*  @ORM\Entity
*/

class Company{
	/**
	*  
	*  @ORM\Column(name="id", type="bigint", nullable=false)
	*  @ORM\Id
	*  @ORM\GeneratedValue(strategy="IDENTITY")
	*/
	protected $id;

	/**
	*  @ORM\OneToOne(targetEntity="Address")
	*/

	protected $address;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set address
     *
     * @param \TechCorp\FrontBundle\Entity\Address $address
     * @return Company
     */
    public function setAddress(\TechCorp\FrontBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \TechCorp\FrontBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }
}
