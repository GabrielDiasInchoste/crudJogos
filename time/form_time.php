<?php
    if(isset($registro)) $acao = "time.php?acao=atualizar&id=".$registro['codTime'];
    else $acao = "time.php?acao=gravar";
 ?>
<div class="container">
  <form class="" action="<?php echo $acao; ?>" method="post">
    <div class="from-group">
      <label for="nome">Nome</label>
      <input id="nome" class="form-control" type="text" name="nome"
        value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
    </div>
    <div class="from-group">
      <label for="pais">Pais</label>
      <input id="pais" class="form-control" type="text" name="pais"
        value="<?php if(isset($registro)) echo $registro['pais']; ?>" required>
    </div>
    <br>
    <button class="btn btn-info" type="submit">Enviar</button>
  </form>
</div>
