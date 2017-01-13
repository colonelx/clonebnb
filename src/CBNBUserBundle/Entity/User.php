<?php

namespace CBNBUserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    const GENDER_MALE = 'm';
    const GENDER_FEMALE = 'f';
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     * @ORM\Column(name="gender", type="string", length=1, options={"fixed" = true})
     */
    private $gender;

    /**
     * @var \DateTime
     * @ORM\Column(name="birth_date", type="date")
     */
    private $birthDate;

    /**
     * @var string
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $cityOfResidence = '';

    /**
     * @var string
     * @ORM\Column(name="country", type="string", length=2, options={"fixed" = true})
     */
    private $countryOfResidence = '';

    /**
     * @var string
     * @ORM\Column(name="avatar_filename", type="string", length=255)
     */
    private $avatarFilename = 'empty.jpg';

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    public function getCityOfResidence()
    {
        return $this->cityOfResidence;
    }

    public function setCityOfResidence($cityOfResidence)
    {
        $this->cityOfResidence = $cityOfResidence;
        return $this;
    }

    public function getCountryOfResidence()
    {
        return $this->countryOfResidence;
    }

    public function setCountryOfResidence($countryOfResidence)
    {
        $this->countryOfResidence = $countryOfResidence;
        return $this;
    }

    public function getAvatarFilename()
    {
        return $this->avatarFilename;
    }

    public function setAvatarFilename($filename)
    {
        $this->avatarFilename = $filename;
        return $this;
    }
}