var total = 0;
var cont = 0;
var subtotal = []; 

$(document).ready(() => {
    $("#btn_agregar").click(e => {
        agregar();
    });

    if ($("#old_values").val() != "") {
        cont = $("#old_values").val();
        
        if ($("#pcompra").length)
        {
            for (let i = 0; i <= cont; i++) {
                let c1 = $("#h-cantidad-" + i).val();
                let c2 = $("#h-precio_compra-" + i).val();

                subtotal[i] = c1 * c2;
                total = total + subtotal[i];
                $("#total").html("$/ " + total);
            }
            $("#old_values").val("");
            cont++;
        }
        if ($("#pdescuento").length)
        { 
            for (let i = 0; i <= cont; i++) {
                let c1 = $("#h-cantidad-" + i).val();
                let c2 = $("#h-precio_venta-" + i).val();
                
                subtotal[i] = c1 * c2;
                total = total + subtotal[i];
                $("#total").html("$/ " + total);
            }
            $("#old_values").val("");
            cont++;
        }       
    }
});

$("#guardar").hide();

function limpiar() {
    $("#pcantidad").val("");
    if ($("#pcompra").length) { $("#pcompra").val(""); $("#pventa").val(""); }
    if ($("#pdescuento").length) {$("#pdescuento").val(""); $("#pstock").val(""); $("#disVenta").val("");}
    

}

function evaluar() {
    if (total > 0) {
        $("#guardar").show();
    } else {
        $("#guardar").hide();
    }
}

function agregar() {
    let idarticulo = $("#pidarticulo").val();
    let articulo = $("#pidarticulo option:selected").text();
    let cantidad = $("#pcantidad").val();

    let pdescuento;
    let pcompra;
    let pventa;

    if ($("#pcompra").length) 
    {
        pcompra = $("#pcompra").val(); 
        let pdescuento = "n";
        pventa = $("#pventa").val();
    }
    if ($("#pdescuento").length) 
    {
        pdescuento = $("#pdescuento").val(); 
        let pcompra = "n"; 
        let str = $("#ocultoPrecios option[value="+idarticulo+"]").text();
        let arr = new Array;
        arr = str.split("-");
        pventa = arr[0];
    }

    if ((idarticulo != "" && cantidad != "" && cantidad > 0 && pventa != "") && (pcompra != "" || pdescuento != "")) 
    {
        if ($("#pcompra").length) subtotal[cont] = cantidad * pcompra;
        if ($("#pdescuento").length) {subtotal[cont] = cantidad * pventa;}
        total = total + subtotal[cont];
        let soloNumeros ='onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"';
        
        if ($("#pcompra").length) 
        {
            let fila = '<tr id="fila-'+cont+'"><td class="align-middle text-center"><button type="button" class="btn btn-warning" id="btn-'+cont+'" onClick="eliminar('+cont+');">x</button></td><td class="align-middle"><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td class="align-middle"><input type="number" name="cantidad[]" value="'+cantidad+'" class="form-control" ' +soloNumeros+'></td><td class="align-middle"><input type="number" name="precio_compra[]" value="'+pcompra+'" class="form-control" '+soloNumeros +'></td><td class="align-middle"><input type="number" name="precio_venta[]" value="'+pventa+'" '+soloNumeros+' class="form-control"></td><td class="align-middle text-center">'+subtotal[cont]+'</td></tr>';
            $("#detalles").append(fila);
        }
        
        if ($("#pdescuento").length)
        {
            let fila = '<tr id="fila-'+cont+'"><td class="align-middle text-center"><button type="button" class="btn btn-warning" id="btn-'+cont+'" onClick="eliminar('+cont+');">x</button></td><td class="align-middle"><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td class="align-middle"><input type="number" name="cantidad[]" value="'+cantidad+'" class="form-control" ' +soloNumeros+'></td><td class="align-middle"><input type="number" name="precio_venta[]" value="'+pventa+'" '+soloNumeros+' class="form-control"></td><td class="align-middle"><input type="number" name="descuento[]" value="'+pdescuento+'" class="form-control" '+soloNumeros +'></td><td class="align-middle text-center">'+subtotal[cont]+'</td></tr>';
            $("#detalles").append(fila); 
        }

        limpiar();
        evaluar();
        
        $("#total").html("$/ " + total);
        $("#old_values").val(cont);
        cont++;
    } 
    else 
    {
        alert("Error al ingresar el registro, por favor revise");
    }
}

function eliminar(index) {
    total = total - subtotal[index];
    // if (total == "NaN") total = "0.00";
    $("#total").html("$/ " + total);
    $("#fila-" + index).remove();
    evaluar();
}

function selecArticulo()
{
    let idarticulo = $("#pidarticulo").val();
    let str = $("#ocultoPrecios option[value="+idarticulo+"]").text();
    let res = new Array;
    res = str.split('-');
    let precio = res[0];
    let stock = res[1];
    $("#pstock").val(stock);
    $("#disVenta").val(precio);
    
}
