<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * J2\Bundle\ExchangeBundle\Entity\Companies
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="J2\Bundle\ExchangeBundle\Entity\CompaniesRepository")
 */
class Companies
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
     * Exchanges
     *
     * @ORM\ManyToMany(targetEntity="Exchanges")
     * @ORM\JoinTable(name="company_exchanges",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="exchange_id", referencedColumnName="id")}
     * )
     */
    protected $exchanges;
    
    /**
     * Users
     *
     * @ORM\ManyToMany(targetEntity="Users")
     * @ORM\JoinTable(name="company_users",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
     * )
     */
    protected $users;


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
     * @param $exchanges
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
}