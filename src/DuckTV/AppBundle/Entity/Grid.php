<?php

namespace DuckTV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grid
 *
 * @ORM\Table(name="grid")
 * @ORM\Entity(repositoryClass="DuckTV\AppBundle\Repository\GridRepository")
 */
class Grid
{
    /**
     * @ORM\OneToMany(targetEntity="DuckTV\AppBundle\Entity\Week", mappedBy="grid")
     */
    private $weeks;

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
     * @ORM\Column(name="year", type="integer", unique=true)
     */
    private $year;

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
     * @return int
     */
    public function getYear()
    {
        return $this->year;
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
     * Constructor
     */
    public function __construct()
    {
        $this->weeks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add week
     *
     * @param \DuckTV\AppBundle\Entity\Week $week
     *
     * @return Grid
     */
    public function addWeek(\DuckTV\AppBundle\Entity\Week $week)
    {
        $this->weeks[] = $week;

        return $this;
    }

    /**
     * Remove week
     *
     * @param \DuckTV\AppBundle\Entity\Week $week
     */
    public function removeWeek(\DuckTV\AppBundle\Entity\Week $week)
    {
        $this->weeks->removeElement($week);
    }

    /**
     * Get weeks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeeks()
    {
        return $this->weeks;
    }
}
