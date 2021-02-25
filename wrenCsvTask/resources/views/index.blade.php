<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="icon" sizes="16x16" href="https://www.wrenkitchens.com/bundles/wrenwebsite/images/favicon.ico"
          type="image/x-icon"/>
    <link rel="shortcut icon" sizes="16x16" href="https://www.wrenkitchens.com/bundles/wrenwebsite/images/favicon.ico"
          type="image/x-icon"/>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Wren Kitchens | The UK&#039;s Number 1 Kitchen Retailer</title>    <title>Hello, world!</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <a class="navbar-brand" href="{{route('index')}}">Kitchen Retailer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}">Import Data</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
<br>
<div class="container">
    <div class="row">
        <div class="col-12">
            @include("msg")
        </div>
        <div class="col-md-3">
            <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">Import Data products</h5>
                    <form method="post" action="{{route('import')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="file" class="form-control" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">Go import</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <table class="table data_Table table-striped" id="data_Table">
                <thead>
                <th>#</th>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Date added</th>
                </thead>
            </table>
        </div>
    </div>
</div>


<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<script>
    $(document).ready(function () {
       data();
    });
    var data = function () {
        $('#data_Table').DataTable({
            "processing": true,
            "serverSide": true,
            "bStateSave": true,
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $(nRow).attr('id', aData['id']);
            },
            "ajax": {
                "url": "{{ route('get_data') }}",
                "dataType": "json",
                "type": "post",
                "data": {
                    _token: "{{csrf_token()}}",
                }
            },
            "columns": [
                {"data": "id"},
                {"data": "strProductCode"},
                {"data": "strProductName"},
                {"data": "strProductDesc"},
                {"data": "dtmAdded"},
            ]
        });
    }
</script>

</body>
</html>
