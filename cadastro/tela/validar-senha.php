<?php

echo '<h2>validar-senha.php</h2';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

//var_dump($usuario, $senha);

function validarLogin($usuario, $senha){
    $conexao = new PDO("mysql:host=localhost;dbname=db_login", "root", "");

    $script = "SELECT * FROM tb_cadastro WHERE usuario = '". $usuario. "' AND senha = '".$senha."'";

    $resultado = $conexao->query($script);

    $lista = $resultado->fetchAll();

    //echo '<br><pre>';
    //var_dump($lista);
    //var_dump(empty($lista));

    if(empty($lista)){
        //echo '<h2>Vc n tem acesso</h2>';
        header('Location:index.php?mensagem=1');
    } else{
        //echo '<h2>Vc tem acesso</h2>';
        header('Location:sistema.php');
    }

}
validarLogin($usuario, $senha);