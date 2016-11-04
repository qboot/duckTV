<?php

namespace DuckTV\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DuckTV\AppBundle\Entity\Transition;

class LoadTransitionData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        // ne pas commit avec la clef
        // clef API Youtube Data V3
        // $apiKey = "AIzaSyCraicCKF1-xaHWjdRQnlGcBmu5ROxMxqQ";
        // $videoId = "BQCP-3czIpw";

        /* $data = file_get_contents("https://www.googleapis.com/youtube/v3/videos?key=". $apiKey ."&part=snippet&id=". $videoId);
        $json = json_decode($data);
        var_dump($json->items[0]->snippet->thumbnails); */

        $transitions = array(
            array(
                'name' => "matin-1",
                'videoId' => "r8a02zLeDzs",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(7,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(8,4),
            ),
            array(
                'name' => "matin-2",
                'videoId' => "r8a02zLeDzs",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(9,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(9,34),
            ),
            array(
                'name' => "matin-3",
                'videoId' => "BQCP-3czIpw",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(10,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(11,4),
            ),
            array(
                'name' => "midi-1",
                'videoId' => "c7FtQBSxE7s",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(12,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(12,34),
            ),
            array(
                'name' => "midi-2",
                'videoId' => "Kk62rqNj_tc",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(13,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(14,4),
            ),
            array(
                'name' => "aprem-1",
                'videoId' => "BQCP-3czIpw",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(15,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(15,34),
            ),
            array(
                'name' => "aprem-2",
                'videoId' => "Z4c7Z4yjEvg",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(16,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(17,4),
            ),
            array(
                'name' => "aprem-3",
                'videoId' => "Z4c7Z4yjEvg",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(18,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(18,34),
            ),
            array(
                'name' => "matin-1",
                'videoId' => "r8a02zLeDzs",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(7,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(8,4),
            ),
            array(
                'name' => "matin-2",
                'videoId' => "r8a02zLeDzs",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(9,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(9,34),
            ),
            array(
                'name' => "matin-3",
                'videoId' => "BQCP-3czIpw",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(10,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(11,4),
            ),
            array(
                'name' => "midi-1",
                'videoId' => "c7FtQBSxE7s",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(12,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(12,34),
            ),
            array(
                'name' => "midi-2",
                'videoId' => "Kk62rqNj_tc",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(13,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(14,4),
            ),
            array(
                'name' => "aprem-1",
                'videoId' => "BQCP-3czIpw",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(15,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(15,34),
            ),
            array(
                'name' => "aprem-2",
                'videoId' => "Z4c7Z4yjEvg",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(16,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(17,4),
            ),
            array(
                'name' => "aprem-3",
                'videoId' => "Z4c7Z4yjEvg",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(18,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(18,34),
            ),
            array(
                'name' => "matin-1",
                'videoId' => "r8a02zLeDzs",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(7,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(8,4),
            ),
            array(
                'name' => "matin-2",
                'videoId' => "r8a02zLeDzs",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(9,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(9,34),
            ),
            array(
                'name' => "matin-3",
                'videoId' => "BQCP-3czIpw",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(10,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(11,4),
            ),
            array(
                'name' => "midi-1",
                'videoId' => "c7FtQBSxE7s",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(12,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(12,34),
            ),
            array(
                'name' => "midi-2",
                'videoId' => "Kk62rqNj_tc",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(13,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(14,4),
            ),
            array(
                'name' => "aprem-1",
                'videoId' => "BQCP-3czIpw",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(15,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(15,34),
            ),
            array(
                'name' => "aprem-2",
                'videoId' => "Z4c7Z4yjEvg",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(16,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(17,4),
            ),
            array(
                'name' => "aprem-3",
                'videoId' => "Z4c7Z4yjEvg",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(18,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(18,34),
            ),
            array(
                'name' => "matin-1",
                'videoId' => "r8a02zLeDzs",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(7,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(8,4),
            ),
            array(
                'name' => "matin-2",
                'videoId' => "r8a02zLeDzs",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(9,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(9,34),
            ),
            array(
                'name' => "matin-3",
                'videoId' => "BQCP-3czIpw",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(10,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(11,4),
            ),
            array(
                'name' => "midi-1",
                'videoId' => "c7FtQBSxE7s",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(12,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(12,34),
            ),
            array(
                'name' => "midi-2",
                'videoId' => "Kk62rqNj_tc",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(13,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(14,4),
            ),
            array(
                'name' => "aprem-1",
                'videoId' => "BQCP-3czIpw",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(15,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(15,34),
            ),
            array(
                'name' => "aprem-2",
                'videoId' => "Z4c7Z4yjEvg",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(16,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(17,4),
            ),
            array(
                'name' => "aprem-3",
                'videoId' => "Z4c7Z4yjEvg",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(18,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(18,34),
            ),
            array(
                'name' => "matin-1",
                'videoId' => "r8a02zLeDzs",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(7,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(8,4),
            ),
            array(
                'name' => "matin-2",
                'videoId' => "r8a02zLeDzs",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(9,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(9,34),
            ),
            array(
                'name' => "matin-3",
                'videoId' => "BQCP-3czIpw",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(10,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(11,4),
            ),
            array(
                'name' => "midi-1",
                'videoId' => "c7FtQBSxE7s",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(12,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(12,34),
            ),
            array(
                'name' => "midi-2",
                'videoId' => "Kk62rqNj_tc",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(13,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(14,4),
            ),
            array(
                'name' => "aprem-1",
                'videoId' => "BQCP-3czIpw",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(15,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(15,34),
            ),
            array(
                'name' => "aprem-2",
                'videoId' => "Z4c7Z4yjEvg",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(16,56),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(17,4),
            ),
            array(
                'name' => "aprem-3",
                'videoId' => "Z4c7Z4yjEvg",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(18,26),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(18,34),
            ),
        );

        foreach($transitions as $tabTransition) {
            $transition = new Transition();
            $transition->setName($tabTransition["name"]);

            // info about transition video
            $transition->setVideoId($tabTransition["videoId"]);

            // info about transition datetime
            $transition->setGrid($tabTransition["day"]);
            $transition->setBeginning($tabTransition["beginning"]);
            $transition->setEnd($tabTransition["end"]);
            $transition->setDuration(8);

            // on persist
            $manager->persist($transition);
        }

        $manager->flush();

    }

    public function getOrder() {
        // load first 1 then 2 then 3 ...
        return 3;
    }
}