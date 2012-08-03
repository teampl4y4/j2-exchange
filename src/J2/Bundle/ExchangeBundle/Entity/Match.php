<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * J2\Bundle\ExchangeBundle\Entity\Match
 *
 * @ORM\Table(name="matches")
 * @ORM\Entity(repositoryClass="J2\Bundle\ExchangeBundle\Entity\MatchRepository")
 */
class Match
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float $price
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var integer $available
     *
     * @ORM\Column(name="available", type="integer")
     */
    private $available;
    
    /**
     * Offers
     *
     * @ORM\ManyToMany(targetEntity="Offer")
     * @ORM\JoinTable(
     *      joinColumns={@ORM\JoinColumn(name="match_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="offer_id", referencedColumnName="id")}
     * )
     */
    private $offers;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    public function __construct()
    {
        parent::__construct();
        $this->createdAt = new \DateTime();
        $this->active    = true;
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
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
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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

    /**
     * Set price
     *
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set available
     *
     * @param integer $available
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    }

    /**
     * Get available
     *
     * @return integer 
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Get Offers
     * @return ArrayCollection
     */
    public function getOffers()
    {
        return $this->offers;
    }
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}