<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * J2\Bundle\ExchangeBundle\Entity\OfferActivity
 *
 * @ORM\Table(name="offers_matches_activity")
 * @ORM\Entity(repositoryClass="J2\Bundle\ExchangeBundle\Entity\OfferActivityRepository")
 */
class OfferActivity
{

    const STATE_PENDING     = 0;
    const STATE_ACTIVE      = 1;
    const STATE_DECLINED    = 2;
    const STATE_EXPIRED     = 3;

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Offer $offer
     *
     * @ORM\ManyToOne(targetEntity="Offer")
     * @ORM\JoinColumn(name="offer_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $offer;

    /**
     * @var Offer $matchedOffer
     *
     * @ORM\OneToOne(targetEntity="Offer")
     * @ORM\JoinColumn(name="matched_offer_id", referencedColumnName="id")
     */
    private $matchedOffer;

    /**
     * @var integer $state
     *
     * @ORM\Column(name="state", type="integer")
     */
    private $state;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;


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
     * Set offer
     *
     * @param object $offer
     */
    public function setOffer(Offer $offer)
    {
        $this->offer = $offer;
    }

    /**
     * Get offer
     *
     * @return object 
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * Set matched_offer
     *
     * @param Offer $matchedOffer
     */
    public function setMatchedOffer(Offer $matchedOffer)
    {
        $this->matchedOffer = $matchedOffer;
    }

    /**
     * Get matched_offer
     *
     * @return object 
     */
    public function getMatchedOffer()
    {
        return $this->matchedOffer;
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

}