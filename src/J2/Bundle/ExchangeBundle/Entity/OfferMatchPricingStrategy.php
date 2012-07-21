<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * J2\Bundle\ExchangeBundle\Entity\OfferMatchPricingStrategy
 *
 * @ORM\Table(name="offer_match_pricing_strategies")
 * @ORM\Entity(repositoryClass="J2\Bundle\ExchangeBundle\Entity\OfferMatchPricingStrategyRepository")
 */
class OfferMatchPricingStrategy
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
     * @var integer $revenue
     *
     * @ORM\Column(name="revenue", type="decimal", precision=10, scale=2)
     */
    private $revenue;

    /**
     * @var integer $payout
     *
     * @ORM\Column(name="payout", type="decimal", precision=10, scale=2)
     */
    private $payout;

    /**
     * @var integer $price
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var Offer $offer
     *
     * @ORM\ManyToOne(targetEntity="Offer")
     * @ORM\JoinColumn(name="offer_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $offer;

    /**
     * @var Match $match
     *
     * @ORM\ManyToOne(targetEntity="Match")
     * @ORM\JoinColumn(name="match_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $match;


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
     * Set revenue
     *
     * @param integer $revenue
     */
    public function setRevenue($revenue)
    {
        $this->revenue = $revenue;
    }

    /**
     * Get revenue
     *
     * @return integer 
     */
    public function getRevenue()
    {
        return $this->revenue;
    }

    /**
     * Set payout
     *
     * @param integer $payout
     */
    public function setPayout($payout)
    {
        $this->payout = $payout;
    }

    /**
     * Get payout
     *
     * @return integer 
     */
    public function getPayout()
    {
        return $this->payout;
    }

    /**
     * Set price
     *
     * @param integer $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set offer
     *
     * @param Offer $offer
     */
    public function setOffer(Offer $offer)
    {
        $this->offer = $offer;
    }

    /**
     * Get offer
     *
     * @return Offer 
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * Set match
     *
     * @param Match $match
     */
    public function setMatch(Match $match)
    {
        $this->offer = $match;
    }

    /**
     * Get match
     *
     * @return Match 
     */
    public function getMatch()
    {
        return $this->match;
    }
}