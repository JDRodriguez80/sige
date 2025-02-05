@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Creacion de Seccion')
@section('content_header_title', 'Seccion')
@section('content_header_subtitle', 'Dashboard')

{{-- Add custom page content --}}

{{-- Content body: main page content --}}

@section('content_body')
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card card-outline card-success mt-5">
                <div class="card-header">
                    <h3 class="card-title">Seccion</h3>
                    <div class="card-tools">
                        <a href="{{route('section.index')}}" class="float-end btn btn-secondary">Regresar</a>
                        {{--<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>--}}

                    </div>
                </div>
                <div class="card-body ">
                    <form action="{{url('admin/section/store')}}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-12">

                                <label for="section name" class="form-label">Nombre: * </label>
                                <input type="text" class="form-control" id="name" name="nombre" placeholder="Nombre de la seccion"required>
                                @error('nombre')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Escuela</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                    </div>
                                    <select class="form-control" aria-label="Default select example" name="school_id">
                                        @foreach($schools as $school)
                                            <option value="{{$school->id}}">{{$school->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>

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
