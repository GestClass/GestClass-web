<?
  define('DB_HOST', 'localhost:3306');
  define('DB_USER', 'root');
  define('DB_PASS', 'YOUR_PASSWORD');
  define('DB_NAME', 'GestClass');

  function connect()
  {
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Falha na conexão: " . mysqli_connect_error());

    mysqli_set_charset($connection, "utf8");

    return $connection;
  }

  function disconnect($con)
  {
    mysqli_close($con);
  }
?>