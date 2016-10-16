<?php

namespace DuckTV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transition
 *
 * @ORM\Table(name="transition")
 * @ORM\Entity(repositoryClass="DuckTV\AppBundle\Repository\TransitionRepository")
 */
class Transition
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->beginning = new \DateTime();
        $this->end = new \DateTime();
    }

    /**
     * @ORM\ManyToOne(targetEntity="DuckTV\AppBundle\Entity\Grid", inversedBy="transitions")
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
     * @var int
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="video_id", type="string", length=255)
     */
    private $videoId;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Transition
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
     * Set grid
     *
     * @param \DuckTV\AppBundle\Entity\Grid $grid
     *
     * @return Transition
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
     * Set beginning
     *
     * @param \DateTime $beginning
     *
     * @return Transition
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
     * @return Transition
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
     * Set name
     *
     * @param string $name
     *
     * @return Transition
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
     * Set videoId
     *
     * @param string $videoId
     *
     * @return Transition
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;

        return $this;
    }

    /**
     * Get videoId
     *
     * @return string
     */
    public function getVideoId()
    {
        return $this->videoId;
    }
}
