<?php
namespace Core\BaseBundle\Entity;

use Doctrine\Common\Util\Debug;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

abstract class Entity
{

    public function __construct(array $data = null)
    {
        $this->setData($data);
    }

    public  function setData($data)
    {
        foreach ((array) $data as $key => $value) {
            if (substr(ucfirst ($key), 0, 4) != 'List') {
                $set = "set" . ucfirst ($key);
                $this->$set($value);
            }
        }
    }

    /**
     * Converte entidade para json
     *
     * @return json
     */
    public function toJson()
    {
        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('message' => new
            JsonEncoder()));

        return $serializer->serialize($this, 'json');
    }

    /**
     * Converte entidade para array
     *
     * @return array
     */
    public function toArray()
    {
        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('message' => new
            JsonEncoder()));

        return json_decode($serializer->serialize($this, 'json'), true);
    }
} 