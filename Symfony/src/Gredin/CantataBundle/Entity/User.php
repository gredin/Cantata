<?php

namespace Gredin\CantataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 *
 * @ORM\Entity(repositoryClass="Gredin\CantataBundle\Entity\UserRepository")
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Email
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=false, unique=true)
     */
    protected $email;


    /**
     * Password
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     */
    protected $password;

    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * Setter for Email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Getter for Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Setter for Password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Getter for Password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
