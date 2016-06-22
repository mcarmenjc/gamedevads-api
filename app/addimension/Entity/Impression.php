<?php
namespace AdDimension\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="impression")
 */
class Impression
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
     * @ORM\Column(type="integer",nullable=true)
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
     * @ORM\Column(type="integer", name="time_impressed",nullable=true)
     */
    public $timeImpressed;

    /**
     * @ORM\Column(type="datetime",name="posted_at",nullable=true )
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

    /**
     * @return mixed
     */
    public function getTimeImpressed()
    {
        return $this->timeImpressed;
    }

    /**
     * @param mixed $time
     */
    public function setTimeImpressed($time)
    {
        $this->timeImpressed = $time;
    }

}