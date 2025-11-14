<?php include("includes/header.php"); 

$idveiculo = $_POST['idveiculo'];

try {
    $sql = "select * from veiculo where idveiculo = :idveiculo";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':idveiculo'=> $idveiculo]);
    $veiculo = $stmt->fetch(); 
}catch(PDOException $e){
    echo 'Erro: '. $e->getMessage();
}
$tipo = $veiculo['tipo']??'';
$placa = $veiculo['placa']??'';
$ano  = $veiculo['ano']??'';
$cor  = $veiculo['cor']??'';
$status_op  = $veiculo['status_op']??'';
$km_inicial  = $veiculo['km_inicial']??'';
$data_ultimamanutencao  = $veiculo['data_ultimamanutencao']??'';
$intervalo_manutencao  = $veiculo['intervalo_manutencao']??'';

$url_action = $idveiculo ? 'actions/veiculo_alterar.php': 'actions/veiculo_gravar.php';



?>    

<h1>Veículos Formulário</h1>
<form action="actions/veiculo_gravar.php" method="POST">
<input type="hidden" value="<?php echo $idveiculo?>" name="idveiculo">


    <label>Tipo Combustivel</label>
    <select name="tipo">
        <option value="" <?php echo $tipo == '' ? 'selected': ''?>>Selecione o Tipo</option>
        <option value="1" <?php echo $tipo == '1' ? 'selected': ''?>>Diesel</option>
        <option value="2" <?php echo $tipo == '2' ? 'selected': ''?>>Flex</option>
        <option value="3" <?php echo $tipo == '3' ? 'selected': ''?>>Etanol</option>
        <option value="4" <?php echo $tipo == '4' ? 'selected': ''?>>Gasolina</option>
    </select><br>

    <label>Placa</label>
    <input value="<?php echo $placa ?>" name="placa" type="text" placeholder="Escreva a Placa"><br>

    <label>Ano</label>
    <input value="<?php echo $ano ?>" name="ano" type="text" placeholder="Escreva a Cor"><br>

    <label>Cor</label>
    <input value="<?php echo $cor ?>" name="cor" type="text" placeholder="Escreva a cor"><br>

    <label>Status Operacional</label>
    <select name="status_op">
        <option value="">Selecione o Status</option>
        <option value="1">Disponivel</option>
        <option value="2">Em Rota</option>
        <option value="3">Manutenção</option>
    </select><br>

    <label>Km_inicial</label>
    <input name="km_inicial" type="text" placeholder="Escreva o km"><br>

    <label>Data ultima manutenção</label>
    <input name="data_ultimamanutencao" type="date" placeholder="Escreva a data"><br>

    <label>Intervalo de manutenção(Dias)</label>
    <input name="intervalo_manutencao" type="text" placeholder="Escreva em dias"><br>

    <input type="submit" value="Gravar">
    <input type="button" value="Cancelar" onclick="window.location('veiculos.php')">

</form>

<?php include("includes/footer.php"); ?>