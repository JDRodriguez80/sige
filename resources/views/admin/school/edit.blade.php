@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Creacion de Escuela')
@section('content_header_title', 'Escuela')
@section('content_header_subtitle', 'Dashboard')

{{-- Add custom page content --}}

{{-- Content body: main page content --}}

@section('content_body')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success mt-5">
                <div class="card-header">
                    <h3 class="card-title">Escuela</h3>
                    <div class="card-tools">
                        <a href="{{route('school.index')}}" class="float-end btn btn-secondary">Regresar</a>
                        {{--<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>--}}

                    </div>
                </div>
                <div class="card-body ">
                    <form action="{{url('admin/school/'.$school->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="photo">Logotipo</label>
                                <input type="file" id="file" name="logo" accept="*.jpg, *.jpeg, *.png" class="form-control"><br>
                                <center><output id="list"><img src="{{asset('storage/'.$school->logo)}}" alt="logo" width="80px" height="80px"></output></center>
                                <script>
                                    function archivo(evt) {
                                        var files = evt.target.files; // FileList object
                                        // Obtenemos la imagen del campo "file".
                                        for (var i = 0, f; f = files[i]; i++) {
                                            //Solo admitimos imágenes.
                                            if (!f.type.match('image.*')) {
                                                continue;
                                            }
                                            var reader = new FileReader();
                                            reader.onload = (function (theFile) {
                                                return function (e) {
                                                    // Insertamos la imagen
                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="50" title="', escape(theFile.name), '"/>'].join('');
                                                };
                                            })(f);
                                            reader.readAsDataURL(f);
                                        }
                                    }
                                    document.getElementById('file').addEventListener('change', archivo, false);
                                </script>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label for="section name" class="form-label">Nombre del la escuela: * </label>
                                <input type="text" class="form-control" id="name" name="nombre" value="{{$school->nombre}}" required>
                                @error('nombre')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="section name" class="form-label">Dirección * </label>
                                <input type="text" class="form-control" id="name" name="direccion" value="{{$school->direccion}}" required>
                                @error('direccion')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label for="section name" class="form-label">Email: * </label>
                                <input type="text" class="form-control" id="name" name="email" value="{{$school->email}}" required>
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="section name" class="form-label">Teléfono </label>
                                <input type="text" class="form-control" id="name" name="telefono" value="{{$school->telefono}} required">
                                @error('telefono')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Actualizar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

{{-- Push extra CSS --}}

@push('css')

    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')


@endpush
