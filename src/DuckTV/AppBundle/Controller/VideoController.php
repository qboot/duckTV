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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

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
    public function showAction(Video $video)
    {
        $deleteForm = $this->createDeleteForm($video);

        return $this->render('DuckTVAppBundle:Video:show.html.twig', array(
            'video' => $video,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing video entity.
     *
     */
    public function editAction(Request $request, Video $video)
    {
        $deleteForm = $this->createDeleteForm($video);
        $editForm = $this->createForm('DuckTV\AppBundle\Form\VideoType', $video);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('duck_tv_app_video_show', array('slug' => $video->getSlug()));
        }

        return $this->render('DuckTVAppBundle:Video:edit.html.twig', array(
            'video' => $video,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a video entity.
     *
     */
    public function deleteAction(Request $request, Video $video)
    {
        $form = $this->createDeleteForm($video);
        $form->handleRequest($request);

        // on trouve tous les slots rattachés à cette vidéo
        $broadcasts = $video->getBroadcasts();
        $tabSlots = [];
        foreach($broadcasts as $broadcast) {
            if(!in_array($broadcast->getSlot(), $tabSlots)) {
                $tabSlots[] = $broadcast->getSlot();
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($video);
            $em->flush();

            $updateCastsPos = $this->container->get('duck_tv_app.update_broadcasts_position');
            foreach($tabSlots as $slot) {
                $updateCastsPos->updateBroadcastsPosition($slot);
            }
        }

        return $this->redirectToRoute('duck_tv_app_video_index');
    }

    /**
     * Creates a form to delete a video entity.
     *
     * @param Video $video The video entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Video $video)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('duck_tv_app_video_delete', array('slug' => $video->getSlug())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
