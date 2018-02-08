<?php
/**
 * Created by PhpStorm.
 * User: JuanMa
 * Date: 11/01/2018
 * Time: 15:18
 */
namespace App\Services;


class Calcu
{
    private $n1;
    private $n2;


    public function __construct($n1, $n2)
    {
        $this->setN1($n1);
        $this->setN2($n2);
    }
    public function setN1($n1){
        $this->n1 = $n1;
    }
    public function getN1(){
        return $this->n1;
    }
    public function setN2($n2){
        $this->n2 = $n2;
    }
    public function getN2(){
        return $this->n2;
    }

    public function suma(){
        $su = $this->getN1() + $this->getN2();
        return $su;
    }
    public function resta(){
        $re = $this->getN1() - $this->getN2();
        return $re;
    }
    public function multiplica(){
        $mu = $this->getN1() * $this->getN2();
        return $mu;
    }
    public function divide(){
        $di = $this->getN1() / $this->getN2();
        return $di;
    }
}