<?php

namespace Core\UserBundle\Repository;

use Core\UserBundle\Entity\Complemento;
use Core\UserBundle\Entity\TipoUser;
use Core\UserBundle\Entity\User;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\DoctrineExtension;
use Doctrine\ORM\EntityRepository;

/**
 * Class ComplementoRepository
 * @package Core\UserBundle\Repository
 */
class ComplementoRepository extends EntityRepository
{

    /**
     * Salva uma etapa
     *
     * @param \COLIH\MedicoBundle\Repository\Medico
     * @internal param $
     */
    public function save(Complemento $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
}
