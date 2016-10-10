<?php

namespace DuckTV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Week
 *
 * @ORM\Table(name="week")
 * @ORM\Entity(repositoryClass="DuckTV\AppBundle\Repository\WeekRepository")
 */
class Week
{
    /**
     * @ORM\ManyToOne(targetEntity="DuckTV\AppBundle\Entity\Grid", inversedBy="weeks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $grid;

    /**
     * @ORM\OneToMany(targetEntity="DuckTV\AppBundle\Entity\Day", mappedBy="week")
     */
    private $days;

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
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

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
     * Set number
     *
     * @param integer $number
     *
     * @return Week
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set model
     *
     * @param boolean $model
     *
     * @return Week
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
        $this->days = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set grid
     *
     * @param \DuckTV\AppBundle\Entity\Grid $grid
     *
     * @return Week
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
     * Add day
     *
     * @param \DuckTV\AppBundle\Entity\Day $day
     *
     * @return Week
     */
    public function addDay(\DuckTV\AppBundle\Entity\Day $day)
    {
        $this->days[] = $day;

        return $this;
    }

    /**
     * Remove day
     *
     * @param \DuckTV\AppBundle\Entity\Day $day
     */
    public function removeDay(\DuckTV\AppBundle\Entity\Day $day)
    {
        $this->days->removeElement($day);
    }

    /**
     * Get days
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDays()
    {
        return $this->days;
    }
}
