<?php
namespace TechCorp\FrontBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
*  @ORM\Table(name="reduction_code")
*  @ORM\Entity
*/

class ReductionCode{
	/**
	*  
	*  @ORM\Column(name="id", type="bigint", nullable=false)
	*  @ORM\Id
	*  @ORM\GeneratedValue(strategy="IDENTITY")
	*/
	protected $id;

	/**
	*  @var ArrayCollection ReductionCode $clients
	*  Inverse Side
	*  @ORM\ManyToMany(targetEntity="Client", mappedBy="reductionCodes")
	*/

	protected $clients;

	public function __construct(){
		$this->clients = new ArrayCollection();
	}

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
     * Add clients
     *
     * @param \TechCorp\FrontBundle\Entity\Client $clients
     * @return ReductionCode
     */
    public function addClient(\TechCorp\FrontBundle\Entity\Client $clients)
    {
        $this->clients[] = $clients;

        return $this;
    }

    /**
     * Remove clients
     *
     * @param \TechCorp\FrontBundle\Entity\Client $clients
     */
    public function removeClient(\TechCorp\FrontBundle\Entity\Client $clients)
    {
        $this->clients->removeElement($clients);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClients()
    {
        return $this->clients;
    }
}
