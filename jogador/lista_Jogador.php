<div class="container">
  <h2>Jogador</h2>
  <a class="btn btn-info" href="jogador.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="pdf_jogador.php?codTime=<?php echo $codTime;  ?>">Gerar Pdf</a>

  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
          <th>#</th>
          <th>Nome</th>
          <th>Posicao</th>
          <th>Idade</th>
          <th>Pais</th>
          <th>Time</th>
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

            <td>
                <a class="btn btn-warning btn-sm" href="jogador.php?acao=buscar&id=<?php echo $linha['codJogador']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="jogador.php?acao=excluir&id=<?php echo $linha['codJogador']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
