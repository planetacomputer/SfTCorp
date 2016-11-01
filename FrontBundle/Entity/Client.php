<?php
namespace TechCorp\FrontBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
*  @ORM\Table(name="client")
*  @ORM\Entity
*/

class Client{
	/**
	*  
	*  @ORM\Column(name="idClient", type="bigint", nullable=false)
	*  @ORM\Id
	*  @ORM\GeneratedValue(strategy="IDENTITY")
	*/
	protected $id;

	/**
	*  @var ArrayCollection Produit $produits
	*  Owning Side
	*
	*  @ORM\ManyToMany (targetEntity="ReductionCode", inversedBy="clients", cascade={"persist", "merge"})
	*  @ORM\JoinTable(name="Acheter",
	*    joinColumns={@ORM\JoinColumn(name="client_id", referencedColumnName="id")},
	*    inverseJoinColumns={@ORM\JoinColumn(name="reduction_id", referencedColumnName="id")})
	*/

	protected $reductionCodes;

	public function __construct(){
		$this->reductionCodes = new ArrayCollection();
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
     * Add reductionCodes
     *
     * @param \TechCorp\FrontBundle\Entity\ReductionCode $reductionCodes
     * @return Client
     */
    public function addReductionCode(\TechCorp\FrontBundle\Entity\ReductionCode $reductionCodes)
    {
        $this->reductionCodes[] = $reductionCodes;

        return $this;
    }

    /**
     * Remove reductionCodes
     *
     * @param \TechCorp\FrontBundle\Entity\ReductionCode $reductionCodes
     */
    public function removeReductionCode(\TechCorp\FrontBundle\Entity\ReductionCode $reductionCodes)
    {
        $this->reductionCodes->removeElement($reductionCodes);
    }

    /**
     * Get reductionCodes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReductionCodes()
    {
        return $this->reductionCodes;
    }
}
