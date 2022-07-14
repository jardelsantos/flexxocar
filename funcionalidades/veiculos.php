<?php

function main_veiculos(){
    echo "\n\n Veículos \n\n";
    menu_veiculos();
}
function menu_veiculos(){
    echo "Menu \n";
    echo "1 - Novo \n";
    echo "2 - Listar \n";
    echo "3 - Pesquisar Por Indentificar \n";
    echo "4 - Apagar Veículo Por Identificador \n";
    echo "5 - Atualizar Veículo Por Identificador \n";
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
        case '3':
            pesquisarPorIdentificador();
            break;
        case '4':
            apagarPorIdentificador();
            break;
        case '5':
            atualizarPorIdentificador();
            break;
        default:
            menu(); //main
            break;
    }
}
function novo_veiculo(){
    //global $veiculos;

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
    //$resultado = registraNoArquivoVeiculos($novo);
    $resultado = inserir($novo['placa'], $novo['marca'], $novo['modelo'], $novo['preco']);
    if($resultado){
        echo "\n\n Veículo cadastrado!. \n\n";
    }else{
        echo "\n\n Falha ao armazenar. \n\n";
    }

    menu_veiculos();
}
function listar_veiculo(){
    //global $veiculos;

    //$veiculos = lerArquivoVeiculos();
    $veiculos = selecionarTudo();

    if($veiculos){

        foreach($veiculos as $veiculo){
            echo "\n -------------------------- \n";
            echo "Identificador:" . $veiculo['identificador'] . "\n";
            echo "Placa:        " . $veiculo['placa']   . "\n";
            echo "Marca:        " . $veiculo['marca']   . "\n";
            echo "Modelo:       " . $veiculo['modelo']  . "\n";
            echo "Preço:        " . $veiculo['preco']   . "\n";
            echo "\n -------------------------- \n";
        }
    }else{
        echo "\n\n Falha ao ler os dados \n\n";
    }
 
    menu_veiculos();
}

/*
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

*/


function pesquisarPorIdentificador(){
    echo "\n Pesquisa por Identificador\n";

    echo "\n\n Informe o Identificador\n";
    $identificador = readline();
    
    $veiculo = pesquisar($identificador);

    if($veiculo){
        echo "\n -------------------------- \n";
        echo "Identificador:" . $veiculo['identificador'] . "\n";
        echo "Placa:        " . $veiculo['placa']   . "\n";
        echo "Marca:        " . $veiculo['marca']   . "\n";
        echo "Modelo:       " . $veiculo['modelo']  . "\n";
        echo "Preço:        " . $veiculo['preco']   . "\n";
        echo "\n -------------------------- \n";
    }else{
        echo "\nIdentificador Não localizado\n";
    }

    menu_veiculos();
}

function apagarPorIdentificador(){
    echo "\n Apagar Veículo \n";

    echo "\n\n Informe o Identificador\n";
    $identificador = readline();

    $resultado = apagar($identificador);

    if($resultado){
        echo "\n Registro Apagado com sucesso \n";
    }else{
        echo "\n Não foi possível apagar o registro \n";
    }
}


function atualizarPorIdentificador(){
    echo "\n Atualização de Dados do Veículo \n";

    echo "\n\n Informe o identificador a ser editado";
    $identificador = readline();

    $veiculo = pesquisar($identificador);

    if($veiculo){
        echo "\n -------------------------- \n";
        echo "Identificador:" . $veiculo['identificador'] . "\n";
        echo "Placa:        " . $veiculo['placa']   . "\n";
        echo "Marca:        " . $veiculo['marca']   . "\n";
        echo "Modelo:       " . $veiculo['modelo']  . "\n";
        echo "Preço:        " . $veiculo['preco']   . "\n";
        echo "\n -------------------------- \n";


        echo "\n Deseja alterar a Placa ? (s\n) \n";
        $aux = readline();
        if($aux == 's'){
            echo "\n Informe o novo valor: \n";
            $veiculo['placa'] = readline();
        }

        echo "\n Deseja alterar a Marca ? (s\n) \n";
        $aux = readline();
        if($aux == 's'){
            echo "\n Informe a nova marca: \n";
            $veiculo['marca'] = readline();
        }

        echo "\n Deseja alterar o Modelo ? (s\n) \n";
        $aux = readline();
        if($aux == 's'){
            echo "\n Informe o novo modelo: \n";
            $veiculo['modelo'] = readline();
        }

        echo "\n Deseja alterar o Preço ? (s\n) \n";
        $aux = readline();
        if($aux == 's'){
            echo "\n Informe o novo preço: \n";
            $veiculo['preco'] = readline();
        }

        $resultado = atualizar($identificador, $veiculo );

    }else{
        echo "\nIdentificador Não localizado\n";
    }

    menu_veiculos();
}