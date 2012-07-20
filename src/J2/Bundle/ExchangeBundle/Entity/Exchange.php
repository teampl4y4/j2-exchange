<?php

namespace J2\Bundle\ExchangeBundle\Entity;
use J2\Bundle\ExchangeBundle\Entity\Users;

use Doctrine\ORM\Mapping as ORM;

/**
 * J2\Bundle\ExchangeBundle\Entity\Exchange
 *
 * @ORM\Table(name="exchanges")
 * @ORM\Entity(repositoryClass="J2\Bundle\ExchangeBundle\Entity\ExchangesRepository")
 */
class Exchange
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
     * @ORM\Column(name="name", type="string", length=70)
     */
    private $name;
    
    /**
     * Companies
     *
     * @ORM\ManyToMany(targetEntity="Company")
     * @ORM\JoinTable(
     *      joinColumns={@ORM\JoinColumn(name="deal_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")}
     * )
     */
    
    private $companies;

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

    public function __construct()
    {
        $this->setCreatedAt( new \DateTime() );
        $this->setActive(true);
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
     * Set the companies
     *
     * @param $companies
     */
    public function setCompanies($companies)
    {
        $this->companies = $companies;
    }

    /**
     * Get the companies
     *
     * @return ArrayCollection
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * Set the users
     *
     * @param $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * Get the users
     *
     * @return ArrayCollection
     */
    public function getUsers()
    {
        return $this->users;
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
     * Get isActive
     *
     * @return boolean 
     */
    public function isActive()
    {
        return $this->active;
    }
}