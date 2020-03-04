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
            <input type="button" value="Generar Codigo" id="add" class="btn btn-primary">
            </form>
        </div>
    </div>
    <div id = con align="center" class="card-body">
        <img id="barcode"/>
    </div>
    <div>
    <input type="button" value="Generar PDF" id="pdf" class="btn btn-danger">
    </div>
@stop

@section('script')
<script src="{{asset('assets/js/jquery-1.9.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>

<script>
    $('#add').click(function(){
        $("#barcode").JsBarcode($('#code').val())
    })

    $('#pdf').click(function(){
        generarPDF();
    })

    function generarPDF(){
        html2canvas($("#con"), {
            useCORS: true,
            onrendered: function (canvas) {
                imgData = canvas.toDataURL(
                    'image/png');
                var doc = new jsPDF('p', 'pt', 'a4');
                doc.addImage(imgData, 'PNG', 0, 10);
                doc.addImage(imgData, 'PNG', 230, 10);
                doc.addImage(imgData, 'PNG', 0, 150);
                doc.addImage(imgData, 'PNG', 230, 150);
                doc.addImage(imgData, 'PNG', 0, 300);
                doc.addImage(imgData, 'PNG', 230, 300);
                doc.addImage(imgData, 'PNG', 0, 450);
                doc.addImage(imgData, 'PNG', 230, 450);
                doc.addImage(imgData, 'PNG', 0, 600);
                doc.addImage(imgData, 'PNG', 230, 600);
                doc.save('sample-file.pdf');
            }
        });
               
    }
</script>
@stop