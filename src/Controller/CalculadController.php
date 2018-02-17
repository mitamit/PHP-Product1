<?php
/**
 * Created by PhpStorm.
 * User: JuanMa
 * Date: 11/01/2018
 * Time: 15:24
 */

namespace App\Controller;

use App\Services\Calcu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CalculadController extends Controller
{

    public function index()
    {

        return $this->render('calcu/indice.html.twig');
    }



    public function sum()
    {
        $action = $this->generateUrl('app_resultado_sum');
        return $this->render('calcu/form.html.twig', ['action'=> $action]);
    }
    public function doSum(Request $request)
    {
        $n1 = $request->request->get('num1');
        $n2 = $request->request->get('num2');

       $model = new Calcu($n1, $n2);

        $s = $model->suma();

        return $this->render('calcu/resultado.html.twig', ['result'=> $s]);
    }


    public function resta()
    {
    $action = $this->generateUrl('app_resultado_res');
    return $this->render('calcu/form.html.twig', ['action' => $action]);
    }
    public function doResta(Request $request)
    {
        $n1 = $request->request->get('num1');
        $n2 = $request->request->get('num2');

        $model = new Calcu($n1, $n2);
        $r = $model->resta();
        return $this->render('calcu/resultado.html.twig', ['result'=>$r]);
    }




    public function multiplica()
    {
        $action = $this->generateUrl('app_resultado_mult');
        return $this->render('calcu/form.html.twig', ['action' => $action]);
    }
    public function doMultip(Request $request)
    {
        $n1 = $request->request->get('num1');
        $n2 = $request->request->get('num2');

        $model = new Calcu($n1, $n2);
        $m = $model->multiplica();

        return $this->render('calcu/resultado.html.twig', ['result'=> $m]);


    }

    public function divide()
    {
        $action = $this->generateUrl('app_resultado_divide');
        return $this->render('calcu/form.html.twig', ['action' => $action]);
    }
    public function doDivide(Request $request)
    {
        $n1 = $request->request->get('num1');
        $n2 = $request->request->get('num2');

        $model = new Calcu($n1, $n2);
        $d = $model->divide();

        return $this->render('calcu/resultado.html.twig', ['result' => $d]);
    }

}