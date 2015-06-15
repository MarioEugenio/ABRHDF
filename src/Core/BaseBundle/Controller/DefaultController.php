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
        /** @var UserActions $service */
        $service = $this->get('CoreUserBundle.UserActions');
        $result = $service->getUserAuth();

        if (!$result){
            return $this->redirect($this->getRequest()->getBaseUrl() . '/');
        }

        return array();
    }

    /**
     * @Route("/core/admin/home", name="core_home", options={"expose"=true})
     * @Template()
     */
    public function homeAction () {
        return array();
    }
}
