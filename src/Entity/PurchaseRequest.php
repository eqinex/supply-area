<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="purchase_request")
 * @ORM\Entity(repositoryClass="App\Repository\PurchaseRequestRepository")
 */
class PurchaseRequest
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="olymp_request_id", type="string", length=255, unique=true)
     */
    private $olympRequest;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="PurchaseRequestItem", mappedBy="purchaseRequest", cascade="all")
     */
    private $items;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    private $createdAt;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

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
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return PurchaseRequest
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return int
     */
    public function getOlympRequest()
    {
        return $this->olympRequest;
    }

    /**
     * @param int $olympRequest
     * @return PurchaseRequest
     */
    public function setOlympRequest($olympRequest)
    {
        $this->olympRequest = $olympRequest;
        return $this;
    }

    /**
     * @return \DateTime()
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return PurchaseRequest
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return PurchaseRequest
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param $items
     * @return $this
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }
}
