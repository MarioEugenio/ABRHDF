<?php

namespace Core\BaseBundle\Controller;

use Core\BaseBundle\Services\AtualizacaoActions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends BaseController
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/core/admin")
     * @Template()
     */
    public  function  adminAction()
    {
        return array();
    }

    /**
     * @Route("/core/admin/home", name="core_home", options={"expose"=true})
     * @Template()
     */
    public function homeAction () {
        return array();
    }

    /**
     * @Route("/core/api/atualizacao")
     */
    public function apiAtualizacaoAction()
    {
        /** @var AtualizacaoActions $service */
        $service = $this->get('COLIHCoreBundle.AtualizacaoActions');
        $resource = $service->findMax();

        return $this->createJsonResponse(array(
            'success' => true,
            'data' => $resource,
        ));
    }
}
