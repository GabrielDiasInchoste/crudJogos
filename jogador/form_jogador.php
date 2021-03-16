<?php
    if(isset($registro)) $acao = "jogador.php?acao=atualizar&id=".$registro['codJogador'];
    else $acao = "jogador.php?acao=gravar";
 ?>
<div class="container">
  <form class="" action="<?php echo $acao; ?>" method="post">
    <div class="from-group">
      <label for="nome">Nome</label>
      <input id="nome" class="form-control" type="text" name="nome"
        value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
    </div>
    <div class="from-group">
      <label for="posicao">Posicao</label>
      <input id="posicao" class="form-control" type="text" name="posicao"
        value="<?php if(isset($registro)) echo $registro['posicao']; ?>" required>
    </div>
    <div class="from-group">
      <label for="idade">Idade</label>
      <input id="idade" class="form-control" type="number" name="idade"
        value="<?php if(isset($registro)) echo $registro['idade']; ?>" required>
    </div>
    <div class="from-group">
      <label for="pais">Pais</label>
      <input id="pais" class="form-control" type="text" name="pais"
        value="<?php if(isset($registro)) echo $registro['pais']; ?>" required>
    </div>
    <div class="from-group">
      <label for="codTime">Time</label>
      <select class="form-control" name="codTime" required>
        <option value="">Escolha um item na lista</option>
        <?php foreach ($lista_time as $item): ?>
          <option value="<?php echo $item['codTime']; ?>"
            <?php if(isset($registro) && $registro['codTime']==$item['codTime']) echo "selected";?>>
            <?php echo $item['nome']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <br>
    <button class="btn btn-info" type="submit">Enviar</button>
  </form>
</div>
