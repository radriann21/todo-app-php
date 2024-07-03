<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TODO APP PHP</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <main>
    
  <section class="form-section">
      <form action="./database/save_tasks.php" method="POST">
        <fieldset>
          <label for="task-name">Task Name</label>
          <input type="text" name="title" placeholder="task name...">
        </fieldset>
        <fieldset>
          <label class="textarea-label" for="task-description">Task Description</label>
          <textarea name="description" id="description"></textarea>
        </fieldset>
        <button type="submit" name="save_task">Save Task</button>
      </form>
    </section>

    <section>
      
    <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $query = "SELECT * FROM tasks";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result)) { ?>
              <tr>
                <td><?php echo $row['task_name'] ?></td>
                <td><?php echo $row['task_description'] ?></td>
                <td><?php echo $row['created_at'] ?></td>
                <td>
                  <a href="./database/delete_task.php?id=<?= $row['task_id'] ?>">Delete</a>
                </td>
              </tr>
            <?php }
          ?>
        </tbody>
      </table>

    </section>
  </main>

</body>
</html>
