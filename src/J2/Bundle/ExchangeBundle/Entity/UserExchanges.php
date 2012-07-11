<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * J2\Bundle\ExchangeBundle\Entity\UserExchanges
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="J2\Bundle\ExchangeBundle\Entity\UserExchangesRepository")
 */
class UserExchanges
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $userID
     *
     * @ORM\Column(name="userID", type="integer")
     */
    private $userID;

    /**
     * @var integer $exchangeID
     *
     * @ORM\Column(name="exchangeID", type="integer")
     */
    private $exchangeID;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;


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
     * Set userID
     *
     * @param integer $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * Get userID
     *
     * @return integer 
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * Set exchangeID
     *
     * @param integer $exchangeID
     */
    public function setExchangeID($exchangeID)
    {
        $this->exchangeID = $exchangeID;
    }

    /**
     * Get exchangeID
     *
     * @return integer 
     */
    public function getExchangeID()
    {
        return $this->exchangeID;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set active
     *
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }
}