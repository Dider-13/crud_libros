@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="text-center">Información más detallada del libro </h2>
	<br>
	<h1 class="text-center">"{{$libro->Titulo}}"</h1>
	<!--tarjeta o card -->
            <div class="col-xs-12 col-md-7 pb-3 pt-2 float-left">
                <div class="card shadow bg-white rounded p-1 text-center">
                    <div class="card-body text-left">
                        <tr>
                            <th>
                                <img class="rounded image-fluid float-left mr-2 mb-2" src="{{route('show.image',$libro->Portada)}}">
                            </th>
                            <th><h6><strong>Titulo de libro:</strong></h6>{{$libro->Titulo}}</th>
                            <th><h6><strong>Autor:</strong></h6>{{$libro->Autor}}</td>
                            <th><h6><strong>Breve descripción:</strong></h6>{{$libro->DescripcionCorta}}</th>
							<th><h6><strong>Descripción más detallada:</strong></h6>{{$libro->DescripcionLarga}}</th>
                            <th><h6><strong>ISBN:</strong></h6>{{$libro->barra}}</th>
                            <th><h6><strong>Editorial:</strong></h6>{{$libro->editorial}}</th>
                            <th><h6><strong>País donde se realizo la edición:</strong></h6>{{$libro->pais}}</th>
                            <th><h6><strong>Paginás del libro:</strong></h6>{{$libro->numeroPaginas}}</th>
							<th><h6><strong>Año de edición del libro:</strong></h6>{{$libro->año}}</th>

                            <hr>
                            <th>
                                <a href="{{url('/bibliotecas/'.$libro->id.'/edit')}}" class="btn btn-primary pl-5 pr-5 ml-5 mb-2">
                                    Editar 
                                </a> &nbsp;  &nbsp; 
                                <a href="{{route('show.libro',$libro->id)}}" class="btn btn-success pl-5 pr-5 ml-3 mb-2 "> 
                                    &nbsp; Más &nbsp;  
                                </a>  &nbsp;  &nbsp; 
                                <form action="{{url('/bibliotecas/'.$libro->id)}}" class="d-inline" method="post">
                                    @csrf
                                    {{method_field('DELETE ')}}
                                    <input class="btn btn-danger pl-5 pr-5 " type="submit" onclik="return confirm('¿Deseas Borrar?')"  value="Borrar">
                                </form>
                            </th>
                        </tr>
                    </div><!--card-body-->
                </div><!--card-->
            </div><!--col4-->
                <div class="col-xs-12 col-md-5 pb-3 pt-2 float-left">
                    <div class="card shadow bg-white rounded p-1 text-center">
                        <div class="card-body text-left text-center">
                            <h3>¡¡Por programar es nuestro mundo!!</h3>
                            <img  src="/img/programacion.gif" width="350px" height="200px">
                        </div><!--card-body-->
                    </div><!--card-->
                </div><!--col4-->

</div>
@endsection