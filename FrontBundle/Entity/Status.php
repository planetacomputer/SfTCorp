<?php
namespace TechCorp\FrontBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use TechCorp\FrontBundle\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Status
 *
 * @ORM\Table(name="tech_status")
 * @ORM\Entity(repositoryClass="TechCorp\FrontBundle\Repository\StatusRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Status
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="statuses")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    **/
    protected $user;

    /**
    * @ORM\OneToMany(targetEntity="Comment", mappedBy="status")
    **/
    protected $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(max=255)
     */
    private $content;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean", options={"default":"0"})
     */
    private $deleted;

    public function __construct(){
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set content
     *
     * @param string $content
     * @return Status
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
     * Set deleted
     *
     * @param boolean $deleted
     * @return Status
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
    * @var \DateTime
    *
    * @ORM\Column(name="created_at", type="datetime")
    * @Assert\DateTime
    */
    private $createdAt;

    /**
    * @var \DateTime
    *
    * @ORM\Column(name="updated_at", type="datetime")
    * @Assert\DateTime
    */
    private $updatedAt;

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Status
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Status
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**     
     * @ORM\PrePersist
     */
    public function PrePersistEvent(){
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**     
     * @ORM\PreUpdate
     */
    public function PreUpdateEvent(){
        $this->updatedAt = new \DateTime();
    }

    /**
     * Set user
     *
     * @param \TechCorp\FrontBundle\Entity\User $user
     *
     * @return Status
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

    /**
     * Add comment
     *
     * @param \TechCorp\FrontBundle\Entity\Comment $comment
     *
     * @return Status
     */
    public function addComment(\TechCorp\FrontBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \TechCorp\FrontBundle\Entity\Comment $comment
     */
    public function removeComment(\TechCorp\FrontBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
