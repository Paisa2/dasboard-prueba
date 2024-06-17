@extends('layouts.main')

@section('title', 'Categoria')

@section('content')

    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header">
                <h1 class="mt-4">Casos</h1>
            </div>
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                </div>
                @endif

                <form action="{{url('admin/add-categoria') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="">Categoria Nombre</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Slog</label>
                            <input type="text" name="slog" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Descripcion</label>
                            <textarea name="descripcion" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <h6>SEO Tags</h6>
                        <div class="mb-3">
                            <label> Meta Title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label> Meta Descripcin</label>
                            <textarea name="meta_descripcion" rows='3' class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label> Meta keywonds</label>
                            <textarea name="meta_keyword" rows='3' class="form-control"></textarea>
                        </div>

                        <h4>Status Mode</h4>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label>Numero estado</label>
                                <input type="checkbox" name="number_status" />
                            </div>
                            <div class="col-md-3">
                                <label>Stados</label>
                                <input type="checkbox" name="status" />
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Guardar Caso</button>
                            </div>
                        </div>
                </form>

            </div>
        </div>
    </div>

@endsection
