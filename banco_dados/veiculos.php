<?php

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
function pesquisar($identificador){
    global $link;
    $resultado = mysqli_query($link,"SELECT * FROM veiculos WHERE identificador = '$identificador'");
    $dados = [];
    while( $linha = mysqli_fetch_assoc($resultado)){
        $dados[] = $linha;
    }
    
    return $dados;
}
function atualizar($identificador, $placa, $marca, $modelo, $preco){
    global $link;
    $resultado = mysqli_query($link,
        "
        UPDATE veiculos 
        SET
            placa = '$placa',
            marca = '$marca', 
            modelo = '$modelo', 
            preco = '$preco'
        WHERE 
            identificador = '$identificador'
        "
    );

    if($resultado){
        return true;
    }else{
        return false;
    }
}
function apagar($identificador){
    global $link;
    
    $resultado = mysqli_query($link, "DELETE FROM veiculos WHERE identificador = '$identificador'");

    if($resultado){
        return true;
    }else{
        return false;
    }
}

