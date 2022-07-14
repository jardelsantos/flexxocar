<?php
/*
$veiculos = [];

$clientes = [];

$contratos = [];
*/
$link = '';

function conexao(){
    global $link;
    $link = mysqli_connect(
        $config['database']['servidor'], 
        $config['database']['usuario'], 
        $config['database']['senha'], 
        $config['database']['banco']
    );
}
