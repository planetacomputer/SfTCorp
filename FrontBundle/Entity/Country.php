<?php
namespace TechCorp\FrontBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
*  @ORM\Table(name="country")
*  @ORM\Entity
*/

class Country{
	/**
	*  @var decimal $id
	*  
	*  @ORM\Column(name="id", type="bigint", nullable=false)
	*  @ORM\Id
	*  @ORM\GeneratedValue(strategy="IDENTITY")
	*/
	protected $id;

	/**
	*  @var ArrayCollection $cities
	*  
	*  @ORM\OneToMany(targetEntity="City", mappedBy="country")
	*/
	protected $cities;

	public function __construct(){
		$this->cities = new ArrayCollection();
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
     * Add cities
     *
     * @param \TechCorp\FrontBundle\Entity\City $cities
     * @return Country
     */
    public function addCity(\TechCorp\FrontBundle\Entity\City $cities)
    {
        $this->cities[] = $cities;

        return $this;
    }

    /**
     * Remove cities
     *
     * @param \TechCorp\FrontBundle\Entity\City $cities
     */
    public function removeCity(\TechCorp\FrontBundle\Entity\City $cities)
    {
        $this->cities->removeElement($cities);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCities()
    {
        return $this->cities;
    }
}
