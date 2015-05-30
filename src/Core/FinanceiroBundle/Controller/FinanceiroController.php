<?php

namespace Core\FinanceiroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FinanceiroController extends Controller
{
    /**
     * @Route("/financeiro", name="user_login", options={"expose"=true})
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
