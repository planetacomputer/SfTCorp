<?php
namespace TechCorp\FrontBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
*  @ORM\Table(name="city")
*  @ORM\Entity
*/

class City{
	/**
	*  @var decimal $identifiantDepartement
	*  
	*  @ORM\Column(name="id", type="bigint", nullable=false)
	*  @ORM\Id
	*  @ORM\GeneratedValue(strategy="IDENTITY")
	*/
	protected $id;

	/**
	*  
	*  @ORM\ManyToOne(targetEntity="Country", inversedBy="cities")
	*/
	protected $country;


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
     * Set country
     *
     * @param \TechCorp\FrontBundle\Entity\Country $country
     * @return City
     */
    public function setCountry(\TechCorp\FrontBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \TechCorp\FrontBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }
}
