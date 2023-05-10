<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="resources/css/act-create.css"> --}}
    {{-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    <style>
      section{
        padding: 10px;
      }
      fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1em 1em 1em !important;
        /* margin: 0 0 1em 0 !important; */
        -webkit-box-shadow:  0px 0px 0px 0px #000;
        box-shadow:  0px 0px 0px 0px #000;
      }
      
      legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
      }
      #loading-screen{
        width: 100%;
        height: 100%;
        background-color: #7d777745;
        position: fixed;
        z-index: 100;
        text-align: center;
        /* vertical-align: middle; */
        padding-top: 40vh;
      }

      .box-footer{
        margin-top: 90px;
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Laporan Sortir
          <small>Tambah Laporan Sortir</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><i class="fa fa-files-o"></i> QC - Laporan Sortir </li>
          <li><a href="{{ route('catalog.index') }}"><i class="fa fa-files-o"></i>Laporan Sortir</a></li>
          <li class="active">Tambah Data</li>
        </ol>
      </section>
      
      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Create Laporan Sortir</h3>
          </div>
          <!-- /.box-header -->
          {!! Form::open(['id' => 'form_id', 'url'=> '', 'method' =>'POST', 'class'=>'form-horizontal', 'autocomplete' => 'off', 'files' => 'true'])!!}
          @csrf
          @include('form')
          {!! Form::close() !!}
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation/foundation.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script type="module" src="{{ asset('js/script.js') }}"></script> --}}