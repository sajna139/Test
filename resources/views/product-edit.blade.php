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
    <title>Add Product</title>
</head>
<body>
    <div class="container">
        <br> <br> <br><br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        Add Your Product Here !!!
                    </div>
                    <div class="card-body">
                    <form action="{{ route('product.update',$product->product_id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="product_name" >Product Name</label>
                            <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}"></input>
                             @if($errors->has('product_name'))
                            <p style="color: red">
                            {{$errors->first('product_name')}} 
                            @endif  
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category" id="category">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$product->category_id == $category->id ? "selected" : "" }}>{{$category->name}}</option>
                                @endforeach
                            </select>    
                                 @if($errors->has('category'))
                                <p style="color: red">
                                {{$errors->first('category')}} 
                                @endif    
                                </p>
                        </div>
                        <div class="form-group">
                            <label for="price" >Price</label>
                            <input type="number" class="form-control" name="price" value="{{$product->price}}"></input>
                            @if($errors->has('price'))
                            <p style="color: red">
                            {{$errors->first('price')}} 
                            @endif  
                            </p>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>

        </div>
    </div>
</body>
</html>