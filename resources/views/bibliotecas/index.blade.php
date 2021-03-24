@extends('layouts.app')

@section('content')
<div class="container">
        


    @if(Session::has('mensaje'))
    {{Session::get('mensaje')}}
    @endif
    <h1 class="text-center">Albúm de libros</h1>
    <br>
    <!--Buscador-->
    <form class="form-search content-search navbar-form" action="{{route('bibliotecas.index')}}" method="GET">
        <div class="input-group mb-3"> 
            <input placeholder="Buscar" class="form-control form-text" type="text" name="search" id="search" value="{{request()->query('search')}}" /> 
            <span class="input-group-btn">
                &nbsp;  &nbsp;&nbsp;  &nbsp; <button type="submit" class="btn btn-primary"><span class="icon glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
            </span>
        </div>
    </form>
    <a href="{{url('bibliotecas/create')}}" class="btn btn-primary"> Añadir libro</a>
    <br>
    <br>
    <div class="row"><!--contenedor para las cards-->
        <!--tarjeta o card -->
        @foreach($bibliotecas as $biblioteca)
            <div class="col-xs-12 col-md-3 pb-3 pt-2 ">
                <div class="card shadow bg-white rounded p-1">
                    <div class="card-body text-center">
                        <tr>
                            <th>
                                <img class="rounded" src="{{route('show.image',$biblioteca->Portada)}}" width="200px" height="200px">
                            </th>
                            <hr>
                            <th><h6><strong>Titulo de libro:</strong></h6>{{$biblioteca->Titulo}}</th>
                            <th><h6><strong>Autor:</strong></h6>{{$biblioteca->Autor}}</td>
                            <th><h6><strong>Breve descripción:</strong></h6>{{$biblioteca->DescripcionCorta}}</th>
                            <hr>
                            <th>
                                <a href="{{url('/bibliotecas/'.$biblioteca->id.'/edit')}}" class="btn btn-primary pl-5 pr-5 ml-3 mb-2">
                                    Editar 
                                </a> &nbsp;  &nbsp; 
                                <a href="{{route('show.libro',$biblioteca->id)}}" class="btn btn-success pl-5 pr-5 ml-3 mb-2"> 
                                    &nbsp; Más &nbsp;  
                                </a>  &nbsp;  &nbsp; <br>
                                <form action="{{url('/bibliotecas/'.$biblioteca->id)}}" class="d-inline" method="post">
                                    @csrf
                                    {{method_field('DELETE ')}}
                                    <input class="btn btn-danger pl-5 pr-5" type="submit" onclik="return confirm('¿Deseas Borrar?')"  value="Borrar">
                                </form>
                            </th>
                        </tr>
                    </div><!--card-body-->
                </div><!--card-->
            </div><!--col4-->
        @endforeach
    </div>
</div>
@endsection
