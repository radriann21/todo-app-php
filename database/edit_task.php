<?php 
include "../db.php";

if(!$conn) {
  echo "The connection not exists!";
}

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tasks WHERE task_id = $id";

  $result_task = mysqli_query($conn, $query);
  
  if(mysqli_num_rows($result_task) == 1) {
    $row = mysqli_fetch_array($result_task);
    $id = $row['task_id'];
    $title = $row['task_name'];
    $description = $row['task_description'];
  } else {
    echo "Task not found";
  }
}

if(isset($_POST['update_task'])) {
  $id = $_GET['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  
  $query = "UPDATE tasks SET task_name = '$title', task_description = '$description' WHERE task_id = $id";
  
  mysqli_query($conn, $query);
  header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
  <link rel="stylesheet" href="../css/edit.css">
</head>

<body>

  <main>
    <h1>Update task</h1>
    <form action="edit_task.php?id=<?= $_GET['id']; ?>" method="POST">
      <fieldset>
        <label for="task-name">Task Name</label>
        <input type="text" name="title" placeholder="update name..." value=<?= $title ?>>
      </fieldset>
      <fieldset>
        <label class="textarea-label" for="task-description">Task Description</label>
        <textarea name="description" id="description"><?= $description ?></textarea>
      </fieldset>
      <button type="submit" name="update_task">Update Task</button>
    </form>
  </main>

</body>

</html>