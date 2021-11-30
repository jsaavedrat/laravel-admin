@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Pais</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Editar Pais</li>
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
                            <h3 class="card-title">Editar Pais</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('paises.update', $pais->id) }}" method="post" id="quickForm">
                            @csrf
                            @method('PUT')
                            @csrf
                            <div class="card-body">    
                                @if (session('success'))
                                <div class="alert alert-success" role="success">
                                  {{ session('success') }}
                                </div>
                                @endif                             
                                <div class="form-group">
                                    <label for="input_pais">Nombre</label>
                                    <input type="text" name="pais" value="{{ old('pais', $pais->pais) }}" class="form-control"
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
                                            id="ratioActivo1" value="1"  {{ $pais->activo_pais === 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="ratioActivo1">Activo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="activo_pais"
                                            id="ratioActivo2" value="0"  {{ $pais->activo_pais === 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="ratioActivo2">inactivo</label>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="ratioBorrado1">Borrado</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="borrado_pais"
                                            id="ratioBorrado1" value="1"  {{ $pais->borrado_pais === 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="ratioBorrado1">Activo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="borrado_pais"
                                            id="ratioBorrado2" value="0"  {{ $pais->borrado_pais === 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="ratioBorrado2">inactivo</label>
                                    </div>
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
