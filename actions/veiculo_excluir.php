<?php

include_once '../config/conexao.php';

$idveiculo=$_POST['idveiculo'];

try{
  $sql = "DELETE From veiculo where idveiculo = idveiculo";

  $stmt = $conn->prepare($sql);
  $stmt->execute([
   ':idveiculo'=> $idveiculo
]);

header('Location: ../veiculos.php');

} catch (PDOException $e) {
  echo 'Erro ao Excluir:'. $e-> getMessage();
}
