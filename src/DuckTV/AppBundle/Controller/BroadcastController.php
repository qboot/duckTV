<?php

namespace DuckTV\AppBundle\Controller;

use DuckTV\AppBundle\Entity\Broadcast;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Broadcast controller.
 *
 * @Route("broadcast")
 */
class BroadcastController extends Controller
{
    /**
     * Lists all broadcast entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $broadcasts = $em->getRepository('DuckTVAppBundle:Broadcast')->findAll();

        return $this->render('DuckTVAppBundle:Broadcast:index.html.twig', array(
            'broadcasts' => $broadcasts,
        ));
    }

    /**
     * Creates a new broadcast entity.
     */
    public function newAction(Request $request)
    {
        $broadcast = new Broadcast();
        $form = $this->createForm('DuckTV\AppBundle\Form\BroadcastType', $broadcast);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($broadcast);
            $em->flush();

            return $this->redirectToRoute('duck_tv_app_broadcast_show', array('id' => $broadcast->getId()));
        }

        return $this->render('DuckTVAppBundle:Broadcast:new.html.twig', array(
            'broadcast' => $broadcast,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a broadcast entity.
     */
    public function showAction(Broadcast $broadcast)
    {
        $deleteForm = $this->createDeleteForm($broadcast);

        return $this->render('DuckTVAppBundle:Broadcast:show.html.twig', array(
            'broadcast' => $broadcast,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing broadcast entity.
     */
    public function editAction(Request $request, Broadcast $broadcast)
    {
        $deleteForm = $this->createDeleteForm($broadcast);
        $editForm = $this->createForm('DuckTV\AppBundle\Form\BroadcastType', $broadcast);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('duck_tv_app_broadcast_edit', array('id' => $broadcast->getId()));
        }

        return $this->render('DuckTVAppBundle:Broadcast:edit.html.twig', array(
            'broadcast' => $broadcast,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a broadcast entity.
     */
    public function deleteAction(Request $request, Broadcast $broadcast)
    {
        $form = $this->createDeleteForm($broadcast);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($broadcast);
            $em->flush();
        }

        return $this->redirectToRoute('duck_tv_app_broadcast_index');
    }

    /**
     * Creates a form to delete a broadcast entity.
     */
    private function createDeleteForm(Broadcast $broadcast)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('duck_tv_app_broadcast_delete', array('id' => $broadcast->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
