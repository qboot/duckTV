<?php

namespace DuckTV\AppBundle\Controller;

use DuckTV\AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use DuckTV\AppBundle\Form\CategoryType;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{

    /**
     * Lists all category entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('DuckTVAppBundle:Category')->findAll();

        return $this->render('DuckTVAppBundle:Category:index.html.twig', array(
            'categories' => $categories,
        ));
    }

    /**
     * Creates a new category entity.
     *
     */
    public function newAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('duck_tv_app_category_show', array('slug' => $category->getSlug()));
        }

        return $this->render('DuckTVAppBundle:Category:new.html.twig', array(
            'category' => $category,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a category entity.
     *
     */
    public function showAction(Category $category)
    {

        $em = $this->getDoctrine()->getManager();
        $videos = $em->getRepository("DuckTVAppBundle:Video")->findBy(
            array('category' => $category)
        );

        if(empty($videos)) {
            $deleteForm = $this->createDeleteForm($category);

            return $this->render('DuckTVAppBundle:Category:show.html.twig', array(
                'category' => $category,
                'delete_form' => $deleteForm->createView(),
            ));
        } else {
           return $this->render('DuckTVAppBundle:Category:show.html.twig', array(
                'category' => $category,
            ));
        }
    }

    /**
     * Displays a form to edit an existing category entity.
     *
     */
    public function editAction(Request $request, Category $category)
    {
        $deleteForm = $this->createDeleteForm($category);
        $editForm = $this->createForm('DuckTV\AppBundle\Form\CategoryType', $category);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('duck_tv_app_category_show', array('slug' => $category->getSlug()));
        }

        return $this->render('DuckTVAppBundle:Category:edit.html.twig', array(
            'category' => $category,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a category entity.
     *
     */
    public function deleteAction(Request $request, Category $category)
    {
        $form = $this->createDeleteForm($category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($category);
            $em->flush();
        }

        return $this->redirectToRoute('duck_tv_app_category_index');
    }

    /**
     * Creates a form to delete a video entity.
     *
     * @param Category $video The video entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Category $category)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('duck_tv_app_category_delete', array('slug' => $category->getSlug())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
