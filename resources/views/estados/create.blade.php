@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registrar Estados</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Registrar Estados</li>
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
                            <h3 class="card-title">Registrar Estado</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('estados.store') }}" method="post" id="quickForm">
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
                                    <label for="input_estado">Nombre Estado</label>
                                    <input type="text" name="estado" value="{{ old('estado') }}" class="form-control"
                                        id="input_estado" placeholder="Ingrese Estado">
                                    @if ($errors->has('estado'))
                                        <span class="error text-danger"
                                            for="input-estado">{{ $errors->first('estado') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Pais</label>
                                    <select name="id_pais" value="{{ old('id_pais') }}" class="custom-select">
                                        @foreach ($paises as $pais)
                                      <option value="{{$pais->id}}">{{$pais->pais}}</option>                                        
                                        @endforeach 
                                    </select>
                                    @if ($errors->has('id_pais'))
                                    <span class="error text-danger"
                                        for="input-estado">{{ $errors->first('id_pais') }}</span>
                                @endif
                                  </div>
                                <div class="form-group">
                                    <label for="ratioActivo1">Status</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="activo_estado"
                                            id="ratioActivo1" value="1" checked>
                                        <label class="form-check-label" for="ratioActivo1">Activo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="activo_estado"
                                            id="ratioActivo2" value="0">
                                        <label class="form-check-label" for="ratioActivo2">inactivo</label>
                                    </div>
                                    @if ($errors->has('activo_estado'))
                                        <span class="error text-danger"
                                            for="input-activo_estado">{{ $errors->first('activo_estado') }}</span>
                                    @endif
                                </div> 
                                <div class="form-group">
                                    <label for="ratioBorrado1">Borrado</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="borrado_estado"
                                            id="ratioBorrado1" value="1" checked>
                                        <label class="form-check-label" for="ratioBorrado1">Activo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="borrado_estado"
                                            id="ratioBorrado2" value="0">
                                        <label class="form-check-label" for="ratioBorrado2">inactivo</label>
                                    </div>
                                    @if ($errors->has('borrado_estado'))
                                        <span class="error text-danger"
                                            for="input-borrado_estado">{{ $errors->first('borrado_estado') }}</span>
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
