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
    <title>Add Sales</title>
</head>
<body>
    <div class="container">
        <br> <br> <br><br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        Add Sales
                    </div>
                    <div class="card-body">
                    <form method="POST"  action="{{route('sales.add')}}">
                        @csrf
                        <div class="form-group">
                            <label>Product</label>
                            <select class="form-control" name="product"  required>
                    
                                <option value="">Select Product</option>
                                @foreach($products as $product){
                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                                }
                                @endforeach

                                
                            </select>    
                        </div>
                        <div class="form-group">
                            <label>Customer Nmae</label>
                            <select class="form-control" name="customer"  required>
                    
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer){
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                }
                                @endforeach

                            </select>    
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <select class="form-control" name="quantity"  required>
                               
                            @for($i = 0; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor

                            </select>    
                        </div>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>

        </div>
    </div>
</body>
</html>