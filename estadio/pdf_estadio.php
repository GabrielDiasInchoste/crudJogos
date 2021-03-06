<?php

require_once '../vendor/autoload.php';
require_once '../config/conexao.php';

$mpdf = new \Mpdf\Mpdf();

$sql   = "SELECT * FROM Estadio";
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
<h1 align="center">Relatorio Estadio </h1>
<?php if (count($registros)==0): ?>
	<p>Nenhum registro encontrado.</p>
<?php else: ?>
	<table align="center">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Pais</th>
			</tr>
		</thead>
		<tfoot>
			<tbody>
				<?php foreach ($registros as $linha): ?>
					<tr>
						<td><?php echo $linha['codEstadio']; ?></td>
						<td><?php echo $linha['nome']; ?></td>
						<td><?php echo $linha['pais']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			<tr>
				<td colspan="3" align="center"> © 2020 Copyright:
					<p> Gabriel Dias - 175787@upf.br </p>
				</td>
			</tr>
		</table>
	<?php endif;

	$mpdf->WriteHTML(ob_get_clean());
	$mpdf->Output();

	?>
