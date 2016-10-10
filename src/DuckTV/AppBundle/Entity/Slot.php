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
     * @ORM\OneToMany(targetEntity="DuckTV\AppBundle\Entity\Broadcast", mappedBy="slot")
     */
    private $broadcasts;

    /**
     * @ORM\ManyToOne(targetEntity="DuckTV\AppBundle\Entity\Day", inversedBy="slots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $day;

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
     * Set day
     *
     * @param \DuckTV\AppBundle\Entity\Day $day
     *
     * @return Slot
     */
    public function setDay(\DuckTV\AppBundle\Entity\Day $day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return \DuckTV\AppBundle\Entity\Day
     */
    public function getDay()
    {
        return $this->day;
    }
}
