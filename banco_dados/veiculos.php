<?php

$link = '';

function conexao(){
    global $link;

    $servidor = '127.0.0.1';
    $usuario = 'root';
    $senha = '';
    $banco_de_dados = 'flexxocar';

    $link = mysqli_connect($servidor, $usuario, $senha, $banco_de_dados);
}

function inserir($placa, $marca, $modelo, $preco){
    global $link;
    if( mysqli_query($link,"INSERT INTO veiculos (placa, marca,modelo,preco) VALUES ('$placa','$marca','$modelo','$preco')") ){
        return true;
    }else{
        return false;
    }
    
}
function selecionarTudo(){
    global $link;
    $resultado = mysqli_query($link,"SELECT * FROM veiculos");

    $dados = [];
    while( $linha = mysqli_fetch_assoc($resultado)){
        $dados[] = $linha;
    }
    
    return $dados;
}
function pesquisar(){

}
function atualizar(){

}
function apagar(){

}

