@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Perfil Usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Perfil Usuario</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-info">
                            <h3 class="widget-user-username">{{ $user->name }}</h3>
                            <h5 class="widget-user-desc">{{$user->email}}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="{{ asset('images/admin_images/AdminLTELogo.png') }}"
                                alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row"> 
                                <div class="col-sm-6 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Pais</h5>
                                        <span class="description-text">{{$currentpais->pais}}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <div class="description-block">
                                        <h5 class="description-header">Estado</h5>
                                        <span class="description-text">{{$estado->estado}}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
