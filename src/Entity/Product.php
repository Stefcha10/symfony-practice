<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * Assert\Image()
     * Assert\NotBlank(message="Please, upload the product image")
     */

    private $image; 

    /** 
     * @ORM\Column(type="text", length=100)
    */
    private $title;

    /** 
     * @ORM\Column(type="text")
    */
    private $body;

    //getters and setters

    public function getId(){
    
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }
    
    public function setTitle($title){
        $this->title = $title;
    }

    public function getImage(){
        return $this->image;
    }
    
    public function setImage($image){
        $this->image = $image;
    }

    public function getBody(){
        return $this->body;
    }
    
    public function setBody($body){
        $this->body = $body;
    }
}
