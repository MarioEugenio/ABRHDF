<?php

namespace Core\UserBundle\Repository;

use Core\UserBundle\Entity\Dependentes;
use Core\UserBundle\Entity\Representantes;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\DoctrineExtension;
use Doctrine\ORM\EntityRepository;

/**
 * ClassDependentesRepository
 * @package Core\UserBundle\Repository
 */
class DependentesRepository extends EntityRepository
{

    /**
     * Salva uma etapa
     *
     * @param \Core\UserBundle\Repository\Representantes
     * @internal param $
     */
    public function save(Dependentes $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
}
