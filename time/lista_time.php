<div class="container">
  <h2>Time</h2>
  <a class="btn btn-info" href="time.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="pdf_time.php">Gerar Pdf</a>
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
            <td><?php echo $linha['codTime']; ?></td>
            <td><?php echo $linha['nome']; ?></td>
            <td><?php echo $linha['pais']; ?></td>
            <td>
                <a class="btn btn-info btn-sm" href="../jogador/jogador.php?acao=listar&codTime=<?php echo $linha['codTime']; ?>">Jogadores</a>
                <a class="btn btn-warning btn-sm" href="time.php?acao=buscar&id=<?php echo $linha['codTime']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="time.php?acao=excluir&id=<?php echo $linha['codTime']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
