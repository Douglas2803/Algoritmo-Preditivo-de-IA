<?php

use Matriz as GlobalMatriz;

class Matriz {
    private $linhas, $colunas;
    private $data = [];
    //criaçao da matriz
    public function __construct($linhas, $colunas)
    {
        $this->linhas = $linhas;
        $this->colunas = $colunas;

        for ($i = 0; $i < $linhas; $i++) {
            $array = [];
            for ($j = 0; $j < $colunas; $j++) {
                // teste com número randômico
                $array[] = rand(0, 10000) / 10000;
            }
            $this->data[] = $array;
        }
    }

    function customMap($data, $func) {
        $result = array();
    
        for ($i = 0; $i < count($data); $i++) {
            $subArray = array();
            for ($j = 0; $j < count($data[$i]); $j++) {
                $subArray[] = $func($data[$i][$j], $i, $j);
            }
            $result[] = $subArray;
        }
    
        return $result;
    }

    // Soma de uma matriz com outra (bias)
    public static function somaMatriz($a, $b) {
        $matriz = new Matriz($a->getLinhas(), $a->getColunas());
        
        $matriz->setData($matriz->customMap($a->getData(), function($num, $i, $j) use ($a, $b) {
            $valorA = $a->getElemento($i, $j);
            $valorB = $b->getElemento($i, $j);
            return $valorA + $valorB;
        }));
    
        return $matriz;
    }

    public static function multiplicaMatriz(){
        
    }
    

    public function getLinhas() {
        return $this->linhas;
    }

    public function setLinhas($linhas) {
        $this->linhas = $linhas;
    }

    public function getColunas() {
        return $this->colunas;
    }

    public function setColunas($colunas) {
        $this->colunas = $colunas;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

}
?>