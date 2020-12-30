<html>
<head>
<meta charset="UTF-8">
<title>Форма вывода данных</title>
<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/carousel/">
<link href="../assets/dist/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<h1>The table of garages</h1>
<?php 
    // определяем начальные данные
    $db_host = 'localhost';
    $db_name = 'visits';
    $db_username = 'root';
    $db_password = '';
    $db_table_to_show = 'cars';
 
    // соединяемся с сервером базы данных
    $connect_to_db = mysqli_connect($db_host, $db_username, $db_password)
    or die("Could not connect: " . mysqli_error());
 
    // подключаемся к базе данных
    mysqli_select_db($connect_to_db, $db_name);
 
    mysqli_query($connect_to_db, "SET NAMES UTF-8");
    mysqli_query($connect_to_db, "SET CHARACTER SET UTF-8");
    mysqli_query($connect_to_db, "SET character_set_client = UTF-8");
    mysqli_query($connect_to_db, "SET character_set_connection = UTF-8");
    mysqli_query($connect_to_db, "SET character_set_results = UTF-8");
    // выбираем все значения из таблицы
    $query = mysqli_query($connect_to_db, "select * from " . $db_table_to_show)
    or die(mysqli_error());
 
    // выводим на страницу сайта заголовки HTML-таблицы
    echo '<table border="1" class="table table-bordered">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>№</th>';
  echo '<th>Тип Гаража</th>';
  echo '<th>Нумерация гаража</th>';
  echo '<th>Описание</th>';
  echo '<th>Стоимость</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
   
   // выводим в HTML-таблицу все данные клиентов из таблицы MySQL 
  while($data = mysqli_fetch_array($query)){
    echo '<tr>';
    echo '<td >' . $data['id'] . '</td>';
    echo '<td>' . $data['type'] . '</td>';
    echo '<td>' . $data['garage number'] . '</td>';
    echo '<td>' . $data['description'] . '</td>';
    echo '<td>' . $data['price'] . '</td>';

    echo '</tr>';
  }
  
    echo '</tbody>';
  echo '</table>';
    // закрываем соединение с сервером  базы данных
    mysqli_close($connect_to_db);
?>
 <a id="button-nav" class="btn btn-primary" href="lk_index.php"> Личный кабинет</a>
</body>
</html>