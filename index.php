<?php 
require_once 'Matriz.php';

// teste da matriz
$matriz1 = new Matriz(1,2);
$matriz2 = new Matriz(2,1);

print_r(Matriz::somaMatriz($matriz1,$matriz2));
