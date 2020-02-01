@extends('layouts.app') 
@section('page-title', trans('words.acd')) 
@section('page-css')
@stop
@section('content')
<div class="container-fluid">
    <div align="center">
        <form class="col-md-8" action="/insert/branch" method="GET">
            <div class="form-group">
                <label for="exampleInputEmail1">Marca</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Inserta una nueva marca">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <br>
    <div align="center">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Marcas</h6>
            </div>
           <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($branches as $branch)
                    <tr>
                        <td>{{$branch->id}}</td>
                        <td>{{$branch->name}}</td>
                        <td>
                            <input type="button" value="Editar" onclick="edit('{{$branch->id}}')"  class="btn btn-primary">
                            <input type="button" value="Eliminar" onclick="eliminar('{{$branch->id}}')"  class="btn btn-danger">
                        </td>
                    </tr>
                    @endforeach                    
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
@section('script')
<script>
function edit(id){
    window.location.href="/edit/branch/"+id;
}

function eliminar(id){
    window.location.href="/delete/branch/"+id;
}
</script>
@stop