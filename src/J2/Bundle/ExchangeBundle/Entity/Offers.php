<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use J2\Bundle\ExchangeBundle\Entity\Products;
use J2\Bundle\ExchangeBundle\Entity\Companies;
use J2\Bundle\ExchangeBundle\Entity\Users;

/**
 * J2\Bundle\ExchangeBundle\Entity\Offers
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="J2\Bundle\ExchangeBundle\Entity\OffersRepository")
 */
class Offers
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
     * @var Companies $company
     *
     * @ORM\OneToOne(targetEntity="Companies")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $company;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float $listPrice
     *
     * @ORM\Column(name="listPrice", type="float")
     */
    private $listPrice;

    /**
     * @var float $whisperPrice
     *
     * @ORM\Column(name="whisperPrice", type="float")
     */
    private $whisperPrice;

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
     * @var Users $createdBy
     *
     * @ORM\OneToOne(targetEntity="Users")
     * @ORM\JoinColumn(name="createdBy", referencedColumnName="id", onDelete="CASCADE")
     */
    private $createdBy;

    /**
     * @var Users $updatedBy
     *
     * @ORM\OneToOne(targetEntity="Users")
     * @ORM\JoinColumn(name="updatedBy", referencedColumnName="id", onDelete="CASCADE")
     */
    private $updatedBy;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var Product $product
     *
     * @ORM\OneToOne(targetEntity="Products")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $product;

    /**
     * @var integer $available
     *
     * @ORM\Column(name="available", type="integer")
     */
    private $available;

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
     * Set company
     *
     * @param Companies $company
     */
    public function setCompany($company)
    {
        $this->companyID = $company;
    }

    /**
     * Get company
     *
     * @return Companies 
     */
    public function getCompany()
    {
        return $this->company;
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
     * Set listPrice
     *
     * @param float $listPrice
     */
    public function setListPrice($listPrice)
    {
        $this->listPrice = $listPrice;
    }

    /**
     * Get listPrice
     *
     * @return float 
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }

    /**
     * Set whisperPrice
     *
     * @param float $whisperPrice
     */
    public function setWhisperPrice($whisperPrice)
    {
        $this->whisperPrice = $whisperPrice;
    }

    /**
     * Get whisperPrice
     *
     * @return float 
     */
    public function getWhisperPrice()
    {
        return $this->whisperPrice;
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
     * Set createdBy
     *
     * @param Users $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param Users $updatedBy
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;
    }

    /**
     * Get updatedBy
     *
     * @return Users 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
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
     * Set productID
     *
     * @param integer $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    /**
     * Get productID
     *
     * @return integer 
     */
    public function getProductID()
    {
        return $this->productID;
    }
    
    /**
     *
     * @param Product $product 
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }
    
    /**
     *
     * @return Product 
     */
    public function getProduct()
    {
        return $this->product;
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
}