<?php

namespace Core\FinanceiroBundle\Repository;

use Evento\EventoBundle\Entity\Desconto;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\DoctrineExtension;
use Doctrine\ORM\EntityRepository;

/**
 * Class FinanceiroRepository
 * @package Core\FinanceiroBundle\Repository
 */
class FinanceiroRepository extends EntityRepository
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
