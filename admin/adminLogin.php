
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>TPL</title>
    <link rel="icon" href="../../images/logo.png">
</head>

<body>
  
<div class="formContainer"> 
<form action="login.php" method="POST">
  <div class="formTitle">admin login</div>
  <div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" name="user">
    <label for="floatingInput">User</label>
  </div>
  <div class="form-floating mb-3">
    <input type="password" class="form-control" id="floatingInput" name="password">
    <label for="floatingInput">Passowrd</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>