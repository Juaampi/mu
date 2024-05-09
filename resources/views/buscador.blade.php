@extends('layouts.app')

@section('content')
<div class="row" style="margin-bottom: 10px;">
                          
    <div class="col-md-8">
        <input id="abuscar" class="form-control" placeholder="Ingrese el item que necesita encontrar">
    </div>
    <div class="col-md-2">
        <input id="buscarbtn" class="btn btn-primary" value="Buscar"/>                        
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){       

    $('#buscarbtn').on('click', function(){           
        const json = {!! json_encode($merged) !!};            
        let seleccionados = [];            
        seleccionados.length = 0;
        $("#tabla").find("tr:gt(0)").remove();

        //para más eficiencia crea un nuevo fragmento
        let fragment = document.createDocumentFragment();
        //recuoera el valor del input y guardalo en una variable
        let elValor = $('#abuscar').val();
        //si hay un valor
        if (elValor.length > 0) {
        // busca en el json si el nombre incluye (o empieza por) el valor
        
            json.forEach(j => {
                //if(j.nombre.startsWith(elValor))          
                var valueLower = j.value.name.toUpperCase();      
                if (valueLower.includes(elValor.toUpperCase())) {                    
                    seleccionados.push(j.value);
                }
            });
           
            var clean = seleccionados.filter((arr, index, self) =>
            index === self.findIndex((t) => (t.name === arr.name && t.MonsterID === arr.MonsterID)))


            //para cada elemento selccionado
            clean.forEach(s => {
            //crea un nuevo elemento p
           var $row = $('<tr>'+
                    '<td>'+s.MonsterID+'</td>'+      
                    '<td>'+s.name+'</td>'+
                    '<td>'+s.rate+'</td>'+      
                    '</tr>');    
            $('table> tbody:last').append($row);

            });
        }
    
    });
});

</script>
@endsection