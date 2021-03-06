<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use J2\Bundle\ExchangeBundle\Entity\Company;
use J2\Bundle\ExchangeBundle\Entity\User;
use J2\Bundle\ExchangeBundle\Entity\Offer;

/**
 * J2\Bundle\ExchangeBundle\Entity\Product
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="J2\Bundle\ExchangeBundle\Entity\ProductRepository")
 */
class Product
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
     * @var string $code
     *
     * @ORM\Column(name="code", type="string", length=100)
     */
    private $code;

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
     * @var datetime $updatedAt
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * Categories
     *
     * @ORM\ManyToMany(targetEntity="Category")
     * @ORM\JoinTable(
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     * )
     */
    private $categories;

    /**
     * Offers
     *
     * @ORM\OneToMany(targetEntity="Offer",mappedBy="product")
     */
    private $offers;

    /**
     * @var User $createdBy
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="createdBy", referencedColumnName="id", onDelete="CASCADE")
     */
    private $createdBy;

    /**
     * @var User $updatedBy
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="updatedBy", referencedColumnName="id", onDelete="CASCADE")
     */
    private $updatedBy;

    /**
     * @var Exchange $exchange
     *
     * @ORM\ManyToOne(targetEntity="Exchange")
     * @ORM\JoinColumn(name="exchange_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $exchange;

    /**
     * @var Company $company
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $company;

    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->active = true;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param float $price
     */
    public function setPrice($price) {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set code
     *
     * @param string $sku
     */
    public function setCode($code) {
        $this->code = $code;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set createdBy
     *
     * @param User $createdBy
     */
    public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return User
     */
    public function getCreatedBy() {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param User $updatedBy
     */
    public function setUpdatedBy($updatedBy) {
        $this->updatedBy = $updatedBy;
    }

    /**
     * Get updatedBy
     *
     * @return User
     */
    public function getUpdatedBy() {
        return $this->updatedBy;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * Set active
     *
     * @param boolean $active
     */
    public function setActive($active) {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive() {
        return $this->active;
    }

    /**
     * Set company
     *
     * @param Company $company
     */
    public function setCompany(Company $company) {
        $this->company = $company;
    }

    /**
     * Get company
     *
     * @return Company
     */
    public function getCompany() {
        return $this->company;
    }

    /**
     * Set offers
     *
     * @param ArrayCollection $categories
     */
    public function setCategories($categories) {
        $this->categories = $categories;
    }

    /**
     * Get offers
     *
     * @return ArrayCollection
     */
    public function getCategories() {
        return $this->categories;
    }

    /**
     * Set offers
     *
     * @param ArrayCollection $offers
     */
    public function setOffers($offers) {
        $this->offers = $offers;
    }

    /**
     * Get offers
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getOffers() {
        return $this->offers;
    }


    /**
     * Set exchange
     *
     * @param Exchange $exchange
     */
    public function setExchange(Exchange $exchange) {
        $this->exchange = $exchange;
    }

    /**
     * Get exchange
     *
     * @return Exchange
     */
    public function getExchange() {
        return $this->exchange;
    }
    
    public function jsonSerialize() {
        $arr = get_object_vars($this);
        $arr['offers'] = array();
        foreach($this->getOffers() as $offer)
            $arr['offers'][]['name'] = $offer->getName();
        return $arr;
    }

}