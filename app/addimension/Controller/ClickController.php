<?php

namespace AdDimension\Controller;

use AdDimension\Entity\Click;
use Doctrine\ORM\EntityManager;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class ClickController
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
        $adSurfaces = $this->em->getRepository('AdDimension\Entity\Click')->findAll();
        return  $response->withJSON($adSurfaces);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function fetchByAdvertId($request, $response, $args) {
        $advert = $this->em->getRepository('AdDimension\Entity\Click')->findBy(array('advertId' => $args['id']));
        if ($advert) {
            return $response->withJSON($advert);
        }
        return $response->withStatus(404, 'No advert found with id '.$args['id']);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function fetchByPublisherId($request, $response, $args) {
        $advert = $this->em->getRepository('AdDimension\Entity\Click')->findBy(array('id' => $args['id']));
        if ($advert) {
            return $response->withJSON($advert);
        }
        return $response->withStatus(404, 'No click available');
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function post($request,$response,$args){

        $data = json_decode($request->getBody()->getContents());

        $click = new Click();
        $click->setAdSurfaceId($data->adSurfaceId);
        $click->setPublisherId($data->publisherId);
        $click->setAdvertId($data->advertId);

        $this->em->persist($click);
        $this->em->flush();

        $response->withStatus(201);
    }
}