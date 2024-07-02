<?php 
include "../db.php";

if (!$conn) {
  echo "not exists connection";
}

if(isset($_POST['save_task'])) {

  $title = $_POST['title'];
  $description = $_POST['description'];
  
  $query = "INSERT INTO tasks(task_name, task_description) VALUES ('$title', '$description')";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("query failed");
  }

  header("Location: ../index.php");

} else {
  echo "something wrong :(";
}

?>