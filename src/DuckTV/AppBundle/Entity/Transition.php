<?php

namespace DuckTV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transition
 *
 * @ORM\Table(name="transition")
 * @ORM\Entity(repositoryClass="DuckTV\AppBundle\Repository\TransitionRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @var string
     *
     * @ORM\Column(name="video_title", type="string", length=255)
     */
    private $videoTitle;

    /**
     * @var int
     *
     * @ORM\Column(name="video_duration", type="integer")
     */
    private $videoDuration;

    /**
     * @var string
     *
     * @ORM\Column(name="video_thumbnail", type="string", length=255)
     */
    private $videoThumbnail;

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

    private $videoUrl;

    /**
     * @ORM\PostLoad
     */
    public function createVideoUrl() {
        $this->videoUrl = "https://www.youtube.com/watch?v=" . $this->videoId;
    }

    /**
     * Get videoUrl
     *
     * @return string
     */
    public function getVideoUrl() {
        return $this->videoUrl;
    }

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

    /**
     * Set videoTitle
     *
     * @param string $videoTitle
     *
     * @return Transition
     */
    public function setVideoTitle($videoTitle)
    {
        $this->videoTitle = $videoTitle;

        return $this;
    }

    /**
     * Get videoTitle
     *
     * @return string
     */
    public function getVideoTitle()
    {
        return $this->videoTitle;
    }

    /**
     * Set videoDuration
     *
     * @param integer $videoDuration
     *
     * @return Transition
     */
    public function setVideoDuration($videoDuration)
    {
        $this->videoDuration = $videoDuration;

        return $this;
    }

    /**
     * Get videoDuration
     *
     * @return integer
     */
    public function getVideoDuration()
    {
        return $this->videoDuration;
    }

    /**
     * Set videoThumbnail
     *
     * @param string $videoThumbnail
     *
     * @return Transition
     */
    public function setVideoThumbnail($videoThumbnail)
    {
        $this->videoThumbnail = $videoThumbnail;

        return $this;
    }

    /**
     * Get videoThumbnail
     *
     * @return string
     */
    public function getVideoThumbnail()
    {
        return $this->videoThumbnail;
    }
}
