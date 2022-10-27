<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <title>product List</title>
</head>
<body>
    <div>
        <h2 id = "list-heading">Product List</h2>
    </div>
    <table class="table table-striped-columns">
        <thead >
            <tr>
                <th >Product Id</th>
                <th >Product Name</th>
                <th >Category</th>
                <th >Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($products as $product)
        <tr>
        <td>{{$product->product_id}}</td>
        <td>{{$product->product_name}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td><a class="btn btn-warning" href="{{ route('product.edit',$product->product_id) }}">Edit</a> </td>
        <td><a class="btn btn-danger" href="{{ route('product.delete',$product->product_id) }}">Delete</a> </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
</body>
</html>