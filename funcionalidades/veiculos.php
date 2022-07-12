<?php

function main_veiculos(){
    echo "\n\n Veículos \n\n";
    menu_veiculos();
}

function menu_veiculos(){
    echo "Menu \n";
    echo "1 - Novo \n";
    echo "2 - Listar \n";
    echo "9 - Voltar \n";
    $escolha = readline();
    opcoes_veiculos($escolha);
}
function opcoes_veiculos($escolha){
    switch ($escolha) {
        case '1':
            novo_veiculo();
            break;
        case '2':
            listar_veiculo();
            break;
        default:
            menu(); //main
            break;
    }
}
function novo_veiculo(){
    global $veiculos;

    $novo = [];
    echo "\n Cadastro de Novo Veículo \n\n";
    
    echo "Informe Placa \n";
    $novo['placa'] = readline();
    echo "Informe Marca \n";
    $novo['marca'] = readline();
    echo "Informe Modelo \n";
    $novo['modelo'] = readline();
    echo "Informe Preço \n";
    $novo['preco'] = readline();

    //$veiculos[] = $novo;
    $resultado = registraNoArquivoVeiculos($novo);
    if($resultado){
        echo "\n\n Veículo cadastrado!. \n\n";
    }else{
        echo "\n\n Falha ao armazenar. \n\n";
    }

    menu_veiculos();
}
function listar_veiculo(){
    //global $veiculos;

    $veiculos = lerArquivoVeiculos();

    if($veiculos){

        foreach($veiculos as $chave => $veiculo){
            echo "\n -------------------------- \n";
            echo "Identificador ". $chave . "\n";
            echo "Placa:    " . $veiculo['placa']   . "\n";
            echo "Marca:    " . $veiculo['marca']   . "\n";
            echo "Modelo:   " . $veiculo['modelo']  . "\n";
            echo "Preço:    " . $veiculo['preco']   . "\n";
            echo "\n -------------------------- \n";
        }
    }else{
        echo "\n\n Falha ao ler os dados \n\n";
    }
 
    menu_veiculos();
}


function registraNoArquivoVeiculos($novo){
    $veiculos = fopen('veiculos.dat','a');
    //Placa;Marca;Modelo;Preço
    $linha = $novo['placa']  . ';' . 
             $novo['marca']  . ';' . 
             $novo['modelo'] . ';' . 
             $novo['preco']  . "\n";

    if( fwrite($veiculos, $linha)){
        return true;
    }else{
        return false;
    }
}

function lerArquivoVeiculos(){
    $veiculos = [];

    $arquivo = fopen('veiculos.dat', 'r');
    if($arquivo){
        while( !feof($arquivo)){
            $linha = fgets($arquivo);
            //Placa;Marca;Modelo;Preço
            $dados = explode(';', $linha);
            //print_r($dados);
        
            if( count($dados) > 0 and $dados[0] != ''){
                //0;1;2;3
                $auxiliar = [];
                $auxiliar['placa'] = $dados[0];
                $auxiliar['marca'] = $dados[1];
                $auxiliar['modelo'] = $dados[2];
                $auxiliar['preco'] = $dados[3];

                $veiculos[] = $auxiliar;
            }
        } 
    }else{
        return false;
    }

    return $veiculos;
}