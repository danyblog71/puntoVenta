<html>
    <head>
    <link rel="stylesheet" href="{{asset('assets/css/ticket.css')}}">       
    </head>
    <body>
        <div class="ticket">
        <h2 class="centrado">Proveedora de Pesca Ixiuruapa</h2>
        <p>{{date('Y-m-d')}}</p>
        <table>
                <thead>
                    <tr>
                        <th class="cantidad">can</th>
                        <th class="producto">product</th>
                        <th class="precio">$$</th>
                        <th class="text">importe</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($productData as $product)
                    <tr>
                        <td class="cantidad">{{$product['cant']}}</td>
                        <td class="producto">{{$product['name']}}</td>
                        <td class="precio">{{$product['precio']}}</td>
                        <td class="precio">{{$product['import']}}</td>
                    </tr>
                @endforeach    
                    <tr>
                        <td class="cantidad"></td>
                        <td class="producto">TOTAL</td>
                        <td></td>
                        <td class="precio">{{$total}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>

<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script>
window.print();
</script>