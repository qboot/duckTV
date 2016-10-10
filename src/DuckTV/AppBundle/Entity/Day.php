<?php

namespace DuckTV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Day
 *
 * @ORM\Table(name="day")
 * @ORM\Entity(repositoryClass="DuckTV\AppBundle\Repository\DayRepository")
 */
class Day
{
    /**
     * @ORM\ManyToOne(targetEntity="DuckTV\AppBundle\Entity\Week", inversedBy="days")
     * @ORM\JoinColumn(nullable=false)
     */
    private $week;

    /**
     * @ORM\OneToMany(targetEntity="DuckTV\AppBundle\Entity\Slot", mappedBy="day")
     */
    private $slots;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Day
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Day
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
     * Set model
     *
     * @param boolean $model
     *
     * @return Day
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return bool
     */
    public function getModel()
    {
        return $this->model;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->slots = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set week
     *
     * @param \DuckTV\AppBundle\Entity\Week $week
     *
     * @return Day
     */
    public function setWeek(\DuckTV\AppBundle\Entity\Week $week)
    {
        $this->week = $week;

        return $this;
    }

    /**
     * Get week
     *
     * @return \DuckTV\AppBundle\Entity\Week
     */
    public function getWeek()
    {
        return $this->week;
    }

    /**
     * Add slot
     *
     * @param \DuckTV\AppBundle\Entity\Slot $slot
     *
     * @return Day
     */
    public function addSlot(\DuckTV\AppBundle\Entity\Slot $slot)
    {
        $this->slots[] = $slot;

        return $this;
    }

    /**
     * Remove slot
     *
     * @param \DuckTV\AppBundle\Entity\Slot $slot
     */
    public function removeSlot(\DuckTV\AppBundle\Entity\Slot $slot)
    {
        $this->slots->removeElement($slot);
    }

    /**
     * Get slots
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSlots()
    {
        return $this->slots;
    }
}
