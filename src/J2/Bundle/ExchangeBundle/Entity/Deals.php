<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * J2\Bundle\ExchangeBundle\Entity\Deals
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="J2\Bundle\ExchangeBundle\Entity\DealsRepository")
 */
class Deals
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
     * @ORM\ManyToMany(targetEntity="Offers")
     * @ORM\JoinTable(name="offer_deals",
     *      joinColumns={@ORM\JoinColumn(name="deal_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="offer_id", referencedColumnName="id")}
     * )
     */
    private $offers;
    
    /**
     * Companies
     *
     * @ORM\ManyToMany(targetEntity="Companies")
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
}