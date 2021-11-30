@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registrar Paises</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Registrar Paises</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Registrar Pais</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('paises.store') }}" method="post" id="quickForm">
                            @csrf
                            <div class="card-body">
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                <div class="form-group">
                                    <label for="input_pais">Nombre</label>
                                    <input type="text" name="pais" value="{{ old('pais') }}" class="form-control"
                                        id="input_pais" placeholder="Ingrese Pais">
                                    @if ($errors->has('pais'))
                                        <span class="error text-danger"
                                            for="input-pais">{{ $errors->first('pais') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="ratioActivo1">Status</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="activo_pais"
                                            id="ratioActivo1" value="1" checked>
                                        <label class="form-check-label" for="ratioActivo1">Activo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="activo_pais"
                                            id="ratioActivo2" value="0">
                                        <label class="form-check-label" for="ratioActivo2">inactivo</label>
                                    </div>
                                    @if ($errors->has('activo_pais'))
                                        <span class="error text-danger"
                                            for="input-activo_pais">{{ $errors->first('activo_pais') }}</span>
                                    @endif
                                </div> 
                                <div class="form-group">
                                    <label for="ratioBorrado1">Borrado</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="borrado_pais"
                                            id="ratioBorrado1" value="1" checked>
                                        <label class="form-check-label" for="ratioBorrado1">Activo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="borrado_pais"
                                            id="ratioBorrado2" value="0">
                                        <label class="form-check-label" for="ratioBorrado2">inactivo</label>
                                    </div>
                                    @if ($errors->has('borrado_pais'))
                                        <span class="error text-danger"
                                            for="input-borrado_pais">{{ $errors->first('borrado_pais') }}</span>
                                    @endif
                                </div> 
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
