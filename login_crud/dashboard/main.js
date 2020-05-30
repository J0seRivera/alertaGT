$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Persona");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id_usuario = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    apellido = fila.find('td:eq(2)').text();
    puesto = parseInt(fila.find('td:eq(3)').text());
    id_departamento = parseInt(fila.find('td:eq(4)').text());
    correo = fila.find('td:eq(5)').text();
    telefono = fila.find('td:eq(6)').text();
    direccion = fila.find('td:eq(7)').text();
    municipio = parseInt(fila.find('td:eq(8)').text());
    
    $("#id_usuario").val(id_usuario);
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#puesto").val(puesto);
    $("#id_departamento").val(id_departamento);
    $("#correo").val(correo);
    $("#telefono").val(telefono);
    $("#direccion").val(direccion);
    $("#municipio").val(municipio);
    
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id_usuario = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id_usuario+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id_usuario:id_usuario},
            success: function(){
                tablaPersonas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    id_usuario = $.trim($("#id_usuario").val());
    nombre = $.trim($("#nombre").val());
    apellido = $.trim($("#apellido").val());
    puesto = $.trim($("#puesto").val());
    id_departamento = $.trim($("#id_departamento").val());
    correo = $.trim($("#correo").val());
    telefono = $.trim($("#telefono").val());
    direccion = $.trim($("#direccion").val());
    municipio = $.trim($("#municipio").val());
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, apellido:apellido, puesto:puesto, id_departamento:id_departamento, correo:correo, telefono:telefono, direccion:direccion, municipio:municipio, id_usuario:id_usuario, opcion:opcion},
        success: function(data){  
            console.log(data);
            id_usuario = data[0].id_usuario;            
            nombre = data[0].nombre;
            apellido = data[0].apellido;
            puesto = data[0].puesto;
            id_departamento = data[0].id_departamento;
            correo = data[0].correo;
            telefono = data[0].telefono;
            direccion = data[0].direccion;
            municipio = data[0].municipio;
            if(opcion == 1){tablaPersonas.row.add([id_usuario,nombre,apellido,puesto,id_departamento,correo,telefono,direccion,municipio]).draw();}
            else{tablaPersonas.row(fila).data([id_usuario,nombre,apellido,puesto,id_departamento,correo,telefono,direccion,municipio]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});