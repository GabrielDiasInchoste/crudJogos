<?php
    if(isset($registro)) $acao = "jogo.php?acao=atualizar&id=".$registro['codJogo'];
    else $acao = "jogo.php?acao=gravar";
 ?>
<div class="container">
  <form class="" action="<?php echo $acao; ?>" method="post">
    <div class="from-group">
      <label for="campeonato">Campeonato</label>
      <input id="campeonato" class="form-control" type="text" name="campeonato"
        value="<?php if(isset($registro)) echo $registro['campeonato']; ?>" required>
    </div>
    <div class="from-group">
      <label for="codTime_A">Time A</label>
      <select class="form-control" name="codTime_A" required>
        <option value="">Escolha um item na lista</option>
        <?php foreach ($lista_time as $item): ?>
          <option value="<?php echo $item['codTime']; ?>"
            <?php if(isset($registro) && $registro['codTime_A']==$item['codTime']) echo "selected";?>>
            <?php echo $item['nome']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="from-group">
      <label for="gols_A">Gols A</label>
      <input id="gols_A" class="form-control" type="number" name="gols_A"
        value="<?php if(isset($registro)) echo $registro['gols_A']; ?>" required>
    </div>
    <div class="from-group">
      <label for="codTime_B">Time B</label>
      <select class="form-control" name="codTime_B" required>
        <option value="">Escolha um item na lista</option>
        <?php foreach ($lista_time as $item): ?>
          <option value="<?php echo $item['codTime']; ?>"
            <?php if(isset($registro) && $registro['codTime_B']==$item['codTime']) echo "selected";?>>
            <?php echo $item['nome']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="from-group">
      <label for="gols_b">Gols B</label>
      <input id="gols_b" class="form-control" type="number" name="gols_b"
        value="<?php if(isset($registro)) echo $registro['gols_b']; ?>" required>
    </div>
    <div class="from-group">
      <label for="codEstadio">Estadio</label>
      <select class="form-control" name="codEstadio" required>
        <option value="">Escolha um item na lista</option>
        <?php foreach ($lista_estadio as $item): ?>
          <option value="<?php echo $item['codEstadio']; ?>"
            <?php if(isset($registro) && $registro['codEstadio']==$item['codEstadio']) echo "selected";?>>
            <?php echo $item['nome']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <br>
    <button class="btn btn-info" type="submit">Enviar</button>
  </form>
</div>
