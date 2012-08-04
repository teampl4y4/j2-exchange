<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * J2\Bundle\ExchangeBundle\Entity\Deal
 *
 * @ORM\Table(name="deals")
 * @ORM\Entity(repositoryClass="J2\Bundle\ExchangeBundle\Entity\DealRepository")
 */
class Deal
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
     * @var integer $state
     *
     * @ORM\Column(name="state", type="integer")
     */
    private $state;

    /**
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;
    
    /**
     * Offers
     *
     * @ORM\ManyToMany(targetEntity="Offer")
     * @ORM\JoinTable(
     *      joinColumns={@ORM\JoinColumn(name="deal_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="offer_id", referencedColumnName="id")}
     * )
     */
    private $offers;
    
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
     * @var float $revenueTotal
     *
     * @ORM\Column(name="revenueTotal", type="float")
     */
    private $revenueTotal;

    /**
     * @var integer $orderTotal
     *
     * @ORM\Column(name="orderTotal", type="integer")
     */
    private $orderTotal;


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
     * Set state
     *
     * @param integer $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set revenueTotal
     *
     * @param float $revenueTotal
     */
    public function setRevenueTotal($revenueTotal)
    {
        $this->revenueTotal = $revenueTotal;
    }

    /**
     * Get revenueTotal
     *
     * @return float 
     */
    public function getRevenueTotal()
    {
        return $this->revenueTotal;
    }

    /**
     * Set orderTotal
     *
     * @param integer $orderTotal
     */
    public function setOrderTotal($orderTotal)
    {
        $this->orderTotal = $orderTotal;
    }

    /**
     * Get orderTotal
     *
     * @return integer 
     */
    public function getOrderTotal()
    {
        return $this->orderTotal;
    }
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

    /**
     * Get Offers
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * Set Offers
     * @param \Doctrine\Common\Collections\ArrayCollection $offer
     */
    public function setOffers($offer)
    {
        $this->offers = $offers;
    }
}