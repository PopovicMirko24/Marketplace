<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="col-sm" style="padding:20px; width: 350px; margin-left: auto; margin-right: auto;">
    <h2 style="text-align: center; margin-bottom: 20px">Edit</h2>
    <form method="post" action="/update-product/{{$product->id}}" enctype="multipart/form-data">
        @csrf
        <ul class="list-group">
            <li class="list-group-item">
                <input class="form-control" type="text" value="{{$product->title}}" name="title" placeholder="title">
            </li>
            <li class="list-group-item">
                <input class="form-control" type="text" value="{{$product->description}}" name="description" placeholder="description">
            </li>
            <li class="list-group-item">
                <input class="form-control" id="formFile" value="{{$product->image}}" type="file" name="image">
            </li>
            <li class="list-group-item">
                <input class="form-control" type="text" name="price" value="{{$product->price}}" placeholder="price in $">
            </li>
            <li class="list-group-item">
                <input class="btn btn-primary" type="submit" value="Save Changes" style="width: 100%; text-align: center;">
            </li>
            <li class="list-group-item">
                <a style="width: 100%" href="/profile" class="btn btn-danger">Cancle</a>
            </li>
        </ul>
    </form>
</div>
</body>
</html>
