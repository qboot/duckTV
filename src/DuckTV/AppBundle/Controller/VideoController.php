<?php

namespace DuckTV\AppBundle\Controller;

use DuckTV\AppBundle\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use DuckTV\AppBundle\Form\VideoType;

/**
 * Video controller.
 *
 */
class VideoController extends Controller
{

    /**
     * Lists all video entities.
     *
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $v = $request->request->get('video');

        // on supprime la vidéo
        if(isset($v) && !empty($v)) {
            $video = $em->getRepository("DuckTVAppBundle:Video")->find($v);

            // on trouve tous les slots rattachés à cette vidéo
            $broadcasts = $video->getBroadcasts();
            $tabSlots = [];
            foreach($broadcasts as $broadcast) {
                if(!in_array($broadcast->getSlot(), $tabSlots)) {
                    $tabSlots[] = $broadcast->getSlot();
                }
            }

            // puis on la supprime
            $em->remove($video);
            $em->flush();

            // puis on met à jour les pos
            $updateCastsPos = $this->container->get('duck_tv_app.update_broadcasts_position');
            foreach($tabSlots as $slot) {
                $updateCastsPos->updateBroadcastsPosition($slot);
            }
        }

        $videos = $em->getRepository('DuckTVAppBundle:Video')->findAll();

        return $this->render('DuckTVAppBundle:Video:index.html.twig', array(
            'videos' => $videos,
        ));
    }

    /**
     * Creates a new video entity.
     *
     */
    public function newAction(Request $request)
    {
        $video = new Video();
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);

        $user = $this->get('security.token_storage')->getToken()->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $video->setUser($user);

            // on teste l'url
                // function from Url -> Id Service
                $urlToId = $this->container->get('duck_tv_app.video_url_to_video_id');

                $vidId = $urlToId->VideoUrlToVideoId($video->getVideoUrl());

                // url ne provient pas de youtube on redirige
                if($vidId === false) {
                    return $this->render('DuckTVAppBundle:Video:new.html.twig', array(
                        'video' => $video,
                        'form' => $form->createView(),
                    ));
                }
            // fin test

            $em->persist($video);
            $em->flush();

            return $this->redirectToRoute('duck_tv_app_video_show', array('slug' => $video->getSlug()));
        }

        return $this->render('DuckTVAppBundle:Video:new.html.twig', array(
            'video' => $video,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a video entity.
     *
     */
    public function showAction(Request $request, Video $video)
    {
        $em = $this->getDoctrine()->getManager();

        $v = $request->request->get('video');

        // on supprime la vidéo
        if(isset($v) && !empty($v)) {

            // on trouve tous les slots rattachés à cette vidéo
            $broadcasts = $video->getBroadcasts();
            $tabSlots = [];
            foreach($broadcasts as $broadcast) {
                if(!in_array($broadcast->getSlot(), $tabSlots)) {
                    $tabSlots[] = $broadcast->getSlot();
                }
            }

            // puis on la supprime
            $em->remove($video);
            $em->flush();

            // puis on met à jour les pos
            $updateCastsPos = $this->container->get('duck_tv_app.update_broadcasts_position');
            foreach($tabSlots as $slot) {
                $updateCastsPos->updateBroadcastsPosition($slot);
            }

            // on redirige vers la page index vidéo
            $videos = $em->getRepository('DuckTVAppBundle:Video')->findAll();

            return $this->render('DuckTVAppBundle:Video:index.html.twig', array(
                'videos' => $videos,
            ));

        }

        return $this->render('DuckTVAppBundle:Video:show.html.twig', array(
            'video' => $video
        ));
    }
}
