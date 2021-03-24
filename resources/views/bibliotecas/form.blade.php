<h1 class="ml-5">{{$modo}} Libro</h1>
<div class="container">
    <div class="form-group">
        <div class="col-xs-12 col-md-12 pb-3 pt-2 ">
            <div class="card shadow bg-white rounded p-1 text-left">
                <div class="card-body text-left">
                    <div>
                        <label for="Titulo">Titulo del libro: </label>
                        <input type="text" class="form-control"  name="Titulo" value="{{ isset($bibliotecas->Titulo)?$bibliotecas->Titulo:old('Titulo')}}"  id="Titulo"  >
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="Autor">Nombre del Autor:</label>
                        <input type="text" class="form-control" name="Autor" value="{{isset($bibliotecas->Autor)?$bibliotecas->Autor:old('Autor')}}" id="Autor">
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="DescripcionCorta">Ingresa la descripción corta:</label> <br>
                        <textarea type="text" class="form-control" name="DescripcionCorta"value="{{isset($bibliotecas->DescripcionCorta)?$bibliotecas->DescripcionCorta:old('DescripcionCorta')}}" id="DescripcionCorta" name="DescripcionCorta" rows="2" cols="30"></textarea>
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="DescripcionLarga">Ingresa la descripción larga:</label> <br>
                        <textarea type="text" class="form-control" name="DescripcionLarga"value="{{isset($bibliotecas->DescripcionLarga)?$bibliotecas->DescripcionLarga:old('DescripcionLarga')}}" id="DescripcionLarga" name="DescripcionLarga" rows="3" cols="30"></textarea>
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="barra">ISBN:</label> 
                        <input type="number" class="form-control" name="barra" value="{{isset($bibliotecas->barra)?$bibliotecas->barra:old('barra')}}" id="barra">
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="pais">País de origen:</label>
                        <input type="text" class="form-control" name="pais" value="{{isset($bibliotecas->pais)?$bibliotecas->pais:old('pais')}}" id="pais">
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="editorial">Editorial:</label>
                        <input type="text" class="form-control" name="editorial" value="{{isset($bibliotecas->editorial)?$bibliotecas->editorial:old('editorial')}}" id="editorial">
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="numeroPaginas">Numero de páginas:</label>
                        <input type="number" class="form-control" name="numeroPaginas" value="{{isset($bibliotecas->numeroPaginas)?$bibliotecas->numeroPaginas:old('numeroPaginas')}}" id="numeroPaginas">
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="año">Año de edición:</label>
                        <input type="number" class="form-control" name="año" value="{{isset($bibliotecas->año)?$bibliotecas->año:old('año')}}" id="año">
                        <br>
                    </div>
                    <br>

                    </div>
                        <input type="file" class="form-control p-1" name="Portada" value="" id="Portada">
                        <br>
                    </div>
                    <div >
                        <input class="btn btn-success " type="submit" value="{{$modo}} libro">
                        <a class="btn btn-primary" href="{{url('bibliotecas/')}}" > Regresar</a>
                    </div><br>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col4-->
    </div>
</div>

        
