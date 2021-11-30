@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registros</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Registros</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $users }}</h3>

                            <p>Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <a href="{{ route('users.index') }}" class="small-box-footer">Ver Lista <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3> {{ $paises }}</h3>
                            <p>Paises</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-globe-americas"></i>
                        </div>
                        <a href="{{ route('paises.index') }}" class="small-box-footer">Ver Lista <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{ $estados }}</h3>
                            <p>Estados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <a href="{{ route('estados.index') }}" class="small-box-footer">Ver Lista <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
