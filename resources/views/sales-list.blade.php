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
    <title>sales List</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row" id = "list-heading">
         <div class="col-md-10"><h2>Sales List</h2></div>   
         <div class="col-md-2">
         <a class="btn btn-dark" href="{{ route('sales.reports') }}">View Report</a>
         </div>  
        </div>        
    </div>
    <table class="table table-striped-columns">
        <thead >
            <tr>
                <th >Sales No</th>
                <th >Invoice Number</th>
                <th >Product Name</th>
                <th >Customer Name</th>
                <th >Price Of One Product</th>
                <th >Quantity</th>
                <th >Total Price</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($sales as $sale)
        <tr>
        <td>{{$sale->id}}</td>
        <td>{{$sale->invoice_number}}</td>
        <td>{{$sale->product_name}}</td>
        <td>{{$sale->customer_name}}</td>
        <td>{{$sale->price}}</td>
        <td>{{$sale->quantity}}</td>
        <td>{{($sale->quantity)*($sale->price)}}</td>
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