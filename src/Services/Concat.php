<?php
/**
 * Created by PhpStorm.
 * User: JuanMa
 * Date: 25/01/2018
 * Time: 16:20
 */

namespace App\Services;


class Concat
{
    public $f1 = "";
    public $f2 = "";
    public $result = "";

    public function __construct($f1, $f2)
    {
        $this->setF1($f1);
        $this->setF2($f2);
    }
    public function getF1(){
        return $this->f1;
    }
    public function getF2(){
        return $this->f2;
    }
    public function setF1($f1){
        $this->f1 = $f1;
    }
    public function setF2($f2){
        $this->f2 = $f2;
    }
    public function concat(){
        $result = $this->getF1() .  $this->getF2();
        return $result;
    }
}