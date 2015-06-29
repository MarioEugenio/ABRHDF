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

        if (isset($params['searchText']) && $params['searchText']){
            $qb->andWhere('LOWER(u.nome) LIKE :nome ');
            $qb->setParameter('nome', "%" . mb_strtolower($params['searchText'], 'UTF-8') . "%");
        }

        $page = 1;

        if (isset($params['page']))
        {
            $page = $params['page'];
        }
        if ($page == 0){
            $page = 1;
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
    protected function paginate(QueryBuilder $qb, $offset = 1, $maxResult = 20, $fetchJoinCollection = true)
    {
        $qb->setMaxResults($maxResult);
        $qb->setFirstResult(($offset - 1) * $maxResult);
        $query = $qb->getQuery();

        return new Paginator($query, $fetchJoinCollection);
    }

    public function getListRepresentantes($params = array())
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('r')
            ->from('CoreUserBundle:Representantes', 'r')
            ->where($qb->expr()->eq('r.pessoaJuridica',':pessoaJuridica'))
            ->andWhere('r.flActive = true')
            ->setParameter('pessoaJuridica', $params['id_juridico']);

        if (isset($params['searchText'])){
            $qb->andWhere('LOWER(r.nome) LIKE :nome )');
            $qb->setParameter('nome', "%" . mb_strtolower($params['searchText'], 'UTF-8') . "%");
        }

        $page = 0;
        if (isset($params['page']))
        {
            $page = $params['page'];
        }
        return $this->paginate($qb, $page);
    }

    public function getListDependentes($params = array())
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('r')
            ->from('CoreUserBundle:Dependentes', 'r')
            ->where($qb->expr()->eq('r.pessoaFisica',':pessoaFisica'))
            ->andWhere('r.flActive = true')
            ->setParameter('pessoaFisica', $params['id_fisico']);

        if (isset($params['searchText'])){
            $qb->andWhere('LOWER(r.nome) LIKE :nome )');
            $qb->setParameter('nome', "%" . mb_strtolower($params['searchText'], 'UTF-8') . "%");
        }

        $page = 0;
        if (isset($params['page']))
        {
            $page = $params['page'];
        }
        return $this->paginate($qb, $page);
    }

    public function getInfoEmail($params = array())
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('u')
            ->from('CoreUserBundle:User', 'u')
            ->where($qb->expr()->eq('LOWER(u.email)',':email'))
            ->setParameter('email', mb_strtolower($params['email'], 'UTF-8'));
        return $qb->getQuery()->getResult();
    }
}
