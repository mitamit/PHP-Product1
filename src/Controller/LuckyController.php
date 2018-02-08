<?php
/**
 * Created by PhpStorm.
 * User: JuanMa
 * Date: 14/12/2017
 * Time: 15:42
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    public function number()
    {
        $num = mt_rand(0, 100);

        return $this->render('lucky/number.html.twig', ['num' => $num]);
    }
}