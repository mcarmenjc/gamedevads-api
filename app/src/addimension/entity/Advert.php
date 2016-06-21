<?php
namespace App\Addimension\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="advert")
 */
class Advert
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $dimX;
    /**
     * @ORM\Column(type="integer")
     */
    private $dimY;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="advertiser_id", referencedColumnName="id")
     */
    private $advertiser_id;

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
    public function getAdvertiserId()
    {
        return $this->advertiser_id;
    }

    /**
     * @param mixed $advertiser_id
     */
    public function setAdvertiserId($advertiser_id)
    {
        $this->advertiser_id = $advertiser_id;
    }




}