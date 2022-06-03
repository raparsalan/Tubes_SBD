<?php
    require_once "config.php";

    session_start();

    function alertBox($msg){
        echo '<script type="text/javascript">alert("'. $msg .'") </script>';
    }

    $name = $password = "";
    $err_name = $err_password = $err_login = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST['name']))){
            $err_name =  "Nama tidak boleh kosong";
        }
        else{
            $name = htmlspecialchars(trim($_POST['name']));
        }

        if(empty(trim($_POST['password']))){
            $err_password = "Password tidak boleh kosong";
        }
        else{
            $password = htmlspecialchars(trim($_POST['password']));
        }

        if(empty($err_nim) && (empty($err_password))){
            $loginQuery = "SELECT * from user WHERE user.username = ?";

            if($stmt = mysqli_prepare($mysqli ,$loginQuery)){
                mysqli_stmt_bind_param($stmt, "s", $param_name);

                $param_name = $name;

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        mysqli_stmt_bind_result($stmt, $id, $user_name, $user_password, $user_authority);

                        if(mysqli_stmt_fetch($stmt)){
                            $hash = password_hash($password, PASSWORD_DEFAULT);
                            if(password_verify($user_password, $hash)){
                                session_start();

                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["user_name"] = $user_name;
                                $_SESSION["user_authority"] = $user_authority;

                                if(trim($_SESSION['user_authority']) == 1){
                                    //alertBox("masuk sebagai admin");

                                    header("location: indexAdmin.php");
                                }
                                else{
                                    //alertBox("masuk sebagai murid");
                                    header("location: index.php");
                                }

                            }
                            else{
                                $err_login = "password salah";
                            }
                        }
                    }
                    else{
                        $err_login = "Nama / Nim tidak terdaftar";
                    }
                }
                mysqli_stmt_close($stmt);
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body style="background-image: url(https://preview.redd.it/ew97aaxdrhq61.png?auto=webp&s=a542753787da211e63836ee5a5087b990a1242d3);">
    <div class="p2 m-2">
        <div class="card d-flex justify-content-center align-items-center" style="height: 500px; margin:50px 100px 0px 100px;">
            <form action="" method="POST" class="card p-5" style="background-color:lightgray;">
                <div class="form-group">
                    <label>NIM:</label>
                    <input type="text" name="name" class="form-control <?php echo (!empty($err_name)) ? 'is-invalid' : ''; ?>" value="<?=$name?>">
                    <span class="invalid-feedback"><?php echo $err_name; ?></span>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($err_password)) ? 'is-invalid' : ''; ?>" value="<?=$password?>">
                    <span class="invalid-feedback"><?php echo $err_password; ?></span>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Masuk!</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/13338d9b84.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>