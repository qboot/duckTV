<?php

namespace DuckTV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="DuckTV\AppBundle\Repository\VideoRepository")
 */
class Video
{
    /**
     * @ORM\OneToMany(targetEntity="DuckTV\AppBundle\Entity\Broadcast", mappedBy="video")
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="channel", type="string", length=255)
     */
    private $channel;

    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail", type="string", length=255)
     */
    private $thumbnail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="submission_date", type="datetime")
     */
    private $submissionDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="submission_validate", type="boolean")
     */
    private $submissionValidate;


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
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Video
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set channel
     *
     * @param string $channel
     *
     * @return Video
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get channel
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     *
     * @return Video
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get thumbnail
     *
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
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
     * Set submissionValidate
     *
     * @param boolean $submissionValidate
     *
     * @return Video
     */
    public function setSubmissionValidate($submissionValidate)
    {
        $this->submissionValidate = $submissionValidate;

        return $this;
    }

    /**
     * Get submissionValidate
     *
     * @return bool
     */
    public function getSubmissionValidate()
    {
        return $this->submissionValidate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->broadcasts = new \Doctrine\Common\Collections\ArrayCollection();
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
}
