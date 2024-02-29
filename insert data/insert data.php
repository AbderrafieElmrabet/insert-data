<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form method="POST" action="">
    choose database:
    <input placeholder="database" type="text" name="database">
    choose table:
    <input placeholder="table" type="text" name="table">
    <hr>
    username:
    <input placeholder="username" type="text" name="username">
    email:
    <input placeholder="email" type="text" name="email">
    password:
    <input placeholder="password" type="password" name="password">
    <br><br>
    <input type="submit">
  </form>

  <?php
  if (!empty($_POST["database"]) && !empty($_POST["table"])) {
    $database = $_POST["database"];
    $table = $_POST["table"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $host = "localhost";
    $usrname = "root";
    $passcode = "";
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $email = $_POST["email"];
      try {
        $connect = new PDO("mysql:host=$host;dbname=$database", $usrname, $passcode);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect->exec("INSERT INTO $table (username, email, password)
        VALUES ('$username','$email','$password')");
        echo "insertion successful!";
      } catch (Exception $e) {
        echo "insertion failed!: " . $e->getMessage();
      }
    } else {
      echo "please enter a valid email";
    }
  } else {
    echo "don't leave empty inputs";
  }
  ?>
</body>

</html>