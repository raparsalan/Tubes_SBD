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
                            if(password_verify($password, $hash)){
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

    include "v_login.php";
    exit;
?>