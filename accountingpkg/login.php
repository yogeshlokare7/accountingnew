<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
        <title>Login</title>
        <link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
    </head>
    <body>
        <section class="container" style="margin-top: 80px;">
            <section class="login-form">
                <form method="post" role="login">
                    <h2>Please sign in</h2>
                    <p>To enter in your private dashboard</p>
                    <p style="color: red"><?php echo $error ?></p>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="text-primary glyphicon glyphicon-envelope"></span></div>
                            <input type="email" name="email" placeholder="Email address" required class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="text-primary glyphicon glyphicon-lock"></span></div>
                            <input type="password" name="password" placeholder="Password" required class="form-control" />
                        </div>
                    </div>
                    <button type="submit" name="go" class="btn btn-block btn-success">Sign in</button>
                </form>
            </section>
        </section>
    </body>
</html>