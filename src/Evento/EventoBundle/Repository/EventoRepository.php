<?php

namespace Evento\EventoBundle\Repository;

use Evento\EventoBundle\Entity\Evento;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\DoctrineExtension;
use Doctrine\ORM\EntityRepository;

/**
 * Class EventoRepository
 * @package Evento\EventoBundle\Repository
 */
class EventoRepository extends EntityRepository
{

    /**
     * Salva uma etapa
     *
     * @param \Evento\EventoBundle\Repository\Evento
     * @internal param $
     */
    public function save(Evento $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
}
