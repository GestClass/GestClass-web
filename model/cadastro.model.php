<?
  class CadastroModel
  {
    require '../conexao.php';

    function executeSQL($query)
    {
      $con = connect();
      return mysqli_query($con, $query);
      disconnect($con);
    }
  }
  
?>