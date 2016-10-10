<?php

namespace DuckTV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Broadcast
 *
 * @ORM\Table(name="broadcast")
 * @ORM\Entity(repositoryClass="DuckTV\AppBundle\Repository\BroadcastRepository")
 */
class Broadcast
{
    /**
     * @ORM\ManyToOne(targetEntity="DuckTV\AppBundle\Entity\Video", inversedBy="broadcasts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $video;

    /**
     * @ORM\ManyToOne(targetEntity="DuckTV\AppBundle\Entity\Slot", inversedBy="broadcasts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $slot;

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
     * @ORM\Column(name="position", type="integer")
     */
    private $position;


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
     * Set position
     *
     * @param integer $position
     *
     * @return Broadcast
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set video
     *
     * @param \DuckTV\AppBundle\Entity\Video $video
     *
     * @return Broadcast
     */
    public function setVideo(\DuckTV\AppBundle\Entity\Video $video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \DuckTV\AppBundle\Entity\Video
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set slot
     *
     * @param \DuckTV\AppBundle\Entity\Slot $slot
     *
     * @return Broadcast
     */
    public function setSlot(\DuckTV\AppBundle\Entity\Slot $slot)
    {
        $this->slot = $slot;

        return $this;
    }

    /**
     * Get slot
     *
     * @return \DuckTV\AppBundle\Entity\Slot
     */
    public function getSlot()
    {
        return $this->slot;
    }
}
