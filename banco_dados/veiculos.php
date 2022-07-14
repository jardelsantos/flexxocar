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
    return mysqli_fetch_assoc($resultado);
}
function atualizar($identificador, $veiculo){
    global $link;
    $resultado = mysqli_query($link,
        "
        UPDATE veiculos 
        SET
            placa = '{$veiculo['placa']}',
            marca = '{$veiculo['marca']}', 
            modelo = '{$veiculo['modelo']}', 
            preco = '{$veiculo['preco']}'
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

