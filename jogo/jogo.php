<?php
    require_once '../config/conexao.php';

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];

    /**
    * Ação de listar
    */
    if($acao=="listar"){
       $sql   = "SELECT j.codJogo, j.campeonato, ta.nome as nomeTimeA , j.gols_A, tb.nome as nomeTimeB, j.gols_b,e.nome as estadioNome FROM Jogo j
       INNER JOIN Estadio e ON e.codEstadio = j.codEstadio
       INNER JOIN Time ta ON ta.codTime = j.codTime_A
       INNER JOIN Time tb ON tb.codTime = j.codTime_B";

       $query = $con->query($sql);
       $registros = $query->fetchAll();

       require_once '../template/cabecario.php';
       require_once 'lista_jogo.php';
       require_once '../template/rodape.php';
    }
    /**
    * Ação Novo
    **/
    else if($acao == "novo"){
      $lista_time = getTimes();
      $lista_estadio = getEstadio();

      require_once '../template/cabecario.php';
      require_once 'form_jogo.php';
      require_once '../template/rodape.php';
    }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;
        $sql = "INSERT INTO Jogo(campeonato,codTime_A,gols_A,codTime_B,gols_b,codEstadio) VALUES(:campeonato,:codTime_A,:gols_A,:codTime_B,:gols_b,:codEstadio)";
        $query = $con->prepare($sql);

        $query->bindParam(':campeonato', $campeonato);
        $query->bindParam(':codTime_A', $codTime_A);
        $query->bindParam(':gols_A', $gols_A);
        $query->bindParam(':codTime_B', $codTime_B);
        $query->bindParam(':gols_b', $gols_b);
        $query->bindParam(':codEstadio', $codEstadio);

        $result = $query->execute($registro);
        if($result){
            header('Location: ./jogo.php');
        }else{
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM jogo WHERE codJogo = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./jogo.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM Jogo WHERE codJogo = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();

        $lista_time = getTimes();
        $lista_estadio = getEstadio();
        require_once '../template/cabecario.php';
        require_once 'form_jogo.php';
        require_once '../template/rodape.php';

    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql = "UPDATE Jogo SET campeonato = :campeonato, codTime_A = :codTime_A, gols_A = :gols_A, codTime_B = :codTime_B, gols_b = :gols_b, codEstadio = :codEstadio WHERE codJogo = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':campeonato', $_POST['campeonato']);
        $query->bindParam(':codTime_A', $_POST['codTime_A']);
        $query->bindParam(':gols_A', $_POST['gols_A']);
        $query->bindParam(':codTime_B', $_POST['codTime_B']);
        $query->bindParam(':gols_b', $_POST['gols_b']);
        $query->bindParam(':codEstadio', $_POST['codEstadio']);

        $result = $query->execute();

        if($result){
            header('Location: ./jogo.php');
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

    function getEstadio(){
        $sql   = "SELECT * FROM estadio";
        $query = $GLOBALS['con']->query($sql);
        $lista_estadio = $query->fetchAll();
        return $lista_estadio;
    }
 ?>
