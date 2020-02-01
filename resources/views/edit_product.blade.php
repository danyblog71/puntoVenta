@extends('layouts.app') 
@section('page-title', trans('words.acd')) 
@section('page-css')
@stop
@section('content')
<div class="container-fluid">
    <div align="center">
        <form class="col-md-8" action="/update/product/{{$product->id}}" method="GET">
            <div class="form-group">
                <label for="exampleInputEmail1">Codigo</label>
                <input type="text" class="form-control" id="code" name="code" value="{{$product->code}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Precio</label>
                <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Cantidad</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}">
            </div>
            <div class="form-group">
                <label>Tipo de cantidad</label>
                <select id="idCat" name="typeQuantity" value="{{$product->type_quantity}}" class="form-control">
                    <option value="piezas">piezas(Pz)</option>
                    <option value="metros">Metros(Mts)</option>
                    <option value="kilos">Kilos(kG)</option>
                    <option value="litros">Litros(Lt)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Marca</label>
                <select id="idCat" name="idBranch" class="form-control">
                  @foreach($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                  @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
          <a class="btn btn-danger" href="/">Cancelar</a>
    </div>
</div>
@stop
