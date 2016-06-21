<?php
namespace App\Addimension\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
    * @ORM\Column(type="string", length=100)
    */
    private $name;
    /**
    * @ORM\Column(type="string", length=100)
    */
    private $email;
    /**
    * @ORM\Column(type="integer")
    */
    private $type;


}