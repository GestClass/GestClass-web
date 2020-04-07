<?php

  include_once 'conexao.php';

   $id_escola = $_SESSION["id_escola"];

   $query_select = $conn->prepare("select id_professor FROM professor ORDER BY id_professor DESC");
   $query_select->execute();
   $dados = $query_select->fetch(PDO::FETCH_ASSOC);
   $id_professor = $dados["id_professor"];
   
   //turmas
   $bercario = isset($_POST['bercario_a']) ? $_POST['bercario_a'] : 0;
   $pre1 = isset($_POST['pre1_a']) ? $_POST['pre1_a'] : 0;
   $pre2 = isset($_POST['pre2_a']) ? $_POST['pre2_a'] : 0;
   $ano1 = isset($_POST['ano1_a']) ? $_POST['ano1_a'] : 0;
   $ano2 = isset($_POST['ano2_a']) ? $_POST['ano2_a'] : 0;
   $ano3 = isset($_POST['ano3_a']) ? $_POST['ano3_a'] : 0;
   $ano4 = isset($_POST['ano4_a']) ? $_POST['ano4_a'] : 0;
   $ano5 = isset($_POST['ano5_a']) ? $_POST['ano5_a'] : 0;
   $ano6 = isset($_POST['ano6_a']) ? $_POST['ano6_a'] : 0;
   $ano7 = isset($_POST['ano7_a']) ? $_POST['ano7_a'] : 0;
   $ano8 = isset($_POST['ano8_a']) ? $_POST['ano8_a'] : 0;
   $ano9 = isset($_POST['ano9_a']) ? $_POST['ano9_a'] : 0;
   $medio1 = isset($_POST['medio1_a']) ? $_POST['medio1_a'] : 0;
   $medio2 = isset($_POST['medio2_a']) ? $_POST['medio2_a'] : 0;
   $medio3 = isset($_POST['medio3_a']) ? $_POST['medio3_a'] : 0;
   
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

              
              if ($query->execute()) {
                echo "<script>alert('Professor cadastrado com sucesso');
                window.location='../homeSecretaria.html.php';
                </script>";

                if ($portugues == 1) {
                  $query_up = $conn->prepare("INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor)
                  VALUES ('1', '8', '6');");
                  $query_up->bindValue(":portugues",$portugues);
                  $executa = $query_up->execute();
              
                  if ($executa == 0) {
                      echo "<script>alert('Update de disciplina não foi efetuado');
                           history.back();</script>";
                  }
              }
                if ($ingles == 2) {
                  $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:ingles WHERE professor.id_escola = $id_escola");
                  $query_up->bindValue(":ingles",$ingles);
                  $executa = $query_up->execute();
              
                  if ($executa == 0) {
                      echo "<script>alert('Update de disciplina não foi efetuado');
                           history.back();</script>";
                  }
              }
                if ($matematica == 3) {
                  $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:matematica WHERE professor.id_escola = $id_escola");
                  $query_up->bindValue(":matematica",$matematica);
                  $executa = $query_up->execute();
              
                  if ($executa == 0) {
                      echo "<script>alert('Update de disciplina não foi efetuado');
                           history.back();</script>";
                  }
              }
                if ($biologia == 4) {
                  $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:biologia WHERE professor.id_escola = $id_escola");
                  $query_up->bindValue(":biologia",$biologia);
                  $executa = $query_up->execute();
              
                  if ($executa == 0) {
                      echo "<script>alert('Update de disciplina não foi efetuado');
                           history.back();</script>";
                  }
              }
                if ($ciencias == 5) {
                  $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:ciencias WHERE professor.id_escola = $id_escola");
                  $query_up->bindValue(":ciencias",$ciencias);
                  $executa = $query_up->execute();
              
                  if ($executa == 0) {
                      echo "<script>alert('Update de disciplina não foi efetuado');
                           history.back();</script>";
                  }
              }
                if ($quimica == 6) {
                  $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:quimica WHERE professor.id_escola = $id_escola");
                  $query_up->bindValue(":quimica",$quimica);
                  $executa = $query_up->execute();
              
                  if ($executa == 0) {
                      echo "<script>alert('Update de disciplina não foi efetuado');
                           history.back();</script>";
                  }
              }
                if ($fisica == 7) {
                  $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:fisica WHERE professor.id_escola = $id_escola");
                  $query_up->bindValue(":fisica",$fisica);
                  $executa = $query_up->execute();
              
                  if ($executa == 0) {
                      echo "<script>alert('Update de disciplina não foi efetuado');
                           history.back();</script>";
                  }
              }
                if ($filosofia == 8) {
                  $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:filosofia WHERE professor.id_escola = $id_escola");
                  $query_up->bindValue(":filosofia",$filosofia);
                  $executa = $query_up->execute();
              
                  if ($executa == 0) {
                      echo "<script>alert('Update de disciplina não foi efetuado');
                           history.back();</script>";
                  }
              }
                if ($historia == 9) {
                  $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:historia WHERE professor.id_escola = $id_escola");
                  $query_up->bindValue(":historia",$historia);
                  $executa = $query_up->execute();
              
                  if ($executa == 0) {
                      echo "<script>alert('Update de disciplina não foi efetuado');
                           history.back();</script>";
                  }
              }
                if ($geografia == 10) {
                  $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:geografia WHERE professor.id_escola = $id_escola");
                  $query_up->bindValue(":geografia",$geografia);
                  $executa = $query_up->execute();
              
                  if ($executa == 0) {
                      echo "<script>alert('Update de disciplina não foi efetuado');
                           history.back();</script>";
                  }
              }
                if ($sociologia == 11) {
                  $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:sociologia WHERE professor.id_escola = $id_escola");
                  $query_up->bindValue(":sociologia",$sociologia);
                  $executa = $query_up->execute();
              
                  if ($executa == 0) {
                      echo "<script>alert('Update de disciplina não foi efetuado');
                           history.back();</script>";
                  }
              }
                if ($ed_fisica == 12) {
                  $query_up = $conn->prepare("UPDATE professor SET fk_id_aulas_professor=:ed_fisica WHERE professor.id_escola = $id_escola");
                  $query_up->bindValue(":ed_fisica",$ed_fisica);
                  $executa = $query_up->execute();
              
                  if ($executa == 0) {
                      echo "<script>alert('Update de disciplina não foi efetuado');
                           history.back();</script>";
                  }
              }


              }else{
                print_r($query);
                // echo "<script>alert('Erro: Professor não foi cadastrado');
                // history.back();;
                // </script>";
          
              }

      
?>