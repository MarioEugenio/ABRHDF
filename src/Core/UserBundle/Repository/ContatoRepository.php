<?php

namespace Core\UserBundle\Repository;

use Core\UserBundle\Entity\Contato;
use Core\UserBundle\Entity\Empresa;
use Core\UserBundle\Entity\User;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\DoctrineExtension;
use Doctrine\ORM\EntityRepository;

/**
 * Class ContatoRepository
 * @package Core\UserBundle\Repository
 */
class ContatoRepository extends EntityRepository
{

    /**
     * Salva uma etapa
     *
     * @param \COLIH\MedicoBundle\Repository\Medico
     * @internal param $
     */
    public function save(Contato $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
}
