<?php
/**
 * Created by PhpStorm.
 * User: Nei Rocha
 * Date: 30/08/2016
 * Time: 16:00
 */

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo", "root", "");

$stmt = $conexao->prepare("select * from aluno order by nome");
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultado as $linha){
        echo $linha['nome']." : ".$linha['nota']."<br>";
    }

    echo "-----------------------------------------<br>";
   $stmt = $conexao->prepare("select * from aluno where nota >= 7 order by nota desc");

    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultado as $linha){
        echo $linha['nome']." : ".$linha['nota']."<br>";
    }



}
catch (\PDOException $e){
    echo "Nao foi possivel estabelecer a conexao com o banco de dados: erro codigo: ".$e->getCode().": ".$e->getMessage();
}

