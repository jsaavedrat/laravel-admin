@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Editar Usuario</li>
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
                            <h3 class="card-title">Editar Usuario</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('users.update', $user->id) }}" method="post" id="quickForm">
                            @csrf
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="input_name">Nombre</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                        id="input_name" placeholder="Ingrese Nombre">

                                    {{-- <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" id="input_name" placeholder="Ingrese Nombre"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                        id="exampleInputEmail1" placeholder="Ingrese email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                
                                <div class="form-group">
                                    <label>Pais</label>
                                    <select id="pais" name="pais" class="custom-select">

                                        <option value="">Seleccione Pais</option>
                                        @foreach ($paises as $pais)
                                            <option value="{{ $pais->id }}"
                                                {{ old('pais', $currentpais->id )== $pais->id ? 'selected' : '' }}>{{ $pais->pais }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select id="estados" name="id_estado" data-old="{{ old('id_estado', $user->id_estado) }}" class="custom-select">
                                    </select>
                                    @if ($errors->has('id_estado'))
                                        <span class="error text-danger"
                                            for="input-id_estado">{{ $errors->first('id_estado') }}</span>
                                    @endif
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0"
                                        {{ $user->status === 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio1">Inactivo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1"
                                        {{ $user->status === 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio2">Activo</label>
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

@section('script')
    <script>
        jQuery(document).ready(function() {
            function loadCareer() {
                
                var old = $('#estados').data('old') != '' ? $('#estados').data('old') : '';
                $('#estados').empty();
                $('#estados').append("<option value=''>Selecciona un Estado</option>");
                let cid = $('#pais').val();;

                jQuery.ajax({
                    url: '/getState',
                    type: 'post',
                    data: 'cid=' + cid + '&_token={{ csrf_token() }}',
                    success: function(states) {
                         $.each(states, function (index, value) {
                             console.log(old)
                        //    $('#estados').append("<option value='" + value.id +  "'>" + value.estado +"</option>");
                            $('#estados').append("<option value='" + value.id + "'" + (old === value.id ? 'selected' : '') + ">" + value.estado +"</option>");

                        }) 
                    }
                });
            }
            loadCareer();
            jQuery('#pais').on('change',  loadCareer);
        });
    </script>
@endsection
