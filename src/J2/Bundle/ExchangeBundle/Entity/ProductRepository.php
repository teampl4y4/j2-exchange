<?php

namespace J2\Bundle\ExchangeBundle\Entity;

use Doctrine\ORM\EntityRepository;
use J2\Bundle\ExchangeBundle\Entity\Product;

/**
 * ProductsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
    
    /**
     * Fetch an product by id from within a company exchange
     * @param int $productID 
     * @return Product
     */
    public function findOneByUser($productID,$user){
        $params=array();
        $params['id']=$productID;
        $params['company']=$user->getCompany()->getId();
        $params['exchange']=$user->getCurrentExchange()->getId();
        return $this->findOneBy($params);
    }
    
    public function create($data,$user){
        $product = new Product();
        $product->setName($data->name);
        $product->setCode($data->code);
        $product->setPrice($data->price);
        $product->setCreatedBy($user);
        $product->setCompany($user->getCompany());
        $product->setExchange($user->getCurrentExchange());
        $product->setDescription($data->description);
        $this->getEntityManager()->persist($product);
        $this->getEntityManager()->flush();
    }
            


    /**
     * Delete a company product
     * @param int $productID 
     * @param int $company
     * @return boolean
     */
    public function deleteProduct($productID,$user){
        $product = $this->findOneBy(array('id'=>$productID,'company_id'=>$user->getCompany()->getId()));
        $this->getEntityManager()->remove($product);
        $this->getEntityManager()->flush();
    }

    /**
     *
     * @param User $user
     * @return type 
     */
    public function findByUser(User $user)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->where('p.company = :company')
           ->andWhere('p.exchange = :exchange')
           ->setParameter('company', $user->getCompany())
           ->setParameter('exchange', $user->getCurrentExchange());

        return $qb->getQuery()->execute();
    }
}