<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * J2\Bundle\ExchangeBundle\Entity\Company
 *
 * @ORM\Table(name="companies")
 * @ORM\Entity(repositoryClass="J2\Bundle\ExchangeBundle\Entity\CompanyRepository")
 */
class Company
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * Deal
     *
     * @ORM\ManyToMany(targetEntity="Deal", mappedBy="companies")
     */
    protected $deals;
    
    /**
     * Exchanges
     *
     * @ORM\ManyToMany(targetEntity="Exchange")
     * @ORM\JoinTable(
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="exchange_id", referencedColumnName="id")}
     * )
     */
    protected $exchanges;
    
    /**
     * Offers
     *
     * @ORM\OneToMany(targetEntity="Offer",mappedBy="company")
     */
    protected $offers;
    
    /**
     * Users
     *
     * @ORM\OneToMany(targetEntity="User",mappedBy="company")
     */
    protected $users;


    public function __construct()
    {
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
     * Set the exchanges
     *
     * @param Exchange $exchanges
     */
    public function setExchanges($exchanges)
    {
        $this->exchanges = $exchanges;
    }

    /**
     * Get the exchanges
     *
     * @return ArrayCollection
     */
    public function getExchanges()
    {
        return $this->exchanges;
    }
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}