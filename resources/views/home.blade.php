<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

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
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                @if(auth()->check())
                    <a class="nav-link" href="/profile/{{auth()->user()->id}}">Profile</a>
                @else
                    <a class="nav-link disabled" href="#">Profile</a>
                @endif
            </li>
            <li class="nav-item">
                @if(auth()->check())
                    <a class="nav-link" href="/orders">Orders</a>
                @else
                    <a class="nav-link disabled" href="#">Orders</a>
                @endif
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
<div class="container" style="margin-top: 50px">
    <h2 style="margin-left: 50px; margin-bottom: 30px;">Products</h2>
    <div class="row">
    @foreach($products as $product)
            <div class="col" style="margin-bottom: 20px">
                <div class="card" style="width: 200px; margin-left: auto; margin-right: auto;">
                    <img style="width: 200px; height: 200px" class="card-img-top" src="../{{$product['image']}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$product['title']}}</h5>
                        <p class="card-text">{{$product['description']}}</p>
                        <span>By: <a href="/user/{{$product->user->id}}">{{$product->user->name.' '.$product->user->lastname}}</a></span>
                        <span>{{$product['created_at']}}</span><br><br>
                        <a href="/product/{{$product->id}}" class="btn btn-primary">See more</a>
                    </div>
                </div>
            </div>
    @endforeach
    </div>
</div>
</body>
</html>
