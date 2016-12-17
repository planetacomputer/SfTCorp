<?php
namespace TechCorp\FrontBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
*  @ORM\Table(name="comment")
*  @ORM\Entity
*  @ORM\HasLifecycleCallbacks
*/

class Comment{

    /**
    * @ORM\PrePersist
    **/
    public function prePersistEvent(){
        $this->createdAt = new \DateTime();
    }

	/**
	*  @var integer
	*  
	*  @ORM\Column(name="id", type="integer")
	*  @ORM\Id
	*  @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $id;

	/**
	*  
	*  @ORM\ManyToOne(targetEntity="Country", inversedBy="cities")
	*/
	protected $country;


    /**
     * @var string
     *
     *  @ORM\Column(name="content", type="string", length=255)
     *  @Assert\NotBlank
     *  @Assert\Length(max=255)
     */
    private $content;


    /**
     * @var \DateTime
     *
     *  @ORM\Column(name="created_at", type="datetime")
     *  @Assert\DateTime
     */
    private $createdAt;

    /**
    *  @ORM\ManyToOne(targetEntity="Status", inversedBy="comments")
    *  @ORM\JoinColumn(name="status_id", referencedColumnName="id")
    */
    protected $status;

    /**
    *  @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
    *  @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    protected $user;


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
     * Set content
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Comment
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set country
     *
     * @param \TechCorp\FrontBundle\Entity\Country $country
     *
     * @return Comment
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

    /**
     * Set status
     *
     * @param \TechCorp\FrontBundle\Entity\Status $status
     *
     * @return Comment
     */
    public function setStatus(\TechCorp\FrontBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \TechCorp\FrontBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set user
     *
     * @param \TechCorp\FrontBundle\Entity\User $user
     *
     * @return Comment
     */
    public function setUser(\TechCorp\FrontBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TechCorp\FrontBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
