<?php

namespace AdDimension\Controller;

use Doctrine\ORM\EntityManager;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class AdSurfaceController
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
        $adSurfaces = $this->em->getRepository('AdDimension\Entity\AdSurface')->findAll();
        return  $response->withJSON($adSurfaces);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function fetchOne($request, $response, $args) {
        $adSurfaces = $this->em->getRepository('AdDimension\Entity\AdSurface')->findBy(array('id' => $args['id']));
        if ($adSurfaces) {
            return $response->withJSON($adSurfaces);
        }
        return $response->withStatus(404, 'No AdSurface found with id '.$args['id']);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function findAdvert($request, $response, $args) {
        /** @var  \AdDimension\Entity\AdSurface $adSurfaces */
        $adSurfaces = $this->em->getRepository('AdDimension\Entity\AdSurface')->findBy(array('id' => $args['id']))[0];

        $adverts = $this->em->getRepository('AdDimension\Entity\Advert')->findby(array('dimX'=> $adSurfaces->getDimX(), 'dimY'=>$adSurfaces->getDimY()) );

        if ($adverts) {
            $num = rand(0, count($adverts)-1);
            return $response->withJSON($adverts[$num]);
        }
        return $response->withStatus(404, 'No Advert for this AdSurface '.$args['id']);
    }

}