<?php

  include("db.php");

  $message = $_POST["message"];

  $sql_add = "INSERT INTO notes (note) VALUE ('$message')";

  $result = mysqli_query($db, $sql_add);

  echo $message;


 ?>
