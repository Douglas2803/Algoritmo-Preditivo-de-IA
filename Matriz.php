<?php

class Matrix {
    private $linhas, $colunas;
    private $data = [];

    public function __construct($linhas, $colunas)
    {
        $this->linhas = $linhas;
        $this->colunas = $colunas;

        for ($i = 0; $i < $linhas; $i++) {
            $array = [];
            for ($j = 0; $j < $colunas; $j++) {
                $array[] = rand(0, 10000) / 10000;
            }
            $this->data[] = $array;
        }
    }

    public function customMap($func) {
        $result = [];

        for ($i = 0; $i < $this->linhas; $i++) {
            $subArray = [];
            for ($j = 0; $j < $this->colunas; $j++) {
                $subArray[] = $func($this->data[$i][$j], $i, $j);
            }
            $result[] = $subArray;
        }

        return $result;
    }

    public static function somaMatriz($a, $b) {
        $matriz = new Matrix($a->getLinhas(), $a->getColunas());

        $matriz->setData($matriz->customMap(function($num, $i, $j) use ($a, $b) {
            $valorA = $a->getElemento($i, $j);
            $valorB = $b->getElemento($i, $j);
            return $valorA + $valorB;
        }));

        return $matriz;
    }

    public static function multiplicaMatriz($a, $b) {
        $matrix = new Matrix($a->getLinhas(), $b->getColunas());

        $matrix->setData($matrix->customMap(function($num, $i, $j) use ($a, $b) {
            $sum = 0;
            for ($k = 0; $k < $a->getColunas(); $k++) {
                $elm1 = $a->getElemento($i, $k);
                $elm2 = $b->getElemento($k, $j);
                $sum += $elm1 * $elm2;
            }

            return $sum;
        }));

        return $matrix;
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

    public function getElemento($i, $j) {
        return $this->data[$i][$j];
    }
}
