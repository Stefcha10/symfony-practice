<?php

namespace App\Controller;

use App\Entity\Product;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function show (){

        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->render('admin/show.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/admin/delete/{id}", name="delete_product")
     * Method({"GET", "POST"})
     */
    public function delete(Request $request, $id){
        
        
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($product);
        $entityManager->flush();

        $this->addFlash('danger', 'Product deleted !');

        return $this->redirectToRoute('home');



    }


}
