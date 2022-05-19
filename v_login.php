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