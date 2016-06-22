<?php
namespace AdDimension\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="click")
 */
class Click
{
    public function __construct()
    {
        $this->postedAt = new \DateTime('now');
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="integer",nullable=true )
     */
    public $publisherId;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    public $adSurfaceId;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    public $advertId;

    /**
     * @ORM\Column(type="integer",name="type_of_click",nullable=true)
     */
    public $type;

    /**
     * @ORM\Column(type="datetime",name="posted_at",nullable=true)
     */
    public $postedAt;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPublisherId()
    {
        return $this->publisherId;
    }

    /**
     * @param mixed $publisherId
     */
    public function setPublisherId($publisherId)
    {
        $this->publisherId = $publisherId;
    }

    /**
     * @return mixed
     */
    public function getAdSurfaceId()
    {
        return $this->adSurfaceId;
    }

    /**
     * @param mixed $adSurfaceId
     */
    public function setAdSurfaceId($adSurfaceId)
    {
        $this->adSurfaceId = $adSurfaceId;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getAdvertId()
    {
        return $this->advertId;
    }

    /**
     * @param mixed $advertId
     */
    public function setAdvertId($advertId)
    {
        $this->advertId = $advertId;
    }



}