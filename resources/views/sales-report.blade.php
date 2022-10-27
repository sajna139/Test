<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>Sales Report</title>
</head>
<body>
    <div class="container-fluid">
        <!-- <br><br> -->
        <div class="row">
            <form method="POST" action="{{route('sales.reports.result')}}">
                @csrf
            <div class="col-md-12">
                <Label>Search By Sales Count</label>
                <input  type="text" name ="sales_quandity" class="form-control" value="{{$old_values['sales_quandity']}}">
                <br>
                <Label>Search By Customer Name/Email</label>
                <input  type="text" name ="c_name_or_email" class="form-control" value="{{$old_values['c_name_or_email']}}">
                                    
            </div>
            <div class="col-md-3"> 
                <br>
                <button type="submit" class="btn btn-primary"  id = "view-report">View</button>                     
            </div>
            </form>
        </div>
        

        <div class="row">
        @if($sales_data != null)
        <?php $count = 0; ?>
        <table class="table table-striped-columns">
        <thead >
            <tr>
                <th >Count</th>
                <th >Customer Name</th>
                <th >DOB</th>
                <th >Email</th>
                <th >Product Name</th>
                <th >Quantity</th>
                <th >Total Price</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($sales_data as $sale)
        <tr>
        <td>{{$count+1}}</td>
        <td>{{$sale->name}}</td>
        <td>{{$sale->dob}}</td>
        <td>{{$sale->email}}</td>
        <td>{{$sale->product_name}}</td>
        <td>{{$sale->quantity}}</td>
        <td>{{($sale->quantity)*($sale->price)}}</td>
        </tr>
        @endforeach
        </tbody>
        </table>          
        @endif  
        </div>
    </div>
    
</body>
</html>