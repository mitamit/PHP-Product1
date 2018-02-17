<?php

namespace App\Controller;

use App\Form\ProductType;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Tests\Input\StringInputTest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        // replace this line with your own code!
        return $this->render('Product/index.html.twig');
    }

    public function actionCrear()
    {
        $action =  $this->generateUrl('app_do_crear');
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        return $this->render('Product/formCrear.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $action

            ]
        );

    }
    public function actionDoCrear(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $m = $this->getDoctrine()->getManager();
            $m->persist($product);
            $m->flush();

            return $this->redirectToRoute('app');
        }

        return $this->render('Product/formCrear.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_do_crear')
            ]
        );
    }
    public function actionListar(EntityManagerInterface $em)
    {
        //$em = $this->getDoctrine()->getManager(); es lo mismo que entitymanagerInterface $em
        $productRepo = $em->getRepository(Product::class);
        $products = $productRepo->findAll();
        return $this->render('Product/lista.html.twig', ['products'=> $products]);

    }
    public function actionActualiza($id)
    {

       $em = $this->getDoctrine()->getManager();
       $ProdcutRepo = $em->getRepository(Product::class);
       $prod = $ProdcutRepo->find($id);

       $form = $this->createForm(ProductType::class, $prod);

       return $this->render('Product/formUpdate.html.twig',
           [
               'action' => $this->generateUrl('app_do_actualiza', ['id'=> $id]),
                'form' => $form->createView()
           ]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @return StringInputTest
     */
    public function doActionActualiza($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $productRepo = $em->getRepository(Product::class);
        $product = $productRepo->find($id);
        $form = $this->createForm(ProductType::class, $product);

        //despues de crear un form le pasamos los datos apartir de $product, los datos del id de $product
        $form->handleRequest($request);

        //si el formulario es valido:
        if($form->isValid()){
            $em->flush();
            return $this->redirectToRoute('app_listar');
        }
        return $this->render('Product/formUpdate.html.twig',
            [
                'action'    => $this->generateUrl('app_do_actualiza', ['id'=> $id]),
                'form'      => $form->createView()
            ]
        );



    }
    public function actionRemove($id)
    {
        $em = $this->getDoctrine()->getManager();
        $productRepo = $em->getRepository(Product::class);
        $product = $productRepo->find($id);

        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('app_listar');
    }
}
