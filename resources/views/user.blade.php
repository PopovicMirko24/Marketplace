<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Market</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/profile">Profile</a>
            </li>
            <li class="nav-item">
                @auth
                    <a class="nav-link" href="/logout">Logout</a>
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

@auth
    <div class="row" style="width: 800px; margin-left: auto; margin-right: auto; margin-top: 100px;">
        <div class="col-sm" style="padding:20px; width: 350px; margin-left: auto; margin-right: auto; border-right: 1px solid rgba(128,128,128,0.51);">

        </div>
        <div class="col-sm" style="padding:20px; width: 350px; margin-left: auto; margin-right: auto;">
            <h2 style="text-align: center; margin-bottom: 20px">Put On Sale</h2>
            <form method="post" action="/create-product" enctype="multipart/form-data">
                @csrf
                <input class="form-control" type="text" name="title" placeholder="title"><br>
                <input class="form-control" type="text" name="description" placeholder="description"><br>
                <input class="form-control" id="formFile" type="file" name="image"><br>
                <input class="form-control" type="text" name="price" placeholder="price in $"><br>
                <input class="btn btn-primary" type="submit" value="Put On Sale" style="width: 100%; text-align: center;"><br>
            </form>
        </div>
    </div>
@else
    <h1 style="text-align: center; margin-top: 40vh; color: rgba(67,65,65,0.52);">Login first</h1>
@endauth
</body>
</html>
