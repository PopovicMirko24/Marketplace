<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

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

@auth

    <div class="row" style="width: 800px; margin-left: auto; margin-right: auto; margin-top: 100px;">
        <div class="col-sm" style="padding:20px; width: 350px; margin-left: auto; margin-right: auto; border-right: 1px solid rgba(128,128,128,0.51);">
            <h2 style="text-align: center; margin-bottom: 20px">User's data</h2>
            <ul class="list-group">
                <li class="list-group-item">Name: {{$user->name}}</li>
                <li class="list-group-item">Lastname: {{$user->lastname}}</li>
                <li class="list-group-item">Email: {{$user->email}}</li>
                <li class="list-group-item">Joined at: {{$user->created_at}}</li>
                <li class="list-group-item">Number of products: {{$products->count()}}</li>
                @if(auth()->user()->id === $user->id)
                    <li class="list-group-item">
                        <a style="width: 100%" class="btn btn-danger" href="/delete-user/{{auth()->user()->id}}">Delete Account</a>
                    </li>
                @endif
            </ul>
        </div>
        @if(auth()->user()->id === $user->id)
            <div class="col-sm" style="padding:20px; width: 350px; margin-left: auto; margin-right: auto;">
                <h2 style="text-align: center; margin-bottom: 20px">Put On Sale</h2>
                <form method="post" action="/create-product" enctype="multipart/form-data">
                    @csrf
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input class="form-control" type="text" name="title" placeholder="title">
                        </li>
                        <li class="list-group-item">
                            <input class="form-control" type="text" name="description" placeholder="description">
                        </li>
                        <li class="list-group-item">
                            <input class="form-control" id="formFile" type="file" name="image">
                        </li>
                        <li class="list-group-item">
                            <input class="form-control" type="text" name="price" placeholder="price in $">
                        </li>
                        <li class="list-group-item">
                            <input class="btn btn-primary" type="submit" value="Put On Sale" style="width: 100%; text-align: center;">
                        </li>
                    </ul>

                </form>
            </div>
        @endif
    </div>
    <div class="container" style="margin-top: 50px;">
        @if(auth()->user()->id === $user->id)
            <h2 style="margin-left: 50px; margin-bottom: 30px;">Your Products</h2>
        @else
            <h2 style="margin-left: 50px; margin-bottom: 30px;">{{$user->name}}'s Products</h2>
        @endif
            @if($products->count()>0)
                <h3 style="margin-left: 200px;">For sale</h3>
                <div class="row" style="margin-top: 20px; margin-bottom: 100px">
                    @foreach($products as $product)
                        <div class="col" style="margin-bottom: 20px">
                            <div class="card" style="width: 200px; margin-left: auto; margin-right: auto;">
                                <img style="width: 200px; height: 200px" class="card-img-top" src="../{{$product['image']}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product['title']}}</h5>
                                    <p class="card-text">{{$product['description']}}</p>
                                    <span>{{$product['created_at']}}</span><br><br>
                                    @if(auth()->user()->id === $user->id && !$product->isSold)
                                        <a href="/edit-product/{{$product->id}}" class="btn btn-primary">Edit</a>
                                        <a href="/delete-product/{{$product->id}}" class="btn btn-danger">Delete</a>
                                    @else
                                        <a href="/product/{{$product->id}}" class="btn btn-primary">See more</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h3 style="margin-left: 200px;">Sold</h3>
                <div class="row" style="margin-top: 20px">
                    @foreach($products as $product)
                        <div class="col" style="margin-bottom: 20px">
                            <div class="card" style="width: 200px; margin-left: auto; margin-right: auto;">
                                <img style="width: 200px; height: 200px" class="card-img-top" src="../{{$product['image']}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product['title']}}</h5>
                                    <p class="card-text">{{$product['description']}}</p>
                                    <span>{{$product['created_at']}}</span><br><br>
                                    @if(auth()->user()->id === $user->id && $product->isSold)
                                        <a href="/edit-product/{{$product->id}}" class="btn btn-primary">Edit</a>
                                        <a href="/delete-product/{{$product->id}}" class="btn btn-danger">Delete</a>
                                    @else
                                        <a href="/product/{{$product->id}}" class="btn btn-primary">See more</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="container">
                    <h3 style="text-align: center; color: rgba(51,50,50,0.58)">No products</h3>
                </div>
            @endif
    </div>
@else
    <h1 style="text-align: center; margin-top: 40vh; color: rgba(67,65,65,0.52);">Login first</h1>
@endauth
</body>
</html>
