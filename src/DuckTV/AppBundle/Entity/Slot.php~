<?php

namespace DuckTV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Slot
 *
 * @ORM\Table(name="slot")
 * @ORM\Entity(repositoryClass="DuckTV\AppBundle\Repository\SlotRepository")
 */
class Slot
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->broadcasts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->beginning = new \DateTime();
        $this->end = new \DateTime();
    }

    /**
     * @ORM\OneToMany(targetEntity="DuckTV\AppBundle\Entity\Broadcast", mappedBy="slot")
     */
    private $broadcasts;

    /**
     * @ORM\ManyToOne(targetEntity="DuckTV\AppBundle\Entity\Grid", inversedBy="slots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $grid;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="beginning", type="datetime")
     */
    private $beginning;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime")
     */
    private $end;

    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

    /**
     * @var bool
     *
     * @ORM\Column(name="model", type="boolean")
     */
    private $model;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set beginning
     *
     * @param \DateTime $beginning
     *
     * @return Slot
     */
    public function setBeginning($beginning)
    {
        $this->beginning = $beginning;

        return $this;
    }

    /**
     * Get beginning
     *
     * @return \DateTime
     */
    public function getBeginning()
    {
        return $this->beginning;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Slot
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Slot
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Add broadcast
     *
     * @param \DuckTV\AppBundle\Entity\Broadcast $broadcast
     *
     * @return Slot
     */
    public function addBroadcast(\DuckTV\AppBundle\Entity\Broadcast $broadcast)
    {
        $this->broadcasts[] = $broadcast;

        return $this;
    }

    /**
     * Remove broadcast
     *
     * @param \DuckTV\AppBundle\Entity\Broadcast $broadcast
     */
    public function removeBroadcast(\DuckTV\AppBundle\Entity\Broadcast $broadcast)
    {
        $this->broadcasts->removeElement($broadcast);
    }

    /**
     * Get broadcasts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBroadcasts()
    {
        return $this->broadcasts;
    }

    /**
     * Set grid
     *
     * @param \DuckTV\AppBundle\Entity\Grid $grid
     *
     * @return Slot
     */
    public function setGrid(\DuckTV\AppBundle\Entity\Grid $grid)
    {
        $this->grid = $grid;

        return $this;
    }

    /**
     * Get grid
     *
     * @return \DuckTV\AppBundle\Entity\Grid
     */
    public function getGrid()
    {
        return $this->grid;
    }

    /**
     * Set model
     *
     * @param boolean $model
     *
     * @return Slot
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return boolean
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Slot
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get slot for form
     */
    public function getSelectTitle() {
        return $this->name . " " . $this->beginning->format('Y-m-d H:i:s');
    }
}
