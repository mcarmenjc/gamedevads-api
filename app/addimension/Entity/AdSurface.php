<?php

namespace Addimension\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ad_surface")
 */
class AdSurface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="integer")
     */
    public $dimX;

    /**
     * @ORM\Column(type="integer")
     */
    public $dimY;

    /**
     * @ORM\ManyToOne(targetEntity="AdDimension\Entity\User")
     * @ORM\JoinColumn(name="publisher_id", referencedColumnName="id")
     */
    protected $publisher_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDimX()
    {
        return $this->dimX;
    }

    /**
     * @param mixed $dimX
     */
    public function setDimX($dimX)
    {
        $this->dimX = $dimX;
    }

    /**
     * @return mixed
     */
    public function getDimY()
    {
        return $this->dimY;
    }

    /**
     * @param mixed $dimY
     */
    public function setDimY($dimY)
    {
        $this->dimY = $dimY;
    }

    /**
     * @return mixed
     */
    public function getPublisherId()
    {
        return $this->publisher_id;
    }

    /**
     * @param mixed $publisher_id
     */
    public function setPublisherId($publisher_id)
    {
        $this->publisher_id = $publisher_id;
    }



}