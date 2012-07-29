<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\EntityRepository;
use J2\Bundle\ExchangeBundle\Entity\Offer;

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
     * Return the active offers by the user using their company and current exchange
     * @param User $user
     * @return array
     */
    public function findActiveOffersByUser(User $user)
    {

        $qb = $this->createQueryBuilder('o');
        $qb->where('o.exchange = :exchange')
            ->andWhere('o.active = :active')
            ->andWhere('o.company = :company')
            ->setParameter('exchange', $user->getCurrentExchange())
            ->setParameter('company', $user->getCompany())
            ->setParameter('active', true);

        return $qb->getQuery()->execute();
    }
    
    /**
     * Return the offers by the user using their company and current exchange
     * @param User $user
     * @return array
     */
    public function findOffersByUser(User $user)
    {

        $qb = $this->createQueryBuilder('o');
        $qb->where('o.exchange = :exchange')
            ->andWhere('o.company = :company')
            ->setParameter('exchange', $user->getCurrentExchange())
            ->setParameter('company', $user->getCompany());

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



    /**
     * Finds all the related offers matches to this offer
     *
     * return ArrayCollection
     */
    public function findMatchedOffersOnOffer(Offer $offer)
    {
        $qb = $this->createQueryBuilder('o');
        $qb->select('o, m, c, p, o2, c2, p2, cats')
           ->leftJoin('o.matches', 'm')
           ->leftJoin('o.company', 'c')
           ->leftJoin('o.product', 'p')
           ->leftJoin('m.offers', 'o2')
           ->leftJoin('o2.company', 'c2')
           ->leftJoin('o2.product', 'p2')
           ->leftJoin('p2.categories', 'cats')
           ->andWhere('o2.id = :offer')
           ->andHaving($qb->expr()->neq('o.id', $offer->getId()))
           ->setParameter('offer', $offer->getId());

        return $qb->getQuery()->execute();
    }
}