<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LunaCore - Setup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A project management Bootstrap theme by Medium Rare">
    <link href="/modules/assets/img/lunalogo.png" rel="icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
    <link href="/modules/assets/css/theme.css" rel="stylesheet" type="text/css" media="all"/>
</head>

<body>

<div class="main-container fullscreen">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-7">
                <div class="text-center">
                    <h1 class="h2">Welcome &#x1f44b;</h1>
                    <p class="lead">Login with your admin credentials</p>
                    <form action="/setup/login/logon/" method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Username" name="username" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" placeholder="Password" name="password" />
                        </div>
                        <button class="btn btn-lg btn-block btn-primary mt-3" role="button" type="submit">
                            Login
                        </button>
                        <small>Do you forgot your password and dont know how to reset? <a href="#">Documentation</a>
                        </small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/modules/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/modules/assets/js/popper.min.js"></script>
<script type="text/javascript" src="/modules/assets/js/bootstrap.js"></script>
<script type="text/javascript" src="/modules/assets/js/theme.js"></script>

</body>

</html>