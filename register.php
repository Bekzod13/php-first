<?php 
    require("./includes/header.php");
    require("./database.php");
    $query = "INSERT INTO users (name, email, phone, password) VALUES (:name, :email, :phone, :password)";
    $query2 = "SELECT * FROM users";

    if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['name'] != ''){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $cpassword = $_POST['cpassword'];
        $password = $_POST['password'];


        $statament = $pdo->prepare($query2);
        $statament->execute();
        $users = $statament->fetchAll();
        $mission = 0;

        foreach ($users as $user) {
            if($user['email'] ===  $email){
                $mission += 1;
            }else{
                $mission = 0;
            }
        }

        if($cpassword === $password ){
            if($mission < 1){
                $statement = $pdo->prepare($query);
                $statement->execute([
                    'name'=>$name, 
                    'email'=>$email, 
                    'phone'=>$phone, 
                    'password'=>$password
                ]);
                header("Location: login.php");
                exit();
            }else{
                $_SESSION['message'] = 'Email is already registered.';
            }
        }else{
            $_SESSION['message'] = 'Password is wrong!';
        };

    };

    
 ?>

<div class="d-flex mt-5" style="width: 100%;">
<body class="text-center">
    
    <main class="form-signin w-100 m-auto">
      <form action="" method="POST">
        <h2 class="mb-3">CONTROL</h2>
        <h1 class="h3 mb-3 fw-normal">Register</h1>
        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-danger" role="alert">
                <?=$_SESSION['message']; ?>   
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif ?>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInputname" name="name" placeholder="Your name" >
          <label for="floatingInputname">Your name</label>
        </div>
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" name="email"  placeholder="Your email">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="number" class="form-control" id="floatingInputphone" name="phone" placeholder="Your phone">
          <label for="floatingInputphone">Phone number</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInputPassword" name="password" placeholder="Your password">
          <label for="floatingInputPassword">Password</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingPassword" name="cpassword" placeholder="Confirm password" >
          <label for="floatingPassword">Confirm Password</label>
        </div>
    
        <div class="checkbox mb-3">
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        <a href="login.php" class="mt-3 d-inline-flex">Log in</a>
      </form>
    </main>
    
</div>

<?php require("./includes/footer.php") ?>