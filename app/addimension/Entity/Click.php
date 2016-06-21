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
     * @ORM\Column(type="integer")
     */
    public $publisherId;

    /**
     * @ORM\Column(type="integer")
     */
    public $adSurfaceId;

    /**
     * @ORM\Column(type="integer")
     */
    public $advertId;

    /**
     * @ORM\Column(type="datetime",name="posted_at")
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

}