@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista Paises</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lista Paises</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista Paises</h3>
                            <div class="card-tools">
                                <a href="{{ route('paises.create') }}" class="btn btn-primary btn-sm">Añadir Pais</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}

                                </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nombre</th>
                                        <th>Status</th>
                                        <th style="width: 150px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paises as $pais)
                                        <tr>
                                            <td>{{ $pais->id }}</td>
                                            <td>{{ $pais->pais }}</td>
                                            <td>
                                                {{ $pais->activo_pais }}
                                            </td>
                                            <td class="td-actions text-center">                                               
                                                <a href="{{ route('paises.edit', $pais->id) }}"
                                                    class="btn btn-warning  btn-sm"><i class="far fa-edit"></i></a>
                                                <form action="{{ route('paises.delete', $pais->id) }}" method="POST"
                                                    style="display: inline-block;" onsubmit="return confirm('Desea Eliminar el Registro?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit" rel="tooltip">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form> 

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $paises->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection
