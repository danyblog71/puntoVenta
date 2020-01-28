@extends('layouts.app') 
@section('page-title', trans('words.acd')) 
@section('page-css')
@stop
@section('content')
<div class="container-fluid">
    <div align="center">
        <form class="col-md-8" action="/insert/product" method="GET">
            <div class="form-group">
                <label for="exampleInputEmail1">Codigo</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="Inserta un codigo par el producto">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Inserta un nombre para el producto">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Precio</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="ejemplo 28.80">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="cantidad de producto">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Cateoria</label>
                <select id="idCat" name="idCat" class="form-control">
                  @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <br>
   <!-- <div align="center">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                  <tr>
                    <th>id</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>

                  </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                  </tr>
                  @endforeach                    
                </tbody>
              </table>
            </div>
          </div>
       </div>
    </div>

</div>-->
@stop