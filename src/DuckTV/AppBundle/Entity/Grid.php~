<?php

namespace DuckTV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Day
 *
 * @ORM\Table(name="grid")
 * @ORM\Entity(repositoryClass="DuckTV\AppBundle\Repository\GridRepository")
 */
class Grid
{
    /**
     * Constructor
     */
    public function __construct() {
        $this->slots = new ArrayCollection();
        $this->date = new \Datetime();
    }

    /**
     * @ORM\OneToMany(targetEntity="DuckTV\AppBundle\Entity\Slot", mappedBy="grid", fetch="EAGER")
     */
    private $slots;

    /**
     * @ORM\OneToMany(targetEntity="DuckTV\AppBundle\Entity\Transition", mappedBy="grid")
     */
    private $transitions;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var int
     *
     * @ORM\Column(name="weekNumber", type="integer")
     */
    private $weekNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="day", type="string", length=255)
     */
    private $day;

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
     * @return Grid
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
     * Set day
     *
     * @param string $day
     *
     * @return Grid
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set model
     *
     * @param boolean $model
     *
     * @return Grid
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
     * Add slot
     *
     * @param \DuckTV\AppBundle\Entity\Slot $slot
     *
     * @return Grid
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

    /**
     * Add transition
     *
     * @param \DuckTV\AppBundle\Entity\Transition $transition
     *
     * @return Grid
     */
    public function addTransition(\DuckTV\AppBundle\Entity\Transition $transition)
    {
        $this->transitions[] = $transition;

        return $this;
    }

    /**
     * Remove transition
     *
     * @param \DuckTV\AppBundle\Entity\Transition $transition
     */
    public function removeTransition(\DuckTV\AppBundle\Entity\Transition $transition)
    {
        $this->transitions->removeElement($transition);
    }

    /**
     * Get transitions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransitions()
    {
        return $this->transitions;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Grid
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set weekNumber
     *
     * @param integer $weekNumber
     *
     * @return Grid
     */
    public function setWeekNumber($weekNumber)
    {
        $this->weekNumber = $weekNumber;

        return $this;
    }

    /**
     * Get weekNumber
     *
     * @return integer
     */
    public function getWeekNumber()
    {
        return $this->weekNumber;
    }
}
