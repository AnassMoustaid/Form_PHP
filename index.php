<?php

require_once
  "./connection.php";

if (isset($_POST['name'])) {
  $name = $_POST['name'];
  $insert = "INSERT INTO  product(name) VALUES ('$name')";
  if ($mysqli->query($insert)) {
    echo "success entry";
    $name ="";
  } else {
    echo "wrooooong " . mysqli_error($mysqli);
  }

  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $update = "UPDATE product SET name='$name' WHERE id=$id" ;
    if ($mysqli->query($update)) {
      echo "updated";
      header("Location: index.php");
    } 
    else {
      echo "wasn't updated ".mysqli_error($mysqli) ;
    }
  }
}


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $select = "SELECT * FROM article where id=$id";
  $result = $mysqli -> query($select);
  $row = $result -> fetch_assoc();
  $name = $row['name'];
  if (isset($_GET['action'])) {
    $name = "";
    $delete = "DELETE FROM product where id=$id";
    $result = $mysqli->query($delete);

    if ($result) {
      echo "Dleted";
    } else {
      echo "error in deleteion!!!";
    }
  }
}

$select = "SELECT * from product";
$result = $mysqli->query($select);



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form with PHP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</head>

<body>



  <div class="container w-50 py-4">


    <form action="" method="post">
      <input type="hidden">
      <div class="mb-3">
        <label class="form-label" for="name">Product name</label>
        <input class="form-control" id="name" type="text" name="name" />
      </div>



      <div class="d-grid">
        <button class="btn btn-secondary btn-lg" value="submit" type="submit">Submit</button>
      </div>

    </form>

  </div>

  <?php if ($result) : ?>
    <h1>Article</h1>
    <table>
      <thead>
        <th>Article id</th>
        <th>Aricle Name</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php
        while ($row = $result->fetch_assoc()) :
        ?>
          <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><a href="index.php?id=<?=$row['id'] ?>">Edit</a> <a href="index.php?id=<?=$row['id'] ?>&action=delete">Delete</a></td>
          </tr>
        <?php endwhile ?>
      </tbody>
    </table>
  <?php endif ?>

</body>

</html>

<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $update = "UPDATE product SET name = $name WHERE id=$id ";
  if ($mysqli->query($update)) {
    echo "success update";
  } else {
    echo "wrooooong " . mysqli_error($mysqli);
  }
}

?>
