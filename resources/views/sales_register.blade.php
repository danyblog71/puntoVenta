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
                <div id="tablePrint"></div>
              </div>
            </div>
       </div>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label  align="center">Total</label>
        <input type="text" class="form-control" id="total" name="total" disabled>
      </div>
    </div>

    <div align="center">             
        <input type="button" value="Realizar" id="realizar" class="btn btn-primary">
        <input type="button" value="Cancelar" id="cancelar" class="btn btn-danger">
    </div>
@stop

@section('script')
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
  $( document ).ready(function() {
    var products = new Array;
//var table = $('#dataTable2').DataTable();
    $('#realizar').click(function(){
      sale(products);
    })
    $('#add').click(function(){
      $.ajax({
        url: "getProduct/",
        data: {code:$('#code').val(), cantidad:$('#cant').val()},
        method: "GET",
        success: function(result)
        {  
          if (result == 0) {
            alert('no hay suficientes Productso')
          } else {
            var obj = JSON.parse(result); 
            var cant = $('#cant').val();
            var precio = obj.price;
            var x = cant*precio;
            var check;
            var dates = {id: obj.id, code:obj.code, nombre:obj.name, precio:obj.price, cantidad:cant, importe:x };

            for (let j = 0; j < products.length; j++) {
              if(products[j].code == obj.code) {
                var z = parseFloat(products[j].cantidad) + parseFloat(cant);
                if (z <= obj.quantity) {
                  check = true;
                  products[j].cantidad = z;
                  break;
                } else {
                  check = true;
                  alert('No hay suficientes productos');
                }              
              } else {
                check = false;
              }           
            }
            if (check != true) {
              products.push(dates); 
              generar_tabla(products);            
            } else {
              generar_tabla(products);
            }            
          }
          $('#code').val("");
          $('#cant').val("");     
                      
        },
        error: function(){
          alert('Producto no encontrado Verifique el codigo');
        }
      });
      
    });
  });

  function generar_tabla(data){
     productos = data;
     console.log(productos);
    let myTable= "<table class='table table-bordered'>";
    myTable+= "<thead>";
    myTable+="<tr>";
    myTable+="<th>Id</th>";
    myTable+="<th>Codigo</th>";
    myTable+="<th>Nombre</th>";
    myTable+="<th>Precio</th>";
    myTable+="<th>Cantidad</th>";
    myTable+="<th>Importe</th>";
    myTable+="</tr>";
    myTable+="</thead>";
    var total = 0;
    for (var i = 0; i < productos.length; i++) {
        myTable+="<tr><td>" + productos[i].id + "</td>";        
        myTable+="<td>" + productos[i].code + "</td>";    
        myTable+="<td>" + productos[i].nombre + "</td>";    
        myTable+="<td>" + productos[i].precio + "</td>";
        myTable+="<td>" + productos[i].cantidad + "</td>"; 
        myTable+="<td>" + productos[i].importe + "</td>"; 
        myTable+="</tr>";
        total = productos[i].importe + total;
    }      
   
      myTable+="</table>";
      document.getElementById('tablePrint').innerHTML = myTable;
      $('#total').val(total);
  }

  function sale(dates){
    insertSale($('#total').val());
    for (let i = 0; i < dates.length; i++) {
      $.ajax({
        url: "/register/sale",
        method: "GET",
        data: {'id': dates[i].id, 'cantidad':dates[i].cantidad, 'importe':dates[i].importe},
        success: function(result)
        {   
          console.log(result);    

          },
        error: function(){
          alert('Producto no encontrado Verifique el codigo');
        }
      });      
    }
    window.open("/ticket", "Diseño Web", "width=900, height=600")
    window.location.href = '{{url("/sales")}}';

  }

  function insertSale(total) {
    $.ajax({
        url: "/new/sale",
        method: "GET",
        data: {'total': total},
        success: function(result)
        {       

        },
        error: function(){
          alert('Producto no encontrado Verifique el codigo');
          return 'sin resultado';
        }
      });
  }

  $('#cancelar').click(function(){
    window.location.href = '{{url("/sales")}}';
  })
</script>
@stop