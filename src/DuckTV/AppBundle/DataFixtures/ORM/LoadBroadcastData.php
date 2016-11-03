<?php

namespace DuckTV\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DuckTV\AppBundle\Entity\Broadcast;

class LoadBroadcastData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $broadcasts = array(
            array(
                'slot' => $this->getReference("lundi-matin-1"),
                'video' => $this->getReference("video-1"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("lundi-matin-1"),
                'video' => $this->getReference("video-36"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("lundi-matin-1"),
                'video' => $this->getReference("video-47"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("lundi-matin-1"),
                'video' => $this->getReference("video-57"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("lundi-matin-1"),
                'video' => $this->getReference("video-67"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("lundi-matin-1"),
                'video' => $this->getReference("video-77"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("lundi-matin-1"),
                'video' => $this->getReference("video-80"),
                'position' => 7
            ),
            array(
                'slot' => $this->getReference("lundi-matin-2"),
                'video' => $this->getReference("video-6"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("lundi-matin-2"),
                'video' => $this->getReference("video-46"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("lundi-matin-2"),
                'video' => $this->getReference("video-78"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("lundi-matin-2"),
                'video' => $this->getReference("video-58"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("lundi-matin-2"),
                'video' => $this->getReference("video-68"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("lundi-matin-2"),
                'video' => $this->getReference("video-59"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("lundi-matin-2"),
                'video' => $this->getReference("video-69"),
                'position' => 7
            ),
            array(
                'slot' => $this->getReference("lundi-matin-3"),
                'video' => $this->getReference("video-11"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("lundi-matin-3"),
                'video' => $this->getReference("video-56"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("lundi-matin-3"),
                'video' => $this->getReference("video-16"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("lundi-matin-3"),
                'video' => $this->getReference("video-99"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("lundi-matin-3"),
                'video' => $this->getReference("video-100"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("lundi-matin-3"),
                'video' => $this->getReference("video-101"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("lundi-midi-1"),
                'video' => $this->getReference("video-66"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("lundi-midi-1"),
                'video' => $this->getReference("video-89"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("lundi-midi-1"),
                'video' => $this->getReference("video-90"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("lundi-midi-1"),
                'video' => $this->getReference("video-91"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("lundi-midi-1"),
                'video' => $this->getReference("video-92"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("lundi-midi-1"),
                'video' => $this->getReference("video-93"),
                'position' => 7
            ),
            array(
                'slot' => $this->getReference("lundi-midi-1"),
                'video' => $this->getReference("video-94"),
                'position' => 8
            ),
            array(
                'slot' => $this->getReference("lundi-midi-1"),
                'video' => $this->getReference("video-95"),
                'position' => 9
            ),
            array(
                'slot' => $this->getReference("lundi-midi-1"),
                'video' => $this->getReference("video-96"),
                'position' => 10
            ),
            array(
                'slot' => $this->getReference("lundi-midi-1"),
                'video' => $this->getReference("video-97"),
                'position' => 11
            ),
            array(
                'slot' => $this->getReference("lundi-midi-1"),
                'video' => $this->getReference("video-98"),
                'position' => 12
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-1"),
                'video' => $this->getReference("video-21"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-1"),
                'video' => $this->getReference("video-102"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-1"),
                'video' => $this->getReference("video-104"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-2"),
                'video' => $this->getReference("video-26"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-2"),
                'video' => $this->getReference("video-76"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-2"),
                'video' => $this->getReference("video-103"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-3"),
                'video' => $this->getReference("video-31"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-3"),
                'video' => $this->getReference("video-45"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-3"),
                'video' => $this->getReference("video-86"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-3"),
                'video' => $this->getReference("video-105"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-3"),
                'video' => $this->getReference("video-106"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-3"),
                'video' => $this->getReference("video-107"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("lundi-aprem-3"),
                'video' => $this->getReference("video-108"),
                'position' => 7
            ),
            array(
                'slot' => $this->getReference("mardi-matin-1"),
                'video' => $this->getReference("video-2"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mardi-matin-1"),
                'video' => $this->getReference("video-55"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mardi-matin-1"),
                'video' => $this->getReference("video-109"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mardi-matin-1"),
                'video' => $this->getReference("video-110"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("mardi-matin-1"),
                'video' => $this->getReference("video-111"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("mardi-matin-1"),
                'video' => $this->getReference("video-112"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("mardi-matin-1"),
                'video' => $this->getReference("video-113"),
                'position' => 7
            ),
            array(
                'slot' => $this->getReference("mardi-matin-2"),
                'video' => $this->getReference("video-7"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mardi-matin-2"),
                'video' => $this->getReference("video-65"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mardi-matin-2"),
                'video' => $this->getReference("video-84"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mardi-matin-3"),
                'video' => $this->getReference("video-12"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mardi-matin-3"),
                'video' => $this->getReference("video-75"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mardi-matin-3"),
                'video' => $this->getReference("video-132"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mardi-midi-1"),
                'video' => $this->getReference("video-17"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mardi-midi-1"),
                'video' => $this->getReference("video-85"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mardi-midi-1"),
                'video' => $this->getReference("video-140"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mardi-midi-1"),
                'video' => $this->getReference("video-141"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("mardi-midi-1"),
                'video' => $this->getReference("video-142"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("mardi-midi-1"),
                'video' => $this->getReference("video-143"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("mardi-midi-1"),
                'video' => $this->getReference("video-144"),
                'position' => 7
            ),
            array(
                'slot' => $this->getReference("mardi-midi-1"),
                'video' => $this->getReference("video-145"),
                'position' => 8
            ),
            array(
                'slot' => $this->getReference("mardi-midi-1"),
                'video' => $this->getReference("video-146"),
                'position' => 9
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-1"),
                'video' => $this->getReference("video-22"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-1"),
                'video' => $this->getReference("video-44"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-1"),
                'video' => $this->getReference("video-163"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-1"),
                'video' => $this->getReference("video-164"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-1"),
                'video' => $this->getReference("video-165"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-1"),
                'video' => $this->getReference("video-166"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-1"),
                'video' => $this->getReference("video-167"),
                'position' => 7
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-1"),
                'video' => $this->getReference("video-168"),
                'position' => 8
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-1"),
                'video' => $this->getReference("video-169"),
                'position' => 9
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-1"),
                'video' => $this->getReference("video-170"),
                'position' => 10
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-2"),
                'video' => $this->getReference("video-27"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-2"),
                'video' => $this->getReference("video-54"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-2"),
                'video' => $this->getReference("video-171"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-2"),
                'video' => $this->getReference("video-172"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-2"),
                'video' => $this->getReference("video-173"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-3"),
                'video' => $this->getReference("video-32"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-3"),
                'video' => $this->getReference("video-64"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-3"),
                'video' => $this->getReference("video-194"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-3"),
                'video' => $this->getReference("video-195"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-3"),
                'video' => $this->getReference("video-196"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("mardi-aprem-3"),
                'video' => $this->getReference("video-200"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("mercredi-matin-1"),
                'video' => $this->getReference("video-3"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mercredi-matin-1"),
                'video' => $this->getReference("video-74"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mercredi-matin-1"),
                'video' => $this->getReference("video-122"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mercredi-matin-1"),
                'video' => $this->getReference("video-123"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("mercredi-matin-1"),
                'video' => $this->getReference("video-124"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("mercredi-matin-1"),
                'video' => $this->getReference("video-125"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("mercredi-matin-2"),
                'video' => $this->getReference("video-8"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mercredi-matin-3"),
                'video' => $this->getReference("video-13"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mercredi-matin-3"),
                'video' => $this->getReference("video-43"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mercredi-matin-3"),
                'video' => $this->getReference("video-134"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mercredi-matin-3"),
                'video' => $this->getReference("video-135"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("mercredi-matin-3"),
                'video' => $this->getReference("video-139"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mercredi-midi-1"),
                'video' => $this->getReference("video-18"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mercredi-midi-1"),
                'video' => $this->getReference("video-53"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mercredi-midi-1"),
                'video' => $this->getReference("video-197"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-1"),
                'video' => $this->getReference("video-23"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-1"),
                'video' => $this->getReference("video-63"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-1"),
                'video' => $this->getReference("video-156"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-1"),
                'video' => $this->getReference("video-158"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-1"),
                'video' => $this->getReference("video-159"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-1"),
                'video' => $this->getReference("video-160"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-1"),
                'video' => $this->getReference("video-161"),
                'position' => 7
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-1"),
                'video' => $this->getReference("video-162"),
                'position' => 8
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-2"),
                'video' => $this->getReference("video-28"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-2"),
                'video' => $this->getReference("video-73"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-2"),
                'video' => $this->getReference("video-174"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-2"),
                'video' => $this->getReference("video-175"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-2"),
                'video' => $this->getReference("video-176"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-2"),
                'video' => $this->getReference("video-181"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-3"),
                'video' => $this->getReference("video-33"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-3"),
                'video' => $this->getReference("video-83"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-3"),
                'video' => $this->getReference("video-186"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-3"),
                'video' => $this->getReference("video-190"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("mercredi-aprem-3"),
                'video' => $this->getReference("video-192"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-1"),
                'video' => $this->getReference("video-4"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-1"),
                'video' => $this->getReference("video-42"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-1"),
                'video' => $this->getReference("video-114"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-1"),
                'video' => $this->getReference("video-115"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-1"),
                'video' => $this->getReference("video-116"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-1"),
                'video' => $this->getReference("video-117"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-2"),
                'video' => $this->getReference("video-9"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-2"),
                'video' => $this->getReference("video-52"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-2"),
                'video' => $this->getReference("video-126"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-2"),
                'video' => $this->getReference("video-127"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-2"),
                'video' => $this->getReference("video-128"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-2"),
                'video' => $this->getReference("video-129"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-3"),
                'video' => $this->getReference("video-14"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-3"),
                'video' => $this->getReference("video-62"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("jeudi-matin-3"),
                'video' => $this->getReference("video-133"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("jeudi-midi-1"),
                'video' => $this->getReference("video-19"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("jeudi-midi-1"),
                'video' => $this->getReference("video-72"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("jeudi-midi-1"),
                'video' => $this->getReference("video-198"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-1"),
                'video' => $this->getReference("video-24"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-1"),
                'video' => $this->getReference("video-82"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-1"),
                'video' => $this->getReference("video-147"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-1"),
                'video' => $this->getReference("video-148"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-1"),
                'video' => $this->getReference("video-149"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-1"),
                'video' => $this->getReference("video-150"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-2"),
                'video' => $this->getReference("video-29"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-2"),
                'video' => $this->getReference("video-41"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-2"),
                'video' => $this->getReference("video-177"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-2"),
                'video' => $this->getReference("video-178"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-2"),
                'video' => $this->getReference("video-179"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-2"),
                'video' => $this->getReference("video-180"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-2"),
                'video' => $this->getReference("video-181"),
                'position' => 7
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-2"),
                'video' => $this->getReference("video-182"),
                'position' => 8
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-3"),
                'video' => $this->getReference("video-34"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-3"),
                'video' => $this->getReference("video-51"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-3"),
                'video' => $this->getReference("video-185"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-3"),
                'video' => $this->getReference("video-193"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("jeudi-aprem-3"),
                'video' => $this->getReference("video-191"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-1"),
                'video' => $this->getReference("video-5"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-1"),
                'video' => $this->getReference("video-61"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-1"),
                'video' => $this->getReference("video-118"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-1"),
                'video' => $this->getReference("video-119"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-1"),
                'video' => $this->getReference("video-120"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-2"),
                'video' => $this->getReference("video-10"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-2"),
                'video' => $this->getReference("video-71"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-2"),
                'video' => $this->getReference("video-130"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-2"),
                'video' => $this->getReference("video-131"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-3"),
                'video' => $this->getReference("video-15"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-3"),
                'video' => $this->getReference("video-136"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-3"),
                'video' => $this->getReference("video-137"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("vendredi-matin-3"),
                'video' => $this->getReference("video-138"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("vendredi-midi-1"),
                'video' => $this->getReference("video-20"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("vendredi-midi-1"),
                'video' => $this->getReference("video-40"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("vendredi-midi-1"),
                'video' => $this->getReference("video-121"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("vendredi-midi-1"),
                'video' => $this->getReference("video-81"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("vendredi-midi-1"),
                'video' => $this->getReference("video-199"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-1"),
                'video' => $this->getReference("video-25"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-1"),
                'video' => $this->getReference("video-50"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-1"),
                'video' => $this->getReference("video-151"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-1"),
                'video' => $this->getReference("video-152"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-1"),
                'video' => $this->getReference("video-153"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-1"),
                'video' => $this->getReference("video-154"),
                'position' => 6
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-1"),
                'video' => $this->getReference("video-155"),
                'position' => 7
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-1"),
                'video' => $this->getReference("video-157"),
                'position' => 9
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-2"),
                'video' => $this->getReference("video-30"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-2"),
                'video' => $this->getReference("video-60"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-2"),
                'video' => $this->getReference("video-183"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-2"),
                'video' => $this->getReference("video-187"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-2"),
                'video' => $this->getReference("video-70"),
                'position' => 5
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-3"),
                'video' => $this->getReference("video-35"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-3"),
                'video' => $this->getReference("video-184"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-3"),
                'video' => $this->getReference("video-188"),
                'position' => 4
            ),
            array(
                'slot' => $this->getReference("vendredi-aprem-3"),
                'video' => $this->getReference("video-189"),
                'position' => 5
            ),
        );

        foreach($broadcasts as $tabBroadcast) {
            $broadcast = new Broadcast();

            $broadcast->setSlot($tabBroadcast["slot"]);
            $broadcast->setVideo($tabBroadcast["video"]);
            $broadcast->setPosition($tabBroadcast["position"]);

            $manager->persist($broadcast);
        }

        $manager->flush();
    }

    public function getOrder() {
        // load first 1 then 2 then 3 ...
        return 7;
    }
}