<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
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
            <li class="nav-item active">
                @if(auth()->check())
                    <a class="nav-link" href="/profile/{{auth()->user()->id}}">Profile</a>
                @else
                    <a class="nav-link" href="#">Profile</a>
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
@auth
    @if(auth()->user()->id !== $product->user_id)
        <div class="container" style="margin-top: 50px">
            <div class="row">
                <div class="col-8" style="padding: 0 100px">
                    <form method="post" action="/place-order/{{$product->id}}">
                        @csrf
                        <ul class="list-group">
                            <li class="list-group-item">
                                <input class="form-control" type="text" name="city" placeholder="city">
                            </li>
                            <li class="list-group-item">
                                <input class="form-control" type="text" name="address" placeholder="address">
                            </li>
                            <li class="list-group-item">
                                <input class="btn btn-primary" type="submit" value="Order" style="width: 100%; text-align: center;">
                            </li>
                        </ul>

                    </form>
                </div>
                <div class="col-4">
                    <img src="../{{$product->image}}"><br><br>
                    <h3>{{$product->title}}</h3><br>
                    <p>{{$product->description}}</p>
                    <p>Price: ${{$product->price}}</p>
                </div>
            </div>
        </div>
    @else
        <h1 style="text-align: center; margin-top: 40vh; color: rgba(67,65,65,0.52);">Can't order your own product</h1>
    @endif
@else
    <h1 style="text-align: center; margin-top: 40vh; color: rgba(67,65,65,0.52);">Login first</h1>
@endauth
</body>
</html>
