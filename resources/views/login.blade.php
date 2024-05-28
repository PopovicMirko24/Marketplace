<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login/Register</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Market</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/profile">Profile</a>
            </li>
            <li class="nav-item active">
                @auth
                    <a class="nav-link" href="/Logout">Logout</a>
                @else
                    <a class="nav-link" href="/signIn">Login</a>
                @endauth
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="row" style="width: 800px; margin-left: auto; margin-right: auto; margin-top: 100px;">
    <div class="col-sm" style="padding:20px; width: 350px; margin-left: auto; margin-right: auto; border-right: 1px solid rgba(128,128,128,0.51);">
        <form method="post" action="/register">
            @csrf
            <h2 style="text-align: center; margin-bottom: 20px">Register</h2>
            <input class="form-control" type="text" name="name" placeholder="name"><br>
            <input class="form-control" type="text" name="lastname" placeholder="lastname"><br>
            <input class="form-control" type="email" name="email" placeholder="email"><br>
            <input class="form-control" type="password" name="password" placeholder="password"><br>
            <input class="form-control" type="password" name="confirmPassword" placeholder="confirm password"><br>
            <input class="btn btn-primary" type="submit" value="Register" style="width: 100%; text-align: center;">
        </form>
    </div>
    <div class="col-sm" style="padding:20px; width: 350px; margin-left: auto; margin-right: auto;">
        <h2 style="text-align: center; margin-bottom: 20px">Login</h2>
        <form method="post" action="/login">
            @csrf
            @method('post')
            <input class="form-control" type="email" name="loginEmail" placeholder="email"><br>
            <input class="form-control" type="password" name="loginPassword" placeholder="password"><br>
            <input class="btn btn-primary" type="submit" value="Login" style="width: 100%; text-align: center;"><br>
        </form>
    </div>
</div>
</body>
</html>

</html>
