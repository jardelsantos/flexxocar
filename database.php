<?php
/*
$veiculos = [];

$clientes = [];

$contratos = [];
*/
$link = '';

function conexao(){
    global $link, $config;
    $link = mysqli_connect(
        $config['database']['servidor'], 
        $config['database']['usuario'], 
        $config['database']['senha'], 
        $config['database']['banco']
    );
}
