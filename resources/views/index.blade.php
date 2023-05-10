<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    <style>
        #tblMaster{
            /* margin-top:80px; */
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">
              <img alt="Brand" src="{{ asset('supz.png') }}" style="width: 30px">
            </a>
          </div>
        </div>
    </nav>

     <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1>
            Laporan Sortir
            <small>List Laporan Sortir</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><i class="fa fa-files-o"></i> Laporan</li>
            <li><a href="{{ route('catalog.index') }}"><i class="fa fa-files-o"></i>Laporan Sortir</a></li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-body form-horizontal">
                    <h3 class="box-title">
                        <a class="btn btn-primary" href="{{ route('catalog.create') }}">
                            <span class="fa fa-plus"></span> Add New
                        </a>
                    </h3>
                </div>
                <div class="box-body form-horizontal">
                    <table id="tblMaster" class="table table-bordered table-striped" cellspacing="0" width="100%"  style="white-space: nowrap;">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Supplier</th>
                                <th>Name PIC Supplier</th>
                                <th>Nama PIC Store</th>
                                <th>No Barang</th>
                                <th>Tanggal Sortir</th>
                                <th>Problem</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->kd_supplier }}</td>
                                <td>{{ $value->nm_picsupp }}</td>
                                <td>{{ $value->nm_picstore }}</td>
                                <td>{{ $value->no_barang }}</td>
                                <td>{{ $value->tanggal_sortir }}</td>
                                <td>{{ $value->problem }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm" type="button" onclick="edit('{{ $value->no_doc }}')">Edit</button>                                    
                                    <form action="{{ route('catalog.delete', $value->no_doc) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                    </form>                                    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation/foundation.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function edit(no_doc) {
            var url = "{{ route('catalog.edit', ['param']) }}";
            url = url.replace('param',  no_doc);
            window.location = url;
        }

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(id);
            var url = "{{ route('catalog.delete', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>