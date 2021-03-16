<?php
    require_once '../config/conexao.php';

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];

    /**
    * Ação de listar
    */
    if($acao=="listar"){
      if(!isset($_GET['codTime'])){
        $codTime = 0;
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

    require_once '../template/cabecario.php';
    require_once 'lista_jogador.php';
    require_once '../template/rodape.php';
  }
    /**
    * Ação Novo
    **/
    else if($acao == "novo"){
      $lista_time = getTimes();

      require_once '../template/cabecario.php';
      require_once 'form_jogador.php';
      require_once '../template/rodape.php';
    }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;
        print_r($registro);
        // var_dump($registro);
        $sql = "INSERT INTO Jogador(nome,posicao,idade,pais,codTime) VALUES(:nome,:posicao,:idade,:pais,:codTime)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./jogador.php');
        }else{
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM jogador WHERE codJogador = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./jogador.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM Jogador WHERE codJogador = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();

        // var_dump($registro); exit;
        $lista_time = getTimes();
        require_once '../template/cabecario.php';
        require_once 'form_jogador.php';
        require_once '../template/rodape.php';

    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE Jogador SET nome = :nome,posicao = :posicao,idade = :idade, pais = :pais, codTime = :codTime WHERE codJogador = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':posicao', $_POST['posicao']);
        $query->bindParam(':idade', $_POST['idade']);
        $query->bindParam(':pais', $_POST['pais']);
        $query->bindParam(':codTime', $_POST['codTime']);
        $result = $query->execute();

        if($result){
            header('Location: ./jogador.php');
        }else{
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }

    function getTimes(){
        $sql   = "SELECT * FROM time";
        $query = $GLOBALS['con']->query($sql);
        $lista_time = $query->fetchAll();
        return $lista_time;
    }
 ?>
