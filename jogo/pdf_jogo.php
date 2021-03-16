<?php

require_once '../vendor/autoload.php';
require_once '../config/conexao.php';

$mpdf = new \Mpdf\Mpdf();

$sql   = "SELECT j.codJogo, j.campeonato, ta.nome as nomeTimeA , j.gols_A, tb.nome as nomeTimeB, j.gols_B,e.nome as estadioNome FROM Jogo j
INNER JOIN Estadio e ON e.codEstadio = j.codEstadio
INNER JOIN Time ta ON ta.codTime = j.codTime_A
INNER JOIN Time tb ON tb.codTime = j.codTime_B";$query = $con->query($sql);
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
<h1 align="center">Relatorio Jogo</h1>
<?php if (count($registros)==0): ?>
	<p>Nenhum registro encontrado.</p>
<?php else: ?>
	<table align="center">
		<thead>
			<tr>
				<th>#</th>
				<th>Campeonato</th>
				<th>Time A</th>
				<th>Gols A</th>
				<th>Time B</th>
				<th>Gols B</th>
				<th>Estadio</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($registros as $linha): ?>
				<tr>
					<td><?php echo $linha['codJogo']; ?></td>
					<td><?php echo $linha['campeonato']; ?></td>
					<td><?php echo $linha['nomeTimeA']; ?></td>
					<td><?php echo $linha['gols_A']; ?></td>
					<td><?php echo $linha['nomeTimeB']; ?></td>
					<td><?php echo $linha['gols_A']; ?></td>
					<td><?php echo $linha['estadioNome']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		<tr>
			<td colspan="7" align="center"> © 2020 Copyright:
				<p> Gabriel Dias - 175787@upf.br </p>
			</td>
		</tr>
	</table>
<?php endif;

$mpdf->WriteHTML(ob_get_clean());
$mpdf->Output();

?>
