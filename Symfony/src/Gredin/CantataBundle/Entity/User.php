<?php

namespace Gredin\CantataBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

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
     *
     * @Assert\Length(
     *      min = 5,
     *      max = 200,
     *      minMessage = "Adresse email trop courte",
     *      maxMessage = "Adresse email trop longue"
     * )
     */
    protected $email;

    /**
     * Password
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     *
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Trop court",
     *      maxMessage = "Trop long"
     * )
     */
    protected $password;

    //$this->registrationDate = new \DateTime();

    /**
     * Registration date
     *
     * @var \DateTime
     *
     * //@ORM\Column(type="datetime", nullable=false)
     */
    //protected $registrationDate;

    /**
     * Setter for RegistrationDate
     *
     * @param \DateTime $registrationDate
     *
     * @return User
     */
    /*public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;
        return $this;
    }*/

    /**
     * Getter for RegistrationDate
     *
     * @return \DateTime
     */
    /*public function getRegistrationDate()
    {
        return $this->registrationDate;
    }*/

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
