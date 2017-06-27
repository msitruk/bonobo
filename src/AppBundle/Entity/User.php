<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Famille;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    public $id;

    /**
    * @ORM\Column(type="integer")
    */
    protected $age;

    /**
    * @ORM\ManyToOne(targetEntity="Famille")
    * @ORM\JoinColumn(name="famille_id", referencedColumnName="id")
    * )
    */
    protected $famille;

    /**
    * @ORM\ManyToOne(targetEntity="Race")
    * @ORM\JoinColumn(name="race_id", referencedColumnName="id")
    */
    protected $race;

    /**
    * @ORM\ManyToOne(targetEntity="Food")
    * @ORM\JoinColumn(name="food_id", referencedColumnName="id")
    */
    protected $food;

    /**
    * Many Users have Many Users.
    * @ORM\ManyToMany(targetEntity="User", mappedBy="myFriends")
    */
    private $friendsWithMe;

    /**
    * Many Users have many Users.
    * @ORM\ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
    * @ORM\JoinTable(name="friends",
    *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
    *      inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id", referencedColumnName="id")}
    *      )
    */
    private $myFriends;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->friendsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myFriends = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set famille
     *
     * @param \AppBundle\Entity\Famille $famille
     *
     * @return User
     */
    public function setFamille(\AppBundle\Entity\Famille $famille = null)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return \AppBundle\Entity\Famille
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set race
     *
     * @param \AppBundle\Entity\Race $race
     *
     * @return User
     */
    public function setRace(\AppBundle\Entity\Race $race = null)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return \AppBundle\Entity\Race
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set food
     *
     * @param \AppBundle\Entity\Food $food
     *
     * @return User
     */
    public function setFood(\AppBundle\Entity\Food $food = null)
    {
        $this->food = $food;

        return $this;
    }

    /**
     * Get food
     *
     * @return \AppBundle\Entity\Food
     */
    public function getFood()
    {
        return $this->food;
    }

    /**
     * Add friendsWithMe
     *
     * @param \AppBundle\Entity\User $friendsWithMe
     *
     * @return User
     */
    public function addFriendsWithMe(\AppBundle\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe[] = $friendsWithMe;

        return $this;
    }

    /**
     * Remove friendsWithMe
     *
     * @param \AppBundle\Entity\User $friendsWithMe
     */
    public function removeFriendsWithMe(\AppBundle\Entity\User $friendsWithMe)
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
     * Add myFriend
     *
     * @param \AppBundle\Entity\User $myFriend
     *
     * @return User
     */
    public function addMyFriend(\AppBundle\Entity\User $myFriend)
    {
        $this->myFriends[] = $myFriend;

        return $this;
    }

    /**
     * Remove myFriend
     *
     * @param \AppBundle\Entity\User $myFriend
     */
    public function removeMyFriend(\AppBundle\Entity\User $myFriend)
    {
        $this->myFriends->removeElement($myFriend);
    }

    /**
     * Get myFriends
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMyFriends()
    {
        return $this->myFriends;
    }
}
