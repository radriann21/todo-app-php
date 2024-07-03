<?php 
include "../db.php";

if (!$conn) {
  echo "not exists connection";
}

if(isset($_GET['id'])) {

  $id = $_GET['id'];
  $query = "DELETE FROM tasks WHERE task_id = $id";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("query failed");
  }

  header("Location: ../index.php");

} else {
  echo "something wrong :(";
}

?>