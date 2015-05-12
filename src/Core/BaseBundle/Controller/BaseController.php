<?php
/**
 * Created by IntelliJ IDEA.
 * User: marioeugenio
 * Date: 4/7/15
 * Time: 8:08 PM
 */

namespace Core\BaseBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller {

    /**
     *
     * @param array $doctrineobject
     * @param int $code
     * @param array $headers
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function createJsonResponse($doctrineobject, $code = 200, array $headers = array())
    {
        if (isset($doctrineobject['data'])) {
            if (!count($doctrineobject['data'])) {
                $doctrineobject = array(
                    'success' => false,
                    'error' => 'Nenhum registro encontrado',
                );

                $code = 404;
            }
        }

        $serializer = $this->container->get('jms_serializer');
        $reports = $serializer->serialize($doctrineobject, 'json');

        $response = new Response($reports, $code, $headers);
        $response->headers->set('Content-type', 'application/json');
        $response->setCharset('UTF-8');

        return $response;
    }
} 