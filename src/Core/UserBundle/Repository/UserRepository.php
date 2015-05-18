<?php

namespace Core\UserBundle\Repository;

use Core\UserBundle\Entity\User;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\DoctrineExtension;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Class UserRepository
 * @package Core\UserBundle\Repository
 */
class UserRepository extends EntityRepository
{

    /**
     * Salva uma etapa
     *
     * @param \COLIH\MedicoBundle\Repository\Medico
     * @internal param $
     */
    public function save(User $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function getListUser($tipoPessoa, $params = array())
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('u')
            ->from('CoreUserBundle:User', 'u')
            ->where($qb->expr()->eq('u.tipoUser',':tipoUser'))
            ->andWhere('u.flActive = true')
            ->setParameter('tipoUser', $tipoPessoa);

        $page = 0;
        if (isset($params['page']))
        {
            $page = $params['page'];
        }
        return $this->paginate($qb, $page);
    }

    /**
     * TODO criar este metodo no repositorio default
     *
     * @param  QueryBuilder $qb
     * @param  int $offset
     * @param  int $maxResult
     *
     * @return Paginator
     */
    protected function paginate(QueryBuilder $qb, $offset = 0, $maxResult = 20, $fetchJoinCollection = true)
    {
        $qb->setMaxResults($maxResult);
        $qb->setFirstResult($offset);
        $query = $qb->getQuery();

        return new Paginator($query, $fetchJoinCollection);
    }
}
