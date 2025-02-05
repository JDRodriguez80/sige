@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Secciones')
@section('content_header_title', 'Seccion')
@section('content_header_subtitle', 'Dashboard')

{{-- Add custom page content --}}

{{-- Content body: main page content --}}

@section('content_body')
    <div class="row">
        <div class="col-md-9 offset-1">
            <div class="card card-outline card-success mt-5">
                <div class="card-header">
                    <h3 class="card-title">Seccion</h3>
                    <div class="card-tools">
                        <a href="{{route('section.create')}}" class="float-end btn btn-success"><i class="fa-solid fa-plus"></i>  Crear</a>
                        {{--<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>--}}

                    </div>
                </div>
                <div class="card-body ">
                    <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                        <tr>
                            <th style="text-align: center" class="col-2">Nombre</th>
                            <th style="text-align: center" class="col-1">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="col-md-3">
                                @foreach($sections as $section)
                                <td class="text-center">{{$section->nombre}}</td>
                                <td class="text-center">
                                    <div class="btn-group"  role="group" aria-level="Basic example">
                                        <a href="{{route('section.edit',$section->id)}}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
                                        <form action="{{url('/admin/section',$section->id)}}" method="POST"
                                              onclick="ask{{$section->id}}(event)" id="miFormulario{{$section->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function ask{{$section->id}}(event){
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: 'Desea eliminar la Escuela?',
                                                    text: "No se podra revertir!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    cancelButtonText: 'Cancelar',
                                                    cancelButtonColor: '#270a0a',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form=$('#miFormulario{{$section->id}}');
                                                        form.submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

{{-- Push extra CSS --}}

@push('css')
    <style>
        /* fondo transparente y sin bordes del conetenedor*/
        #example1_wrapper .dt-buttons{
            background-color: transparent;
            box-shadow: none ;
            border: none;
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        /*Estilo para los botones*/
        #example1_wrapper .btn{
            color: white;
            border-radius: 4px;
            padding: 5px 15px;
            font-size: 14px;
        }
        /*Estilo de colores personalizados*/
        .btn-danger{background-color: #dc3545; border:none}
        .btn-success{background-color: #28a745; border:none}
        .btn-info{background-color: #17a2b8; border:none}
        .btn-warning{background-color: #ffc107; border:none}
        .btn-default{background-color: #6e7176; border:none}
    </style>
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
        $(function(){
            $("#example1").DataTable({
                "pageLength": 10,
                "language":{
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron coincidencias",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }

                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [
                    {text:'<i class="fas fa-copy"></i> COPIAR', extend:'copy',className:'btn btn-default'},
                    {text:'<i class="fas fa-file-pdf"></i> PDF', extend:'pdf',className:'btn btn-danger'},
                    {text:'<i class="fas fa-file-csv"></i> CSV', extend:'csv',className:'btn btn-info'},
                    {text:'<i class="fas fa-file-excel"></i> Excel', extend:'excel',className:'btn btn-success'},
                    {text:'<i class="fas fa-print"></i> IMPRIMIR', extend:'print',className:'btn btn-warning'}
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });

    </script>
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@endpush
