<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;


class ProductController extends Controller
{
   public function index(){
       return $this->render('Product/index.html.twig');
   }

   public function newProduct(){
       $action = $this->generateUrl('app_do_crear');
       return $this->render('Product/formCrear.html.twig', ['action' => $action]);
   }

   public function newDoProduct(Request $request){

       $em = $this->getDoctrine()->getManager();
        $newProduct = new Product();
        $newProduct->setName($request->request->get('name'));
        $newProduct->setPrice($request->request->get('price'));
        $newProduct->setDescription($request->request->get('descrip'));

        $em->persist($newProduct);
        $em->flush();

        return $this->render('Product/doCrear.html.twig', ['prod' => $newProduct->getId()]);


   }
    public function showProducts(EntityManagerInterface $em){
        $productRepo = $em->getRepository('App:Product');
        $products = $productRepo->findAll();
        return $this->render('Product/lista.html.twig', ['products' => $products]);
    }

    /**
     *
     *
     * @return Response
     *
     */
    public function updateProduct($id){

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('App:Product');
        $prod = $repository->find($id);
        return $this->render('Product/formUpdate.html.twig', ['prod'=> $prod]);
    }

    /**
     * @param EntityManagerInterface $em
     * @param Request $request
     * @return Response
     */
    public function doUpdate(Request $request){
        $em = $this->getDoctrine()->getManager();

        $productRepo = $em->getRepository('App:Product');


        $id = $request->request->get('id');
        $name = $request->request->get('name');
        $price = $request->request->get('price');
        $desc = $request->request->get('descrip');

        $product = $productRepo->find($id);

        $product->setName($name);
        $product->setprice($price);
        $product->setDescription($desc);

        $em->flush();

        return $this->redirectToRoute('app_listar');

    }


    public function doRemove($id){
        $em = $this->getDoctrine()->getManager();

        $productRepo = $em->getRepository('App:Product');

       $product = $productRepo->find($id);

        $em->remove($product);

        $em->flush();

        return $this->redirectToRoute('app_listar');


    }


}