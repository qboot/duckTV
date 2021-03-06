<?php

namespace DuckTV\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DuckTV\AppBundle\Entity\Video;

class LoadVideoData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $videos = array(
            "https://www.youtube.com/watch?v=w8BzeZEGEYY&ab_channel=Fenchel&Janisch",
            "https://www.youtube.com/watch?v=XKFzEBf-K68&ab_channel=Fenchel&Janisch",
            "https://www.youtube.com/watch?v=X9PT3xxt1Qk&ab_channel=Fenchel&Janisch",
            "https://www.youtube.com/watch?v=ZOR8RUoFhI8&ab_channel=ScienceEtonnante",
            "https://www.youtube.com/watch?v=dcIlMnz90Xs&ab_channel=Gamekult",
            "https://www.youtube.com/watch?v=LEojWtOMf4k&ab_channel=Gamekult",
            "https://www.youtube.com/watch?v=JbZhM6r4Xo8&ab_channel=Gamekult",
            "https://www.youtube.com/watch?v=Hs-M1vgI_4A&ab_channel=DataGueule",
            "https://www.youtube.com/watch?v=WnxqoP-c0ZE&ab_channel=DataGueule",
            "https://www.youtube.com/watch?v=4n2tWyIuA8g&ab_channel=DataGueule",
            "https://www.youtube.com/watch?v=AtI_CQuBxlI&ab_channel=DataGueule",
            "https://www.youtube.com/watch?v=YYgy2lEbFmc&t=4s&ab_channel=DataGueule",
            "https://www.youtube.com/watch?v=l6f2EtszOwc&ab_channel=01netTV",
            "https://www.youtube.com/watch?v=BELG9sq2T-g&ab_channel=01netTV",
            "https://www.youtube.com/watch?v=2xp22IYL2uU&ab_channel=gobelins",
            "https://www.youtube.com/watch?v=y6ZmMjMdrqs&ab_channel=gobelins",
            "https://www.youtube.com/watch?v=vFART6ZMeEA&ab_channel=gobelins",
            "https://www.youtube.com/watch?v=47PKQEhIBeo&ab_channel=gobelins",
            "https://www.youtube.com/watch?v=WImOE0Pwk3M&ab_channel=gobelins",
            "https://www.youtube.com/watch?v=G0yC2ldpBFI&ab_channel=gobelins",
            "https://www.youtube.com/watch?v=4PTjT4U7Fsk&ab_channel=gobelins",
            "https://www.youtube.com/watch?v=VxhejQsrbfs&ab_channel=gobelins",
            "https://www.youtube.com/watch?v=41hI68t2hBE&t=51s&ab_channel=gobelins",
            "https://www.youtube.com/watch?v=8WiiqssAME4&t=5s&ab_channel=horizon-gull",
            "https://www.youtube.com/watch?v=ZvURR83ohcg&ab_channel=horizon-gull",
            "https://www.youtube.com/watch?v=1JQE4YZS1Cg&ab_channel=horizon-gull",
            "https://www.youtube.com/watch?v=lzugeIXsLxc&ab_channel=horizon-gull",
            "https://www.youtube.com/watch?v=URvRnL14D44&ab_channel=horizon-gull",
            "https://www.youtube.com/watch?v=5eHTuux09n4&ab_channel=BiTS,magazinepresqueculte-ARTE",
            "https://www.youtube.com/watch?v=RvxwPgrx9D0&ab_channel=BiTS,magazinepresqueculte-ARTE",
            "https://www.youtube.com/watch?v=P8FEfGlZGYk&ab_channel=BiTS,magazinepresqueculte-ARTE",
            "https://www.youtube.com/watch?v=MNPB5LKrdGg&ab_channel=BiTS,magazinepresqueculte-ARTE",
            "https://www.youtube.com/watch?v=CMVSyxU1SdE&ab_channel=Axolot",
            "https://www.youtube.com/watch?v=IyryWZuCSy8&ab_channel=Axolot",
            "https://www.youtube.com/watch?v=IvMzllKrJEQ&ab_channel=Axolot",
            "https://www.youtube.com/watch?v=WZhocuqlSr0&ab_channel=Axolot",
            "https://www.youtube.com/watch?v=lck67wOJs7U&ab_channel=Axolot",
            "https://www.youtube.com/watch?v=ZX-AbJR3AE4&ab_channel=Axolot",
            "https://www.youtube.com/watch?v=dJHIpHBTpBs&ab_channel=CINEASTUCES",
            "https://www.youtube.com/watch?v=gI4wZdttLvo&ab_channel=CINEASTUCES",
            "https://www.youtube.com/watch?v=oas2OyIS8BA&ab_channel=CINEASTUCES",
            "https://www.youtube.com/watch?v=25tigZhY6Wk&ab_channel=CINEASTUCES",
            "https://www.youtube.com/watch?v=JTr0ZLtA4AU&ab_channel=EmmanuelPampuri",
            "https://www.youtube.com/watch?v=cVLMLDL_mbc&ab_channel=RougeVertBleu",
            "https://www.youtube.com/watch?v=KP4G8KA5Zqs&ab_channel=RougeVertBleu",
            "https://www.youtube.com/watch?v=JZYdZnlZ3f4&ab_channel=RougeVertBleu",
            "https://www.youtube.com/watch?v=X9h03Sb6x6M&ab_channel=RougeVertBleu",
            "https://www.youtube.com/watch?v=eLY4F7JLZnk&ab_channel=RougeVertBleu",
            "https://www.youtube.com/watch?v=vRG1W-ee-F0&ab_channel=Sofyan",
            "https://www.youtube.com/watch?v=D5ds9Y_EwXo&ab_channel=Sofyan",
            "https://www.youtube.com/watch?v=n6w-I-6lDd0&ab_channel=Sofyan",
            "https://www.youtube.com/watch?v=7Y5F01YUoH8&ab_channel=Sofyan",
            "https://www.youtube.com/watch?v=bfI3q6gqFfk&ab_channel=Sofyan",
            "https://www.youtube.com/watch?v=j5-i8zMgR14&ab_channel=AliBenbihi",
            "https://www.youtube.com/watch?v=e87I_e15Dfw&ab_channel=AliBenbihi",
            "https://www.youtube.com/watch?v=VufDd-QL1c0&ab_channel=AlanBecker",
            "https://www.youtube.com/watch?v=GW_fdXHOWp4&ab_channel=AlanBecker",
            "https://www.youtube.com/watch?v=PCtr04cnx5A&ab_channel=AlanBecker",
            "https://www.youtube.com/watch?v=j_OyHUqIIOU&ab_channel=TheSlowMoGuys",
            "https://www.youtube.com/watch?v=NMbM-ERy2Lk&ab_channel=TheSlowMoGuys",
            "https://www.youtube.com/watch?v=OubvTOHWTms&ab_channel=TheSlowMoGuys",
            "https://www.youtube.com/watch?v=lNqChN3WHh8&ab_channel=TheSlowMoGuys",
            "https://www.youtube.com/watch?v=H93n-k3SkiQ&ab_channel=TheSlowMoGuys",
            "https://www.youtube.com/watch?v=5mZovjRlkWs&ab_channel=TheSlowMoGuys",
            "https://www.youtube.com/watch?v=zs7x1Hu29Wc&ab_channel=TheSlowMoGuys",
            "https://www.youtube.com/watch?v=GfPJeDssBOM&ab_channel=HouseholdHacker",
            "https://www.youtube.com/watch?v=SWdVeP-2-wk&ab_channel=HouseholdHacker",
            "https://www.youtube.com/watch?v=pPSb3Nzk0Og&ab_channel=HouseholdHacker",
            "https://www.youtube.com/watch?v=b6Pu7jKBKvM&ab_channel=HouseholdHacker",
            "https://www.youtube.com/watch?v=RCgIdfuQAD4&ab_channel=HouseholdHacker",
            "https://www.youtube.com/watch?v=maoFISpmlYA&ab_channel=HouseholdHacker",
            "https://www.youtube.com/watch?v=iXkwVkvNBAo&ab_channel=LesParasites",
            "https://www.youtube.com/watch?v=mPZBTfX3vqU&ab_channel=LesParasites",
            "https://www.youtube.com/watch?v=cki1P3wsJ4A&ab_channel=LesParasites",
            "https://www.youtube.com/watch?v=EwK9glIxIoo&ab_channel=LesParasites",
            "https://www.youtube.com/watch?v=r8So2NZ-3TM&ab_channel=LesParasites",
            "https://www.youtube.com/watch?v=sStaSlGFDBw&ab_channel=LesParasites",
            "https://www.youtube.com/watch?v=UEun58dq0gQ&ab_channel=LesParasites",
            "https://www.youtube.com/watch?v=0bPNAPI-ziE&ab_channel=LaVeill%C3%A9e",
            "https://www.youtube.com/watch?v=MtY1xaJzi-Y&ab_channel=LaVeill%C3%A9e",
            "https://www.youtube.com/watch?v=jhJfd0JOJyk&t=605s&ab_channel=LaVeill%C3%A9e",
            "https://www.youtube.com/watch?v=ZscE5I-4lXE&ab_channel=DrNozman",
            "https://www.youtube.com/watch?v=C5uABmjSnx8&ab_channel=DrNozman",
            "https://www.youtube.com/watch?v=UzowrRi4FgU&ab_channel=DrNozman",
            "https://www.youtube.com/watch?v=_NbslSn3C_c&ab_channel=DrNozman",
            "https://www.youtube.com/watch?v=1_BFtOeIsWE&ab_channel=DrNozman",
            "https://www.youtube.com/watch?v=5bUEYV4Rnd0&ab_channel=DrNozman",
            "https://www.youtube.com/watch?v=kDmd24YDVjQ&ab_channel=DrNozman",
            "https://www.youtube.com/watch?v=dYsn-Z1P1Cw&ab_channel=QuentinFoulley",
            "https://www.youtube.com/watch?v=Br3U0iaJZts&ab_channel=LucileFrs",
            "https://www.youtube.com/watch?v=nPd4lpqCZ_M&ab_channel=QuentinBrunet",
            "https://www.youtube.com/watch?v=b1kPdgySuAk&ab_channel=Cl%C3%A9ment.P",
            "https://www.youtube.com/watch?v=xiwyGBJa3fI&ab_channel=dawntheroad.fr",
            "https://www.youtube.com/watch?v=oAKhny-EsxM&ab_channel=Fr%C3%A9d%C3%A9ricBrandt",
            "https://www.youtube.com/watch?v=iG9CE55wbtY&ab_channel=TED",
            "https://www.youtube.com/watch?v=Ks-_Mh1QhMc&ab_channel=TED",
            "https://www.youtube.com/watch?v=Cpc-t-Uwv1I&ab_channel=TED",
            "https://www.youtube.com/watch?v=KM4Xe6Dlp0Y&ab_channel=TED",
            "https://www.youtube.com/watch?v=eIho2S0ZahI&ab_channel=TED",
            "https://www.youtube.com/watch?v=XFnGhrC_3Gs&ab_channel=TED",
            "https://www.youtube.com/watch?v=P_6vDLq64gE&ab_channel=TED",
            "https://www.youtube.com/watch?v=w2itwFJCgFQ&ab_channel=TED",
            "https://www.youtube.com/watch?v=x2sT9KoII_M&ab_channel=TED",
            "https://www.youtube.com/watch?v=aUVDOAPoZ9s",
            "https://www.youtube.com/watch?v=iTP_5CR0pRw&ab_channel=VipeRArt%27s(Nouvellecha%C3%AEne%E2%86%92L%C3%A9oLorini)",
            "https://www.youtube.com/watch?v=YmGNOqCFKLs&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=wCgs8edZGfE&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=y43hiNy6GnA&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=qX1sQeJd9Mo&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=0Wp3ApDtyJI&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=yfBJKtUAwIQ&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=XSvuzSIvXh8&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=dQD-OYjl08o&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=H6Llcz6EntM&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=E1vbdAMBe2o&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=b9EyQVb6jbs&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=bD7RTQLyBHM&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=oZmUKnYQ9ZI&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=6iRgq1gYYwc&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=wfJBjBvdVJE&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=Z0gCMixdvhE&ab_channel=KarimDebbache",
            "https://www.youtube.com/watch?v=RcGyVTAoXEU&ab_channel=TED",
            "https://www.youtube.com/watch?v=xYemnKEKx0c&ab_channel=TED",
            "https://www.youtube.com/watch?v=UyyjU8fzEYU&ab_channel=TED",
            "https://www.youtube.com/watch?v=u1K6hnm09xs&ab_channel=TED",
            "https://www.youtube.com/watch?v=CDsNZJTWw0w&ab_channel=TED",
            "https://www.youtube.com/watch?v=arj7oStGLkU&ab_channel=TED",
            "https://www.youtube.com/watch?v=0snNB1yS3IE&ab_channel=TED",
            "https://www.youtube.com/watch?v=xMj_P_6H69g&ab_channel=TED",
            "https://www.youtube.com/watch?v=8KkKuTCFvzI&ab_channel=TED",
            "https://www.youtube.com/watch?v=lPAM6STPqcA&ab_channel=Grafikart.fr",
            "https://www.youtube.com/watch?v=Djmi1WUELNo&ab_channel=Grafikart.fr",
            "https://www.youtube.com/watch?v=WkuN2JIRnEY&ab_channel=Grafikart.fr",
            "https://www.youtube.com/watch?v=Aeb_pUAIA0U&ab_channel=Grafikart.fr",
            "https://www.youtube.com/watch?v=fOuKMuaGJ54&ab_channel=Grafikart.fr",
            "https://www.youtube.com/watch?v=aBE0St5yI7U&ab_channel=Grafikart.fr",
            "https://www.youtube.com/watch?v=olKD4nAE81A&ab_channel=Grafikart.fr",
            "https://www.youtube.com/watch?v=PDGJ9K3xtmg&ab_channel=Grafikart.fr",
            "https://www.youtube.com/watch?v=VjlIECYXKlU&ab_channel=Grafikart.fr",
            "https://www.youtube.com/watch?v=GcBSq8-9wbM&ab_channel=OpenClassrooms",
            "https://www.youtube.com/watch?v=Yz2GzGg5Jw0&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=LwDMxrhjdgs&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=Sd0wbT68qHc&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=rJjXO1eYfEI&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=Bq2tB7qRUtE&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=jmlFrNavpdA&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=wfr4OQLEuSE&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=ICPW2uZ_fBI&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=KWoZDfAyxcs&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=kr42wFlHQmk&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=_SD4UJ462NM&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=-SwPreXBiRw&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=VHDsasBxyDI&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=SLYedvjo6z8&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=fZ_WMPrm5nM&ab_channel=TalesFromTheClick",
            "https://www.youtube.com/watch?v=8BM9LPDjOw0&ab_channel=ScienceEtonnante",
            "https://www.youtube.com/watch?v=1WKWEbmaN30&ab_channel=ScienceEtonnante",
            "https://www.youtube.com/watch?v=xJO5GstqTSY&t=6s&ab_channel=ScienceEtonnante",
            "https://www.youtube.com/watch?v=trWrEWfhTVg&ab_channel=ScienceEtonnante",
            "https://www.youtube.com/watch?v=nMP2lXxyPZo&ab_channel=ScienceEtonnante",
            "https://www.youtube.com/watch?v=K7JtROPr2Zs&ab_channel=Lastatistiqueexpliqu%C3%A9e%C3%A0monchat",
            "https://www.youtube.com/watch?v=vfTJ4vmIsO4&ab_channel=Lastatistiqueexpliqu%C3%A9e%C3%A0monchat",
            "https://www.youtube.com/watch?v=HRnYFpdR8WM&ab_channel=Lastatistiqueexpliqu%C3%A9e%C3%A0monchat",
            "https://www.youtube.com/watch?v=aOX0pIwBCvw&ab_channel=Lastatistiqueexpliqu%C3%A9e%C3%A0monchat",
            "https://www.youtube.com/watch?v=ntNF_VIYexQ&t=56s&ab_channel=Lastatistiqueexpliqu%C3%A9e%C3%A0monchat",
            "https://www.youtube.com/watch?v=pC2tHt7Wowg&ab_channel=LanterneCosmique",
            "https://www.youtube.com/watch?v=hsev7A4ajrg&ab_channel=LanterneCosmique",
            "https://www.youtube.com/watch?v=iTh8hxzRl4Y&ab_channel=LanterneCosmique",
            "https://www.youtube.com/watch?v=U1I38C8qIKk&t=98s&ab_channel=LanterneCosmique",
            "https://www.youtube.com/watch?v=we7z4UC5BQk&ab_channel=LanterneCosmique",
            "https://www.youtube.com/watch?v=3yRr5MSAg3k&t=54s&ab_channel=LanterneCosmique",
            "https://www.youtube.com/watch?v=9dse-QsKCds&t=9s&ab_channel=LanterneCosmique",
            "https://www.youtube.com/watch?v=jNEuxXrBx1U&t=4s&ab_channel=LanterneCosmique",
            "https://www.youtube.com/watch?v=mpyTxtnpnHY&ab_channel=LanterneCosmique",
            "https://www.youtube.com/watch?v=MtpEI4y9i_U&ab_channel=LanterneCosmique",
            "https://www.youtube.com/watch?v=JdxfhMbSwL0&ab_channel=DirtyBiology",
            "https://www.youtube.com/watch?v=OcKfWW7sAMk&ab_channel=DirtyBiology",
            "https://www.youtube.com/watch?v=940mJse7H5Q&ab_channel=DirtyBiology",
            "https://www.youtube.com/watch?v=2Yq-I4JRH7s&ab_channel=DirtyBiology",
            "https://www.youtube.com/watch?v=xtuh5zTa7mQ&ab_channel=DirtyBiology",
            "https://www.youtube.com/watch?v=6RpprimoniY&ab_channel=DirtyBiology",
            "https://www.youtube.com/watch?v=zb98HSJVHWk&ab_channel=DirtyBiology",
            "https://www.youtube.com/watch?v=h8zIfkMp08U&ab_channel=LiuKwun",
            "https://www.youtube.com/watch?v=Mz148iX3CAk&ab_channel=LiuKwun",
            "https://www.youtube.com/watch?v=ZRgBPQxM9l0&ab_channel=LiuKwun",
            "https://www.youtube.com/watch?v=xrx0NZLH_7c&ab_channel=LiuKwun",
            "https://www.youtube.com/watch?v=KSUKjUgkas4&ab_channel=LesRevuesduMonde",
            "https://www.youtube.com/watch?v=55u-vBtTNIM&t=514s&ab_channel=LesRevuesduMonde",
            "https://www.youtube.com/watch?v=pwFLC4XLWQ4&ab_channel=LesRevuesduMonde",
            "https://www.youtube.com/watch?v=ltnm9qa_3rg&ab_channel=LesRevuesduMonde",
            "https://www.youtube.com/watch?v=m2iELDyFEbw&ab_channel=LesRevuesduMonde",
            "https://www.youtube.com/watch?v=gpq_P40iNUs&ab_channel=LesRevuesduMonde",
            "https://www.youtube.com/watch?v=6MBkkmgb74s&ab_channel=LesRevuesduMonde",
            "https://www.youtube.com/watch?v=oR5z7DXlWXs&ab_channel=LesRevuesduMonde",
            "https://www.youtube.com/watch?v=J11rH3cLMi8&ab_channel=LesRevuesduMonde",
            "https://www.youtube.com/watch?v=WivgM01sWBc&ab_channel=LesRevuesduMonde",
            "https://www.youtube.com/watch?v=fgCp5kDIayg&ab_channel=onrefaitlemac",
            "https://www.youtube.com/watch?v=BtI1ROoAofY&ab_channel=onrefaitlemac",
            "https://www.youtube.com/watch?v=GQDT_UV2wIg&t=979s&ab_channel=onrefaitlemac",
            "https://www.youtube.com/watch?v=phbNRqnGLyw&ab_channel=FrenchBall"
        );

        for($i=0;$i<count($videos);$i++) {
            $video = new Video();

            $video->setVideoUrl($videos[$i]);
            $video->setCategory($this->getReference("defaut"));
            $video->setSubmissionDate(new \DateTime());
            $video->setUser($this->getReference("admin"));

            $video->setSubmission(false);

            $manager->persist($video);

            $this->addReference('video-'.($i+1), $video);
        }

        $manager->flush();

    }

    public function getOrder() {
        // load first 1 then 2 then 3 ...
        return 6;
    }
}
