<?php

namespace AdDimension\Controller;

use AdDimension\Entity\Click;
use AdDimension\Entity\Impression;
use Doctrine\ORM\EntityManager;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class ImpressionController
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(Container $container)
    {
        $this->em = $container->get("em");
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function fetch($request, $response, $args) {
        $adSurfaces = $this->em->getRepository('AdDimension\Entity\Impression')->findAll();
        return  $response->withJSON($adSurfaces);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function fetchByAdvertId($request, $response, $args) {
        $advert = $this->em->getRepository('AdDimension\Entity\Impression')->findBy(array('advertId' => $args['id']));
        if ($advert) {
            return $response->withJSON($advert);
        }
        return $response->withStatus(404, 'No impression found ');
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function fetchByPublisherId($request, $response, $args) {
        $advert = $this->em->getRepository('AdDimension\Entity\Impression')->findBy(array('id' => $args['id']));
        if ($advert) {
            return $response->withJSON($advert);
        }
        return $response->withStatus(404, 'No impression found ');
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function post($request,$response,$args){

        $data = $request->getParams();

        $impression = new Impression();
        $impression->setAdSurfaceId($data['adSurfaceId']);
        $impression->setPublisherId($data['publisherId']);
        $impression->setAdvertId($data['advertId']);
        $impression->setTimeImpressed($data['time']?$data['time']:100);

        $this->em->persist($impression);
        $this->em->flush();

        $response->withStatus(201);
    }
}