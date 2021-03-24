@extends('layouts.app')

@section('content')
<div class="container">
<div class="centrado">
</div>


<form action="{{url('/bibliotecas/'.$bibliotecas->id)}}" method="post" enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
@include('bibliotecas.form',['modo'=>'Modificar'])

</form>
</div>
@endsection
