<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
use J2\Bundle\ExchangeBundle\Entity\Company;
/**
 * J2\Bundle\ExchangeBundle\Entity\User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="J2\Bundle\ExchangeBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $firstName
     *
     * @ORM\Column(name="firstName", type="string", length=50, nullable=true)
     */
    protected $firstName;

    /**
     * @var string $lastName
     *
     * @ORM\Column(name="lastName", type="string", length=50, nullable=true)
     */
    protected $lastName;

    /**
     * @var Company $company
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $company;

    /**
     * @var Exchange $currentExchange
     *
     * @ORM\ManyToOne(targetEntity="Exchange")
     * @ORM\JoinColumn(name="current_exchange_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $currentExchange;
    
    /**
     * Exchanges
     *
     * @ORM\ManyToMany(targetEntity="Exchange")
     * @ORM\JoinTable(
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="exchange_id", referencedColumnName="id")}
     * )
     */
    protected $exchanges;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    protected $createdAt;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean")
     */
    protected $active;

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
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
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
     * Set current exchange
     *
     * @param Exchange $company
     */
    public function setCurrentExchange($exchange)
    {
        $this->currentExchange = $exchange;
    }

    /**
     * Get current exchange
     *
     * @return Exchange
     */
    public function getCurrentExchange()
    {
        return $this->currentExchange;
    }

    /**
     * Set company
     *
     * @param Company $company
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Get company
     *
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
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
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}