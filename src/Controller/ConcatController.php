<?php
/**
 * Created by PhpStorm.
 * User: JuanMa
 * Date: 25/01/2018
 * Time: 16:21
 */

namespace App\Controller;

use App\Services\Concat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ConcatController extends Controller
{
    public function concat(){

        return $this->render('Concat/form.html.twig');

    }


    public function doConcat(Request $request){

        $fra1 = $request->request->get('fr1');
        $fra2 = $request->request->get('fr2');

        $model = new Concat($fra1, $fra2);
        $a = $model->concat();


        return $this->render('Concat/ResultConcat.html.twig', ['resultado'=> $a]);
    }

}