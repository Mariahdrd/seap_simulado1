<?php

include_once '../config/conexao.php';

$tipo=$_POST['tipo'];
$placa=$_POST['placa'];
$ano=$_POST['ano'];
$cor=$_POST['cor'];
$status_op=$_POST['status_op'];
$km_inicial=$_POST['km_inicial'];
$data_ultimamanutencao=$_POST['data_ultimamanutencao'];
$intervalo_manutencao=$_POST['intervalo_manutencao'];

try{
  $sql = "INSERT INTO veiculo (tipo, placa, ano, cor, status_op, km_inicial, data_ultimamente, intervalo_manutencao) VALUES (:tipo, :placa, :ano, :cor, :status_op, :km_inicial, :data_ultimamanutencao, :intervalo_manutencao)";
  $stmt = $conn->prepare($sql);
  $stmt->execute([
   ':tipo'=> $tipo,
   ':placa'=> $placa,
   ':ano'=> $ano,
   ':cor'=> $cor,
   ':status_op'=> $status_op,
   ':km_inicial'=>$km_inicial,
   ':data_ultimamanutencao' => $data_ultimamanutencao,
   ':intervalo_manutencao'=> $intervalo_manutencao
]);

header('Location: ../veiculos.php');

} catch (PDOException $e) {
  echo 'Erro ao Gravar:'. $e-> getMessage();
}

echo $tipo;
echo $placa;
echo $ano;
echo $cor;
echo $status_op;
echo $km_inicial;
echo $data_ultimamanutencao;
echo $intervalo_manutencao;



