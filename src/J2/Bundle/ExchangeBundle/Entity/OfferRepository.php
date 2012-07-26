<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\EntityRepository;
use J2\Bundle\ExchangeBundle\Entity\Offers;

/**
 * OfferRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OfferRepository extends EntityRepository
{
    
    /**
     * Fetch all active offers for company
     * @param Company $company
     * @return array 
     */
    public function findActiveOffersByExchange(Exchange $exchange){

        $qb = $this->createQueryBuilder('o');
        $qb->where('o.exchange = :exchange')
            ->andWhere('o.active = :active')
            ->setParameter('exchange', $exchange)
            ->setParameter('active', true);

        return $qb->getQuery()->execute();
    }
    
    /**
     * Fetch matches offers
     * @param Offer $offer
     * @param int $limit
     * @return array
     */
    public function findMatchesByOffer(Offer $offer, $limit){

        $limitWhipserPrice = floor($offer->getListPrice() - $offer->getWhisperPrice());

        //add our percentage of 10%
        $limitWhipserPrice = $limitWhipserPrice * .9;

        $sql = '
            SELECT
                *
            FROM
                offers o
            WHERE
                o.id != ' . $offer->getId() . ' AND
                o.whisperPrice <= (' . $limitWhipserPrice  . ') AND
                o.exchange_id = ' . $offer->getExchange()->getId() . ' AND
                o.active = 1 AND
                o.available > 0
            ORDER BY
                o.listPrice DESC,
                o.whisperPrice ASC';

        if($limit > 0) {
            $sql .= ' LIMIT ' . $limit;
        }

        return $this->_em->getConnection()->fetchAll($sql . ';');
    }
}