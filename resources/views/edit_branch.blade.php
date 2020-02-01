@extends('layouts.app') 
@section('page-title', trans('words.acd')) 
@section('page-css')
@stop
@section('content')
<div class="container-fluid">
    <div align="center">
        <form class="col-md-8" action="/update/branch/{{$branch->id}}" method="GET">
            <div class="form-group">
                <label for="exampleInputEmail1">Marca</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$branch->name}}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <a class="btn btn-danger" href="/branch">Cancelar</a>
    </div>
    <br>
</div>
@stop