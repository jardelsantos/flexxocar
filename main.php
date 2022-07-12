<?php

function main(){
    tela_inicial();
}

function tela_inicial(){
    global $config;

    echo $config['nome_sistema'] . "\n";
    echo 'Boas Vindas!.' . "\n";
    echo 'Informe s para entrar ou qualquer tecla para sair' ."\n";
    $tecla = readline();

    if($tecla == 's'){
        menu();
    }else{
        exit();
    }

}

function menu(){
    echo "Menu \n";
    echo "1 - Veículos \n";
    echo "2 - Clientes \n";
    echo "3 - Contratos \n";
    echo "4 - Voltar \n";
    $escolha = readline();
    opcoes($escolha);
}

function opcoes($escolha){
    switch ($escolha) {
        case '1':{
            require_once('funcionalidades/veiculos.php');
            main_veiculos();
            break;
        }
        case '2':{
            require_once('funcionalidades/clientes.php');
            main_clientes();
            break;
        }
        case '3':{
            require_once('funcionalidades/contratos.php');
            main_contratos();
            break;
        }
        default:
            tela_inicial();
            break;
    }
}