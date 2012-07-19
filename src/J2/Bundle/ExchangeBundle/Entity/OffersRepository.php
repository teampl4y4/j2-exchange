<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\EntityRepository;
use J2\Bundle\ExchangeBundle\Entity\Offers;

/**
 * OffersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OffersRepository extends EntityRepository
{
    
    /**
     * Fetch all active offers 
     * @param J2\Bundle\ExchangeBundle\Entity\CompanyExchanges $companyEexchange 
     * @return array 
     */
    public static function getActiveOffers($companyExchange){}
    
    /**
     * Fetch all active offers 
     * @param J2\Bundle\ExchangeBundle\Entity\CompanyExchanges $companyEexchange
     * @return array  
     */
    public static function getInactiveOffers($companyExchange){}
    
    
    /**
     * Fetch an offer by id from within a company exchange
     * @param int $offerID
     * @param J2\Bundle\ExchangeBundle\Entity\CompanyExchanges $companyExchange 
     * @return Offers 
     */
    public static function getOffer($offerID,$companyExchange){
        return new Offers();
    }
    
    
    /**
     * Fetch all active offers that the given productID is part of
     * in the company exchange
     * @param type $productID
     * @param type $companyExchange
     * @return array 
     */
    public static function getActiveProductOffers($productID,$companyExchange){
        return array();
    }
    
    /**
     * Fetch all inactive offers that the given productID is part of
     * in the company exchange
     * @param type $productID
     * @param type $companyExchange
     * @return array 
     */
    public static function getInactiveProductOffers($productID,$companyExchange){
        return array();
    }
}