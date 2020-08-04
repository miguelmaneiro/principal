var total = 0;
var cont = 0;
var subtotal = [];

$(document).ready(() => {
    $("#btn_agregar").click(e => {
        agregar();
    });

    if ($("#old_values").val() != "") {
        let c1 = $("#old_values").val();
        cont = $("#old_values").val();

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
});

$("#guardar").hide();

function limpiar() {
    $("#pcantidad").val("");
    $("#pcompra").val("");
    $("#pventa").val("");
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
    let pcompra = $("#pcompra").val();
    let pventa = $("#pventa").val();

    if (
        idarticulo != "" &&
        cantidad != "" &&
        cantidad > 0 &&
        pcompra != "" &&
        pventa != ""
    ) {
        subtotal[cont] = cantidad * pcompra;
        total = total + subtotal[cont];
        let soloNumeros ='onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"';

        let fila = '<tr id="fila-'+cont+'"><td><button type="button" class="btn btn-warning" id="btn-'+cont+'" onClick="eliminar('+cont+');">x</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'" class="form-control" ' +soloNumeros+'></td><td><input type="number" name="precio_compra[]" value="'+pcompra+'" class="form-control" '+soloNumeros +'></td><td><input type="number" name="precio_venta[]" value="'+pventa+'" '+soloNumeros+' class="form-control"></td><td>'+subtotal[cont]+'</td></tr>';

        limpiar();
        evaluar();
        $("#detalles").append(fila);
        $("#total").html("$/ " + total);

        $("#old_values").val(cont);
        cont++;
    } else {
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
