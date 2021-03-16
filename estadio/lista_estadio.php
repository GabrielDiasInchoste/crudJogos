<div class="container">
  <h2>Estadio</h2>
  <a class="btn btn-info" href="estadio.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="pdf_estadio.php">Gerar Pdf</a>
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
          <th>#</th>
          <th>Nome</th>
          <th>Pais</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?php echo $linha['codEstadio']; ?></td>
            <td><?php echo $linha['nome']; ?></td>
            <td><?php echo $linha['pais']; ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="estadio.php?acao=buscar&id=<?php echo $linha['codEstadio']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="estadio.php?acao=excluir&id=<?php echo $linha['codEstadio']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
