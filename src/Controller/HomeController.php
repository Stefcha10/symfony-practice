<?php

namespace App\Controller;

use App\Form\ProductType;
use App\Entity\Product;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     */

    public function index(){
    
        $products= $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->render('home/index.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/product/add", name="add_product")
     * Method({"GET", "POST"})
     */

     public function add(Request $request) {

        $form = $this->createForm(ProductType::class);

              $form->handleRequest($request);

              if($form->isSubmitted() && $form->isValid()) {
                  $product = $form->getData();

                  $entityManager = $this->getDoctrine()->getManager();
                  $entityManager->persist($product);
                  $entityManager->flush();

                  return $this->redirectToRoute('home');
              }

        return $this->render('products/add.html.twig', array('form' => $form->createView()));
     }

     /**
     * @Route("/product/edit/{id}", name="edit_product")
     * Method({"GET", "POST"})
     */

    public function edit(Request $request, $id) {

       

        $product= $this->getDoctrine()->getRepository(Product::class)->find($id);

        $form = $this->createForm(ProductType::class, $product);

       
              $form->handleRequest($request);

              if($form->isSubmitted() && $form->isValid()) {
                

                  $entityManager = $this->getDoctrine()->getManager();
                  $entityManager->flush();

                  return $this->redirectToRoute('home');
              }

              return $this->render('products/edit.html.twig', array('form' => $form->createView()));
            }
             
      /**
     * @Route("/product/{id}", name="show_product")
     */

    public function showProduct($id){

        $product= $this->getDoctrine()->getRepository(Product::class)->find($id);

        return $this->render('products/show.html.twig', [
            'product' => $product
        ]);
    }




}

