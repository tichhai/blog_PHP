<?php 
    include "database/database.php";
    include "database/settings.php";
    include "database/users.php";
    $database = new database();
    $db = $database->connect();
    $users = new users($db);
    $settings = new settings($db);
    $settings->id = 1;
    $settings->read();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $password = sha1($_POST["password"]);
        $users->username = $username;
        $users->password = $password;

        if($users->roleAdmin()->rowCount()==0){
            $users->name = $_POST["name"];
            $users->email = $_POST["email"];
            $users->phone = $_POST["phone"];
            $users->role=2;
            $users->status=1;
            $users->image="guest.jpg";
            $users->email_verified="verified";
            date_default_timezone_set($settings->site_timezone);
            $users->created_at = date("Y-m-d h:i:s",time());
            $users->updated_at = date("Y-m-d h:i:s",time());
            $users->create();
        }
        if($users->userLogin()->rowCount()>0){
            $rows = $users->userLogin()->fetch();
            session_start();
            $_SESSION["user_id"] = $rows["id"];
            $_SESSION["user_role"] = $rows["role"];
            header("location:index.php");
        }else{
            $error = "Login false!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <title><?php echo $settings->site_name?></title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <?php 
            if($users->roleAdmin()->rowCount()>0){
        ?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <?php
                                            if(isset($error)){
                                        ?>
                                            <div class="alert alert-danger"><?php echo $error?></div>
                                        <?php
                                            }
                                        ?>
                                        <form method="POST" action="">
                                            <div class="form-floating mb-3">
                                                <input class="form-control"  type="text" placeholder="Username" name="username"/>
                                                <label >Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="password" placeholder="Password" name="password"/>
                                                <label >Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php 
            }else{
        ?>
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Signup</h3></div>
                                        <div class="card-body">
                                            <?php
                                                if(isset($error)){
                                            ?>
                                                <div class="alert alert-danger"><?php echo $error?></div>
                                            <?php
                                                }
                                            ?>
                                            <form method="POST" action="">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control"  type="text" placeholder="Name" name="name"/>
                                                    <label >Name</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control"  type="text" placeholder="Email" name="email"/>
                                                    <label >Email</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control"  type="text" placeholder="Phone" name="phone"/>
                                                    <label >Phone</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control"  type="text" placeholder="Username" name="username"/>
                                                    <label >Username</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" type="password" placeholder="Password" name="password"/>
                                                    <label >Password</label>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button class="btn btn-primary" type="submit">Signup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        <?php
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
