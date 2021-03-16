<?php

require_once '../vendor/autoload.php';
require_once '../config/conexao.php';

$mpdf = new \Mpdf\Mpdf();

if($_GET['codTime'] == 0){
	$sql = "SELECT j.codJogador, j.nome, j.posicao,j.idade,j.pais, t.nome as time
	FROM Jogador j INNER JOIN time t
	ON t.codTime = j.codTime";
}else{
	$codTime = $_GET['codTime'];

	$sql   = "SELECT j.codJogador, j.nome, j.posicao,j.idade,j.pais, t.nome as time
	FROM Jogador j INNER JOIN time t
	ON t.codTime = j.codTime
	WHERE t.codTime = ".$codTime;
}

$query = $con->query($sql);
$registros = $query->fetchAll();

ob_start();?>
<style>
table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	padding: 5px;
}
table tr:nth-child(even) {
	background-color: #ccc;
}
table thead th {
	background-color: #ccc;
}
table tfoot td {
	background-color: #fff;
}
</style>
<h1 align="center">Relatorio Jogador</h1>
<?php if (count($registros)==0): ?>
	<p>Nenhum registro encontrado.</p>
<?php else: ?>
	<table align="center">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Posicao</th>
				<th>Idade</th>
				<th>Pais</th>
				<th>Time</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($registros as $linha): ?>
				<tr>
					<td><?php echo $linha['codJogador']; ?></td>
					<td><?php echo $linha['nome']; ?></td>
					<td><?php echo $linha['posicao']; ?></td>
					<td><?php echo $linha['idade']; ?></td>
					<td><?php echo $linha['pais']; ?></td>
					<td><?php echo $linha['time']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		<tr>
			<td colspan="6" align="center"> © 2020 Copyright:
				<p> Gabriel Dias - 175787@upf.br </p>
			</td>
		</tr>
	</table>
<?php endif;

$mpdf->WriteHTML(ob_get_clean());
$mpdf->Output();

?>
