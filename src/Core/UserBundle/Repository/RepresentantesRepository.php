<?php

namespace Core\UserBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\DoctrineExtension;
use Doctrine\ORM\EntityRepository;
use Evento\EventoBundle\Entity\Representantes;

/**
 * Class RepresentantesRepository
 * @package Core\UserBundle\Repository
 */
class RepresentantesRepository extends EntityRepository
{

    /**
     * Salva uma etapa
     *
     * @param \Core\UserBundle\Repository\Representantes
     * @internal param $
     */
    public function save(Representantes $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
}
