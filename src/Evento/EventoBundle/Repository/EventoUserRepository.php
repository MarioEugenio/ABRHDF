<?php

namespace Evento\EventoBundle\Repository;

use Evento\EventoBundle\Entity\Evento;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\DoctrineExtension;
use Doctrine\ORM\EntityRepository;
use Evento\EventoBundle\Entity\EventoUser;

/**
 * Class EventoUserRepository
 * @package Evento\EventoBundle\Repository
 */
class EventoUserRepository extends EntityRepository
{

    /**
     * Salva uma etapa
     *
     * @internal param $
     */
    public function save(EventoUser $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
}
