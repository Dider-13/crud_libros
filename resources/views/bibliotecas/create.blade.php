@extends('layouts.app')

@section('content')
<div class="container">

<center>
<h1>Registro de libros.</h1>
</center>
<form action="{{url('/bibliotecas')}}" method="post" enctype="multipart/form-data">
@csrf
@include('bibliotecas.form',['modo'=>'Registrar'])
</form>
@endsection
</div>