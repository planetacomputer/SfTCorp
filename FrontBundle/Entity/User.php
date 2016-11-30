<?php
namespace TechCorp\FrontBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use TechCorp\FrontBundle\Entity\Status;
use Doctrine\ORM\Mapping as ORM;

/**
*  @ORM\Table(name="user")
*  @ORM\Entity
*/

class User extends BaseUser{
	/**
    *  @ORM\Id  
	*  @ORM\Column(type="integer")
	*  @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;

    /**
    *  @ORM\OneToMany(targetEntity="Status", mappedBy="user")
    **/
    protected $statuses;

    public function __construct(){
        parent::__construct();
        $this->statuses = new ArrayCollection();
        $this->friends = new ArrayCollection();
        $this->friendsWithMe = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    /**
    *  @ORM\ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
    *  @ORM\JoinTable(
    *      name="friends",
    *      joinColumns={@ORM\JoinColumn(name="id", referencedColumnName="id")},
    *      inverseJoinColumns={
    *        @ORM\JoinColumn(name="friend_user_id",
    *                       referencedColumnName="id")
    *      }
    *   )
    **/
    private $friends;


    /**
    *  @ORM\ManyToMany(targetEntity="User", mappedBy="friends")
    **/
    private $friendsWithMe;

    /**
    * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
    **/
    protected $comments;


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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Add status
     *
     * @param \TechCorp\FrontBundle\Entity\Status $status
     *
     * @return User
     */
    public function addStatus(\TechCorp\FrontBundle\Entity\Status $status)
    {
        $this->statuses[] = $status;

        return $this;
    }

    /**
     * Remove status
     *
     * @param \TechCorp\FrontBundle\Entity\Status $status
     */
    public function removeStatus(\TechCorp\FrontBundle\Entity\Status $status)
    {
        $this->statuses->removeElement($status);
    }

    /**
     * Get statuses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * Add friend
     *
     * @param \TechCorp\FrontBundle\Entity\User $friend
     *
     * @return User
     */
    public function addFriend(\TechCorp\FrontBundle\Entity\User $friend)
    {
        $this->friends[] = $friend;

        return $this;
    }

    /**
     * Remove friend
     *
     * @param \TechCorp\FrontBundle\Entity\User $friend
     */
    public function removeFriend(\TechCorp\FrontBundle\Entity\User $friend)
    {
        $this->friends->removeElement($friend);
    }

    /**
     * Get friends
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFriends()
    {
        return $this->friends;
    }

    /**
     * Add friendsWithMe
     *
     * @param \TechCorp\FrontBundle\Entity\User $friendsWithMe
     *
     * @return User
     */
    public function addFriendsWithMe(\TechCorp\FrontBundle\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe[] = $friendsWithMe;

        return $this;
    }

    /**
     * Remove friendsWithMe
     *
     * @param \TechCorp\FrontBundle\Entity\User $friendsWithMe
     */
    public function removeFriendsWithMe(\TechCorp\FrontBundle\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe->removeElement($friendsWithMe);
    }

    /**
     * Get friendsWithMe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFriendsWithMe()
    {
        return $this->friendsWithMe;
    }

    /**
     * hasFriend friend
     *
     * @param \TechCorp\FrontBundle\Entity\User $friend
     * @return boolean
     */
     public function hasFriend(\TechCorp\FrontBundle\Entity\User $friend){
        return $this->friends->contains($friend);
     }

     /**
     * canAddFriend friend
     *
     * @param \TechCorp\FrontBundle\Entity\User $friend
     * @return boolean
     */
     public function canAddFriend(\TechCorp\FrontBundle\Entity\User $friend){
        return $this!=$friend && !$this->hasFriend($friend);
     }


    /**
     * Add comment
     *
     * @param \TechCorp\FrontBundle\Entity\Comment $comment
     *
     * @return User
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
