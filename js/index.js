/**
 * Created by jgutierrez on 13/01/18.
 */
//var url_base="../cg/salida/";
var url_base="app/";
$body = $("body")
var ultima_list_car=0;
var tabla_actual="";
/*
 * la validacion http://malsup.com/jquery/form/#ajaxForm
 * */
/*export en pdf y exel
 * https://datatables.net/extensions/buttons/examples/html5/simple.html
 *
 * */
$(function() {

    console.log( "Ha ocurrido document.ready: documento listo" );
    $("#extra").append(create_modal());
    $("#extra").append(create_loader_ajax());
});

$(document).on({
    ajaxStart: function() {  $('.page-loader-wrapper').show(); },
    ajaxStop:  function() { setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 1);}
});

function ver_tabla(tabla){
    var url=url_base+"index.php?tabla="+tabla+"&accion=all";
    console.log(url);
    $( "#content2").hide();
    $( "#content-1" ).load( url, function() {
        if(tabla=='turnos'){
            activar_grilla_dias(tabla);
        }else{
            activar_grilla(tabla);
        }


    });
}

function ver_select(tabla,campo,valor){

    $( "#select-"+tabla ).load( url_base+"index.php?tabla="+tabla+"&accion=select&campo="+campo+"&valor="+valor, function() {

    });

}

function ver_form(tabla,id){
    console.log("-----------------");
    $( "#content-1" ).load( url_base+"index.php?tabla="+tabla+"&accion=ver&id="+id, function() {

    });
}
function ver_form_modificar(tabla,id){

    $( "#content-1" ).load( url_base+"index.php?tabla="+tabla+"&accion=id&id="+id, function() {
        show_input();
        validate_success();
        //activar_select(tabla);
        set_date_piket();
    });
}
function ver_form_new(tabla){
    if(tabla=='v_viajes_activos'){
        tabla='viajes';
    }
    $( "#content-1" ).load( url_base+"index.php?tabla="+tabla+"&accion=new", function() {

        show_input();
        validate_success();
        activar_select(tabla);
        form_format();

    });

}



function borrar(t,id){
    var tabla=t;
    swal({
        title: "Atencion!",
        text: "Esta por borrar una fila de la tabla "+ '"'+tabla+ '"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {

            var url=url_base + "index.php?tabla="+tabla+"&accion=delete&id="+id;
            $.ajax({ url:url , success: function(result){

                var obj = JSON.parse(result);
                if(obj.status){
                    show_message("OK",obj.massage,"ok");
                    ver_tabla(tabla);
                }else{
                    show_message("Error",obj.massage,"error");
                }

            }});
        }
    });





}
function guardar(tabla,id){

    alert("se realizaron los cambios");
}
