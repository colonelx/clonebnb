<?php

namespace CBNBAdminBundle\Controller;

use CBNBBaseBundle\Entity\Category;
use CBNBBaseBundle\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/categories")
 */
class CategoriesController extends Controller
{
    /**
     * @Route("/list", name="admin_list_categories")
     */
    public function listAction()
    {
        $em = $this->get('doctrine')->getManager();
        $categories = $em->getRepository("CBNBBaseBundle:Category")->findAll();
        return $this->render('CBNBAdminBundle:Categories:list.html.twig', array(
            'categories' => $categories
        ));
    }

    /**
     * @Route("/add", name="admin_add_category")
     */
    public function addAction(Request $request)
    {
        $category = new Category();

        $add_form = $this->createForm(CategoryType::class, $category);
        if($request->isMethod('POST')) {
            $add_form->handleRequest($request);

            if ($add_form->isSubmitted() && $add_form->isValid()) {
                $category = $add_form->getData();

                $em = $this->get('doctrine')->getManager();
                $em->persist($category);
                $em->flush();

                return $this->redirectToRoute('admin_list_categories');
            }

            return $this->render('default/new.html.twig', array(
                'add_form' => $add_form->createView()
            ));
        }

        return $this->render('CBNBAdminBundle:Categories:add.html.twig', array(
            'add_form' => $add_form->createView()
        ));
    }



    /**
     * @Route("/edit/{id}", name="admin_edit_category")
     */
    public function editAction(Request $request, Category $category)
    {
        $edit_form = $this->createForm(CategoryType::class, $category);

        if($request->isMethod('POST')) {
            $edit_form->handleRequest($request);

            if ($edit_form->isSubmitted() && $edit_form->isValid()) {
                $category = $edit_form->getData();

                $em = $this->get('doctrine')->getManager();
                $em->merge($category);
                $em->flush();

                return $this->redirectToRoute('admin_list_categories');
            }

            return $this->render('default/edit.html.twig', array(
                'edit_form' => $edit_form->createView(),
                'category' => $category
            ));
        }

        return $this->render('CBNBAdminBundle:Categories:edit.html.twig', array(
            'edit_form' => $edit_form->createView(),
            'category' => $category
        ));
    }

    /**
     * @Route("/delete/{id}", name="admin_delete_category")
     */
    public function deleteAction(Request $request, Category $category) {
        $em = $this->get('doctrine')->getManager();
        $em->remove($category);
        $em->flush();
        return $this->redirectToRoute('admin_list_categories');
    }

}
