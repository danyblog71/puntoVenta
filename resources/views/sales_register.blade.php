@extends('layouts.app') 
@section('page-title', trans('words.acd')) 
@section('page-css')
@stop
@section('content')
<div class="container-fluid">
    <div align="center">
        <form class="col-md-8"> 
          <div class="form-group">
                <label for="exampleInputEmail1">Codigo</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="Inserta un codigo de producto">
          </div>
          <div class="form-group">
                <label for="exampleInputEmail1">cantidad</label>
                <input type="text" class="form-control" id="cant" name="cant" placeholder="cantidad">  
          </div>                  
        <input type="button" value="Guardar" id="add" class="btn btn-primary">
        </form>
    </div>
</div>
<div align="center">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                  </tr>
                </thead>
                <tbody>                  
                </tbody>
              </table>
            </div>
          </div>
       </div>
    </div>

    <div align="center">             
        <input type="button" value="Realizar" id="realizar" onclick="getDatas()" class="btn btn-primary">
    </div>
@stop

@section('script')
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
$( document ).ready(function() {
  var table = $('#dataTable2').DataTable();
  $('#add').click(function(){
    products = new Array;
    var d = {code:$('#code').val(), name:'ppp', cantidad:$('#cant').val()};
    products.push(d);
    $.ajax({
        url: "getProduct/"+$('#code').val(),
        method: "GET",
        success: function(result)
        {       
          var obj = JSON.parse(result); 
          var cant = $('#cant').val();
          var precio = obj.price;
          var x = cant*precio;
          var rowNode = table
          .row.add([ obj.code, obj.name, obj.price, cant, x ])
          .draw()
          .node();          

          $('#code').val("");
          $('#cant').val("");
          alert(products);             
        },
        error: function(){
          alert('Producto no encontrado Verifique el codigo');
        }
        });
  })
});

function getDatas(){
  var table = $('#dataTable2').DataTable();
 
var data = table
    .rows()
    .data();
    
for (let i = 0; i < data.length; i++) {
  var rows = table.rows( i ).data();
  alert( 'Pupil name in the first row is: '+ rows[0]);
  
}

}

</script>
@stop