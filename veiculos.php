<?php include("includes/header.php"); ?>

<h1>Veículos</h1>

<button onclick="window.location.href='veiculo_cadastro.php'">Novo Veículo</button>

<?php
try {
    $sql = "select * from veiculo order by placa";
    $stmt = $conn->query($sql);
    $veiculos = $stmt->fetchAll();
    if(count($veiculos) > 0) {
        ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Tipo de Compustível</th>
                <th>Cor</th>
                <th>Ano</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($veiculos as $veiculo): ?>
                <tr>
                    <td><?php echo $veiculo['idveiculo'];?></td>
                    <td><?php echo $veiculo['placa']?></td>
                    <td>
                        <?php
                         switch ($veiculo['tipo']){
                            case 1: echo "Diesel"; break;
                            case 2: echo "Flex"; break;
                            case 3: echo "Etanol"; break;
                            case 4: echo "Gasolina"; break;
                            default: echo "N/A";
                         }
                         ?>

                    </td>
                    <td><?php echo $veiculo['cor'];?></td>
                    <td><?php echo $veiculo['ano'];?></td>
                    <td>
                       <form action="veiculo_cadastro.php" method="POST">
                        <input type="hidden" name="idveiculo" value="<?php echo $veiculo['idveiculo']?>">
                       <input type="submit" value="Editar">
                       </form>
                    </td>

                    <td>
                      <form action="actions/veiculo_excluir.php" method="POST">
                        <input type="hidden" name="idveiculo" value="<?php echo $veiculo['idveiculo']?>">
                        <input type="submit" value="Excluir">
                      </form>
                    </td>
                </tr>

            <?php endforeach;?>    
        </tbody>
    </table>    
    

    <?php 
    } else{
        echo "Nenhum veículo cadastrado no sistema.";

    }

} catch (PDOException $e) {
    echo "Erro ao buscar veículos: " . $e->getMessage();
}

include("includes/footer.php"); ?>