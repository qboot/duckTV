<?php

namespace DuckTV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="DuckTV\AppBundle\Repository\VideoRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Video
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->broadcasts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->submissionDate = new \DateTime();
    }

    /**
     * @ORM\OneToMany(targetEntity="DuckTV\AppBundle\Entity\Broadcast", mappedBy="video", cascade={"remove"})
     */
    private $broadcasts;

    /**
     * @ORM\ManyToOne(targetEntity="DuckTV\AppBundle\Entity\User", inversedBy="videos")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="DuckTV\AppBundle\Entity\Category", inversedBy="videos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

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
     * @ORM\Column(name="video_id", type="string", length=255)
     */
    private $videoId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="channel_id", type="string", length=255)
     */
    private $channelId;

    /**
     * @var string
     *
     * @ORM\Column(name="channel_title", type="string", length=255)
     */
    private $channelTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail_standard", type="string", length=255)
     */
    private $thumbnailStandard;

    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail_maxres", type="string", length=255)
     */
    private $thumbnailMaxRes;

    private $videoUrl;

    private $channelUrl;

    /**
     * @ORM\PostLoad
     */
    public function createUrl() {
        $this->videoUrl = "https://www.youtube.com/watch?v=" . $this->videoId;
    }

    /**
     * @ORM\PostLoad
     */
    public function createChannelUrl() {
        $this->channelUrl = "https://www.youtube.com/channel/" . $this->channelId;
    }

    /**
     * Get videoUrl
     *
     * @return string
     */
    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    /**
     * Get channelUrl
     *
     * @return string
     */
    public function getChannelUrl()
    {
        return $this->channelUrl;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="submission_date", type="datetime")
     */
    private $submissionDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="submission", type="boolean")
     */
    private $submission;

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
     * Set submissionDate
     *
     * @param \DateTime $submissionDate
     *
     * @return Video
     */
    public function setSubmissionDate($submissionDate)
    {
        $this->submissionDate = $submissionDate;

        return $this;
    }

    /**
     * Get submissionDate
     *
     * @return \DateTime
     */
    public function getSubmissionDate()
    {
        return $this->submissionDate;
    }

    /**
     * Add broadcast
     *
     * @param \DuckTV\AppBundle\Entity\Broadcast $broadcast
     *
     * @return Video
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
     * Set user
     *
     * @param \DuckTV\AppBundle\Entity\User $user
     *
     * @return Video
     */
    public function setUser(\DuckTV\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \DuckTV\AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set category
     *
     * @param \DuckTV\AppBundle\Entity\Category $category
     *
     * @return Video
     */
    public function setCategory(\DuckTV\AppBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \DuckTV\AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set videoId
     *
     * @param string $videoId
     *
     * @return Video
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
     * Set title
     *
     * @param string $title
     *
     * @return Video
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Video
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set channelId
     *
     * @param string $channelId
     *
     * @return Video
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;

        return $this;
    }

    /**
     * Get channelId
     *
     * @return string
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * Set channelTitle
     *
     * @param string $channelTitle
     *
     * @return Video
     */
    public function setChannelTitle($channelTitle)
    {
        $this->channelTitle = $channelTitle;

        return $this;
    }

    /**
     * Get channelTitle
     *
     * @return string
     */
    public function getChannelTitle()
    {
        return $this->channelTitle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Video
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set thumbnailStandard
     *
     * @param string $thumbnailStandard
     *
     * @return Video
     */
    public function setThumbnailStandard($thumbnailStandard)
    {
        $this->thumbnailStandard = $thumbnailStandard;

        return $this;
    }

    /**
     * Get thumbnailStandard
     *
     * @return string
     */
    public function getThumbnailStandard()
    {
        return $this->thumbnailStandard;
    }

    /**
     * Set thumbnailMaxRes
     *
     * @param string $thumbnailMaxRes
     *
     * @return Video
     */
    public function setThumbnailMaxRes($thumbnailMaxRes)
    {
        $this->thumbnailMaxRes = $thumbnailMaxRes;

        return $this;
    }

    /**
     * Get thumbnailMaxRes
     *
     * @return string
     */
    public function getThumbnailMaxRes()
    {
        return $this->thumbnailMaxRes;
    }

    /**
     * Set submission
     *
     * @param boolean $submission
     *
     * @return Video
     */
    public function setSubmission($submission)
    {
        $this->submission = $submission;

        return $this;
    }

    /**
     * Get submission
     *
     * @return boolean
     */
    public function getSubmission()
    {
        return $this->submission;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Video
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
