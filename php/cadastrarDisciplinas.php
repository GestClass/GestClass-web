<?php

  include_once 'conexao.php';

  $id_escola = $_SESSION["id_escola"];
  $id_tipo_usuario = $_SESSION["id_tipo_usuario"];


  $query_select = $conn->prepare("select id_professor FROM professor ORDER BY id_professor DESC");
  $query_select->execute();
  $dados = $query_select->fetch(PDO::FETCH_ASSOC);
  $id_professor = $dados["id_professor"];

  $turmas = $_POST["turmas"];

  //Disciplinas que nao tem no checkbox
  $disciplina1 = $_POST["disciplina1"];
  $disciplina2 = $_POST["disciplina2"];
  $disciplina3 = $_POST["disciplina3"];

  //disciplinas
  $portugues = isset($_POST['portugues']) ? $_POST['portugues'] : 0;
  $ingles = isset($_POST['ingles']) ? $_POST['ingles'] : 0;
  $matematica = isset($_POST['matematica']) ? $_POST['matematica'] : 0;
  $biologia = isset($_POST['biologia']) ? $_POST['biologia'] : 0;
  $ciencias = isset($_POST['ciencias']) ? $_POST['ciencias'] : 0;
  $quimica = isset($_POST['quimica']) ? $_POST['quimica'] : 0;
  $fisica = isset($_POST['fisica']) ? $_POST['fisica'] : 0;
  $filosofia = isset($_POST['filosofia']) ? $_POST['filosofia'] : 0;
  $historia = isset($_POST['historia']) ? $_POST['historia'] : 0;
  $geografia = isset($_POST['geografia']) ? $_POST['geografia'] : 0;
  $sociologia = isset($_POST['sociologia']) ? $_POST['sociologia'] : 0;
  $ed_fisica = isset($_POST['ed_fisica']) ? $_POST['ed_fisica'] : 0;


  //Novas disciplinas, precisa fazer um insert na tabela de disciplina, e depois na tabela de disciplinas_professor
  //to tentando achar a logica porem estou com dor de cabeça e sono kskskksksks 

  // $query_novas_disciplinas = $conn->prepare("INSERT INTO disciplina (nome_disciplina)
  //   VALUES ('{$disciplina1}')");

  // $query_novas_disciplinas = $conn->prepare("INSERT INTO disciplina (nome_disciplina)
  //   VALUES ('{$disciplina2}')");

  // $query_novas_disciplinas = $conn->prepare("INSERT INTO disciplina (nome_disciplina)
  //   VALUES ('{$disciplina3}')");


  if ($portugues == 1) {
    $query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
    VALUES ('{$id_professor}', :portugues, '{$turmas}')");
    $query_disciplinas->bindValue(":portugues",$portugues);
    $executa = $query_disciplinas->execute();

    if ($executa == 0) {
      echo "<script>alert('Update de disciplina não foi efetuado');
      history.back();</script>";
    }else{

      if ($id_tipo_usuario == 2) {
    ?>
      <script>
        // alert('Diciplina inserida com sucesso');

        var confirmacao = confirm('Deseja cadastrar outra turma?');

        if(confirmacao == true){
          window.location='../cadastroDisciplinas.html.php';
        }else{
          window.location='../homeDiretor.html.php';
        }
      </script>
    <?php

      }else if($id_tipo_usuario == 3){
      ?>
        <script>
          // alert('Diciplina inserida com sucesso');

          var confirmacao = confirm('Deseja cadastrar outra turma?');

          if(confirmacao == true){
            window.location='../cadastroDisciplinas.html.php';
          }else{
            window.location='../homeSecretaria.html.php';
          }
        </script>
      <?php
      }else{
        echo "<script>alert('Usuario sem permissão');
        window.location='../index.php'</script>";
       }
    }
  }
  if ($ingles == 2) {
    $query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
    VALUES ('{$id_professor}', :ingles, '{$turmas}')");
    $query_disciplinas->bindValue(":ingles",$ingles);
    $executa = $query_disciplinas->execute();

    if ($executa == 0) {
      echo "<script>alert('Update de disciplina não foi efetuado');
      history.back();</script>";
    }else{

    if ($id_tipo_usuario == 2) {
    ?>

    <script>
      // alert('Diciplina inserida com sucesso');

      var confirmacao = confirm('Deseja cadastrar outra turma?');

      if(confirmacao == true){
        window.location='../cadastroDisciplinas.html.php';
      }else{
        window.location='../homeDiretor.html.php';
      }
    </script>

    <?php
      }else if($id_tipo_usuario == 3){
      ?>
        <script>
          // alert('Diciplina inserida com sucesso');

          var confirmacao = confirm('Deseja cadastrar outra turma?');

          if(confirmacao == true){
            window.location='../cadastroDisciplinas.html.php';
          }else{
            window.location='../homeSecretaria.html.php';
          }
        </script>
      <?php
      }else{
        echo "<script>alert('Usuario sem permissão');
        window.location='../index.php'</script>";
      }
    }
  }

  if ($matematica == 3) {
    $query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
    VALUES ('{$id_professor}', :matematica, '{$turmas}')");
    $query_disciplinas->bindValue(":matematica",$matematica);
    $executa = $query_disciplinas->execute();

    if ($executa == 0) {
      echo "<script>alert('Update de disciplina não foi efetuado');
      history.back();</script>";
    }else{

    if ($id_tipo_usuario == 2) {
    ?>
      <script>
        // alert('Diciplina inserida com sucesso');

        var confirmacao = confirm('Deseja cadastrar outra turma?');

        if(confirmacao == true){
          window.location='../cadastroDisciplinas.html.php';
        }else{
          window.location='../homeDiretor.html.php';
        }
      </script>

    <?php
      }else if($id_tipo_usuario == 3){

      ?>
      <script>
        // alert('Diciplina inserida com sucesso');

        var confirmacao = confirm('Deseja cadastrar outra turma?');

        if(confirmacao == true){
          window.location='../cadastroDisciplinas.html.php';
        }else{
          window.location='../homeSecretaria.html.php';
        }
      </script>
      <?php
      }else{
        echo "<script>alert('Usuario sem permissão');
        window.location='../index.php'</script>";
      }
    }
  }

  if ($biologia == 4) {
    $query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
    VALUES ('{$id_professor}', :biologia, '{$turmas}')");
    $query_disciplinas->bindValue(":biologia",$biologia);
    $executa = $query_disciplinas->execute();

    if ($executa == 0) {
      echo "<script>alert('Update de disciplina não foi efetuado');
      history.back();</script>";
    }else{

    if ($id_tipo_usuario == 2) {
    ?>
    <script>
      // alert('Diciplina inserida com sucesso');

      var confirmacao = confirm('Deseja cadastrar outra turma?');

      if(confirmacao == true){
      window.location='../cadastroDisciplinas.html.php';
      }else{
      window.location='../homeDiretor.html.php';
      }
    </script>

    <?php
      }else if($id_tipo_usuario == 3){
      ?>
        <script>
          // alert('Diciplina inserida com sucesso');

          var confirmacao = confirm('Deseja cadastrar outra turma?');

          if(confirmacao == true){
            window.location='../cadastroDisciplinas.html.php';
          }else{
            window.location='../homeSecretaria.html.php';
          }
        </script>
      <?php
      }else{
        echo "<script>alert('Usuario sem permissão');
        window.location='../index.php'</script>";
      }
    }
  }

  if ($ciencias == 5) {
    $query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
    VALUES ('{$id_professor}', :ciencias, '{$turmas}')");
    $query_disciplinas->bindValue(":ciencias",$ciencias);
    $executa = $query_disciplinas->execute();

    if ($executa == 0) {
      echo "<script>alert('Update de disciplina não foi efetuado');
      history.back();</script>";
    }else{

    if ($id_tipo_usuario == 2) {
    ?>

    <script>
      // alert('Diciplina inserida com sucesso');

      var confirmacao = confirm('Deseja cadastrar outra turma?');

      if(confirmacao == true){
        window.location='../cadastroDisciplinas.html.php';
      }else{
        window.location='../homeDiretor.html.php';
      }
    </script>

    <?php
      }else if($id_tipo_usuario == 3){

      ?>
      <script>
        // alert('Diciplina inserida com sucesso');

        var confirmacao = confirm('Deseja cadastrar outra turma?');

        if(confirmacao == true){
          window.location='../cadastroDisciplinas.html.php';
        }else{
          window.location='../homeSecretaria.html.php';
        }
      </script>
      <?php
      }else{
        echo "<script>alert('Usuario sem permissão');
        window.location='../index.php'</script>";
      }
    }
  }

  if ($quimica == 6) {
    $query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
    VALUES ('{$id_professor}', :quimica, '{$turmas}')");
    $query_disciplinas->bindValue(":quimica",$quimica);
    $executa = $query_disciplinas->execute();

    if ($executa == 0) {
      echo "<script>alert('Update de disciplina não foi efetuado');
      history.back();</script>";
    }else{

    if ($id_tipo_usuario == 2) {
    ?>

    <script>
      // alert('Diciplina inserida com sucesso');

      var confirmacao = confirm('Deseja cadastrar outra turma?');

      if(confirmacao == true){
        window.location='../cadastroDisciplinas.html.php';
      }else{
        window.location='../homeDiretor.html.php';
      }
    </script>

    <?php
    }else if($id_tipo_usuario == 3){

    ?>
    <script>
        // alert('Diciplina inserida com sucesso');

        var confirmacao = confirm('Deseja cadastrar outra turma?');

        if(confirmacao == true){
          window.location='../cadastroDisciplinas.html.php';
        }else{
          window.location='../homeSecretaria.html.php';
        }
      </script>
      <?php
      }else{
        echo "<script>alert('Usuario sem permissão');
        window.location='../index.php'</script>";
      }
    }
  }

  if ($fisica == 7) {
    $query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
    VALUES ('{$id_professor}', :fisica, '{$turmas}')");
    $query_disciplinas->bindValue(":fisica",$fisica);
    $executa = $query_disciplinas->execute();

    if ($executa == 0) {
      echo "<script>alert('Update de disciplina não foi efetuado');
      history.back();</script>";
    }else{

    if ($id_tipo_usuario == 2) {
    ?>

    <script>
      // alert('Diciplina inserida com sucesso');

      var confirmacao = confirm('Deseja cadastrar outra turma?');

      if(confirmacao == true){
        window.location='../cadastroDisciplinas.html.php';
      }else{
        window.location='../homeDiretor.html.php';
      }
    </script>

    <?php
      }else if($id_tipo_usuario == 3){

      ?>
      <script>
        // alert('Diciplina inserida com sucesso');

        var confirmacao = confirm('Deseja cadastrar outra turma?');

        if(confirmacao == true){
          window.location='../cadastroDisciplinas.html.php';
        }else{
          window.location='../homeSecretaria.html.php';
        }
      </script>
      <?php
      }else{
        echo "<script>alert('Usuario sem permissão');
        window.location='../index.php'</script>";
      }
    }
  }

  if ($filosofia == 8) {
    $query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
    VALUES ('{$id_professor}', :filosofia, '{$turmas}')");
    $query_disciplinas->bindValue(":filosofia",$filosofia);
    $executa = $query_disciplinas->execute();

    if ($executa == 0) {
      echo "<script>alert('Update de disciplina não foi efetuado');
      history.back();</script>";
    }else{

    if ($id_tipo_usuario == 2) {
    ?>

    <script>
      // alert('Diciplina inserida com sucesso');

      var confirmacao = confirm('Deseja cadastrar outra turma?');

      if(confirmacao == true){
        window.location='../cadastroDisciplinas.html.php';
      }else{
        window.location='../homeDiretor.html.php';
      }
    </script>

    <?php
      }else if($id_tipo_usuario == 3){

      ?>
      <script>
        // alert('Diciplina inserida com sucesso');

        var confirmacao = confirm('Deseja cadastrar outra turma?');

        if(confirmacao == true){
          window.location='../cadastroDisciplinas.html.php';
        }else{
          window.location='../homeSecretaria.html.php';
        }
      </script>
      <?php
      }else{
        echo "<script>alert('Usuario sem permissão');
        window.location='../index.php'</script>";
      }
    }
  }

  if ($historia == 9) {
    $query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
    VALUES ('{$id_professor}', :historia, '{$turmas}')");
    $query_disciplinas->bindValue(":historia",$historia);
    $executa = $query_disciplinas->execute();

    if ($executa == 0) {
      echo "<script>alert('Update de disciplina não foi efetuado');
      history.back();</script>";
    }else{

    if ($id_tipo_usuario == 2) {
    ?>

    <script>
      // alert('Diciplina inserida com sucesso');

      var confirmacao = confirm('Deseja cadastrar outra turma?');

      if(confirmacao == true){
        window.location='../cadastroDisciplinas.html.php';
      }else{
        window.location='../homeDiretor.html.php';
      }
    </script>

    <?php
      }else if($id_tipo_usuario == 3){

      ?>
      <script>
        // alert('Diciplina inserida com sucesso');

        var confirmacao = confirm('Deseja cadastrar outra turma?');

        if(confirmacao == true){
          window.location='../cadastroDisciplinas.html.php';
        }else{
          window.location='../homeSecretaria.html.php';
        }
      </script>
      <?php
      }else{
        echo "<script>alert('Usuario sem permissão');
        window.location='../index.php'</script>";
      }
    }
  }

  if ($geografia == 10) {
    $query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
    VALUES ('{$id_professor}', :geografia, '{$turmas}')");
    $query_disciplinas->bindValue(":geografia",$geografia);
    $executa = $query_disciplinas->execute();

    if ($executa == 0) {
      echo "<script>alert('Update de disciplina não foi efetuado');
      history.back();</script>";
    }else{

    if ($id_tipo_usuario == 2) {
    ?>

    <script>
      // alert('Diciplina inserida com sucesso');

      var confirmacao = confirm('Deseja cadastrar outra turma?');

      if(confirmacao == true){
        window.location='../cadastroDisciplinas.html.php';
      }else{
        window.location='../homeDiretor.html.php';
      }
    </script>

    <?php
      }else if($id_tipo_usuario == 3){

      ?>
      <script>
        // alert('Diciplina inserida com sucesso');

        var confirmacao = confirm('Deseja cadastrar outra turma?');

        if(confirmacao == true){
          window.location='../cadastroDisciplinas.html.php';
        }else{
          window.location='../homeSecretaria.html.php';
        }
      </script>
      <?php
      }else{
        echo "<script>alert('Usuario sem permissão');
        window.location='../index.php'</script>";
      }
    }
  }

  if ($sociologia == 11) {
    $query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
    VALUES ('{$id_professor}', :sociologia, '{$turmas}')");
    $query_disciplinas->bindValue(":sociologia",$sociologia);
    $executa = $query_disciplinas->execute();


    if ($executa == 0) {
      echo "<script>alert('Update de disciplina não foi efetuado');
      history.back();</script>";
    }else{

    if ($id_tipo_usuario == 2) {
    ?>

    <script>
      // alert('Diciplina inserida com sucesso');

      var confirmacao = confirm('Deseja cadastrar outra turma?');

      if(confirmacao == true){
        window.location='../cadastroDisciplinas.html.php';
      }else{
        window.location='../homeDiretor.html.php';
      }
    </script>

    <?php
      }else if($id_tipo_usuario == 3){

      ?>
      <script>
        // alert('Diciplina inserida com sucesso');

        var confirmacao = confirm('Deseja cadastrar outra turma?');

        if(confirmacao == true){
          window.location='../cadastroDisciplinas.html.php';
        }else{
          window.location='../homeSecretaria.html.php';
        }
      </script>
      <?php
      }else{
        echo "<script>alert('Usuario sem permissão');
        window.location='../index.php'</script>";
      }
    }
  }

  if ($ed_fisica == 12) {
    $query_disciplinas = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
    VALUES ('{$id_professor}', :ed_fisica, '{$turmas}')");
    $query_disciplinas->bindValue(":ed_fisica",$ed_fisica);
    $executa = $query_disciplinas->execute();

    if ($executa == 0) {
      echo "<script>alert('Update de disciplina não foi efetuado');
      history.back();</script>";
    }else{

    if ($id_tipo_usuario == 2) {
    ?>

    <script>
      // alert('Diciplina inserida com sucesso');

      var confirmacao = confirm('Deseja cadastrar outra turma?');

      if(confirmacao == true){
        window.location='../cadastroDisciplinas.html.php';
      }else{
        window.location='../homeDiretor.html.php';
      }
    </script>

    <?php
      }else if($id_tipo_usuario == 3){

      ?>
      <script>
        // alert('Diciplina inserida com sucesso');

        var confirmacao = confirm('Deseja cadastrar outra turma?');

        if(confirmacao == true){
          window.location='../cadastroDisciplinas.html.php';
        }else{
          window.location='../homeSecretaria.html.php';
        }

      </script>
      <?php
      }else{
        echo "<script>alert('Usuario sem permissão');
        window.location='../index.php'</script>";
      }
    }
  }



  ?>