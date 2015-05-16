<?php

namespace Core\EventoBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\DoctrineExtension;
use Doctrine\ORM\EntityRepository;
use Evento\EventoBundle\Entity\Representantes;

/**
 * Class RepresentantesRepository
 * @package Evento\EventoBundle\Repository
 */
class RepresentantesRepository extends EntityRepository
{

    /**
     * Salva uma etapa
     *
     * @param \Evento\EventoBundle\Repository\Representantes
     * @internal param $
     */
    public function save(Representantes $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
}
