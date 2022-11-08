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
    <title>Sales Report</title>
</head>

<body>
    <div class="container-fluid">
        <form method="POST" action="{{route('sales.reports.result')}}">
            @csrf
            <div class="row">

                <div class="col-md-3">
                    <Label>Search By Sales Count</label>
                    <input type="text" name="sales_quandity" class="form-control" value="{{$old_values['sales_quandity']}}">
                </div>
                <div class="col-md-3">
                    <Label>Search By Customer Name/Email</label>
                    <input type="text" name="c_name_or_email" class="form-control" value="{{$old_values['c_name_or_email']}}">
                </div>
                <div class="col-md-3">

                    <button type="submit" class="btn btn-primary" id="view-report" style=" margin-top: 30px;">View Report</button>
                </div>
            </div>
        </form>
        <br><br>
        @if($message != null)
        <div class="alert alert-warning">
            <strong>{{$message}}</strong>
        </div>
        @endif
        <?php $count = 1; ?>
        @if($sales_data != null)
        <br><br>
        <div class="row">
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>DOB</th>
                        <th>Email</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($sales_data as $sale)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$sale->name}}</td>
                        <td>{{$sale->dob}}</td>
                        <td>{{$sale->email}}</td>
                        <td>{{$sale->product_name}}</td>
                        <td>{{$sale->quantity}}</td>
                        <td>{{($sale->quantity)*($sale->price)}}</td>
                    </tr>
                    @empty
                    <tr>
                        <th colspan="7">No Data Found</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endif
    </div>

</body>

</html>