<?php
/**
 * Created by PhpStorm.
 * User: mazitovtr
 * Date: 20.05.19
 * Time: 9:37
 */

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="fos_user_user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="title_supplier", type="string", length=255, nullable=true)
     */
    private $titleSupplier;

    /**
     * @var string
     *
     * @ORM\Column(name="full_title_supplier", type="string", length=255, nullable=true)
     */
    private $fullTitleSupplier;

    /**
     * @var string
     *
     * @ORM\Column(name="itn_supplier", type="string", length=255, unique=true, nullable=true)
     */
    private $itnSupplier;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="text", nullable=true)
     */
    protected $imageUrl;

    /**
     * Get id
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set firstName
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set lastName
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return string
     */
    public function getTitleSupplier()
    {
        return $this->titleSupplier;
    }

    /**
     * @param string $titleSupplier
     * @return User
     */
    public function setTitleSupplier($titleSupplier)
    {
        $this->titleSupplier = $titleSupplier;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullTitleSupplier()
    {
        return $this->fullTitleSupplier;
    }

    /**
     * @param string $fullTitleSupplier
     * @return User
     */
    public function setFullTitleSupplier($fullTitleSupplier)
    {
        $this->fullTitleSupplier = $fullTitleSupplier;

        return $this;
    }

    /**
     * @return string
     */
    public function getItnSupplier()
    {
        return $this->itnSupplier;
    }

    /**
     * @param string $itnSupplier
     *
     * @return User
     */
    public function setItnSupplier($itnSupplier)
    {
        $this->itnSupplier = $itnSupplier;

        return $this;
    }
}