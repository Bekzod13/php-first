<?php 
    require("./includes/header.php");
    require("./database.php");

    $query = "SELECT * FROM users";
    $statement = $pdo->prepare($query);
    $statement->execute();

    $users = $statement->fetchAll();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      foreach($users as $user){
        if($email === $user['email'] && $password === $user['password']){
          $_SESSION['login'] = true;
        }
      }

      header('Location: index.php');
      exit();
    }

 ?>

<div class="d-flex mt-5" style="width: 100%;">
<body class="text-center">
    
    <main class="form-signin w-100 m-auto">
      <form action="" method="POST">
        <h2 class="mb-3">CONTROL</h2>
        <h1 class="h3 mb-3 fw-normal">Log in</h1>
    
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" name="name" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingPassword" name="password" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
    
        <div class="checkbox mb-3">
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
        <a href="register.php" class="mt-3 d-inline-flex">Register</a>
      </form>
    </main>
    
</div>

<?php require("./includes/footer.php") ?>