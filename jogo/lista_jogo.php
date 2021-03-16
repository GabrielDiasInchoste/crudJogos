<div class="container">
  <h2>Jogo</h2>
  <a class="btn btn-info" href="jogo.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="pdf_jogo.php">Gerar Pdf</a>
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
        <th>#</th>
        <th>Campeonato</th>
        <th>Time A</th>
        <th>Gols A</th>
        <th>Time B</th>
        <th>Gols B</th>
        <th>Estadio</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?php echo $linha['codJogo']; ?></td>
            <td><?php echo $linha['campeonato']; ?></td>
            <td><?php echo $linha['nomeTimeA']; ?></td>
            <td><?php echo $linha['gols_A']; ?></td>
            <td><?php echo $linha['nomeTimeB']; ?></td>
            <td><?php echo $linha['gols_b']; ?></td>
            <td><?php echo $linha['estadioNome']; ?></td>
            <td>
              <a class="btn btn-warning btn-sm" href="jogo.php?acao=buscar&id=<?php echo $linha['codJogo']; ?>">Editar</a>
              <a class="btn btn-danger btn-sm" href="jogo.php?acao=excluir&id=<?php echo $linha['codJogo']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
