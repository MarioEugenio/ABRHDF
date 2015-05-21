<?php

namespace Evento\EventoBundle\Repository;

use Evento\EventoBundle\Entity\Desconto;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\DoctrineExtension;
use Doctrine\ORM\EntityRepository;

/**
 * Class DescontoRepository
 * @package Evento\EventoBundle\Repository
 */
class DescontoRepository extends EntityRepository
{

    /**
     * Salva uma etapa
     *
     * @param \Evento\EventoBundle\Repository\Evento
     * @internal param $
     */
    public function save(Desconto $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
}
