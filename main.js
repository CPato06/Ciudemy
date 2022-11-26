$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
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
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    ap_paterno = fila.find('td:eq(2)').text();
    ap_materno = fila.find('td:eq(3)').text();
    correo = fila.find('td:eq(4)').text();
    username = fila.find('td:eq(5)').text();
    contrasena = fila.find('td:eq(6)').text();
    rol = parseInt(fila.find('td:eq(7)').text());
    
    $("#nombre").val(nombre);
    $("#ap_paterno").val(appat);
    $("#ap_materno").val(apmat);
    $("#correo").val(correo);
    $("#username").val(pais);
    $("#contrasena").val(edad);
    $("#tipo_usuario_idusuario").val(nombre);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaPersonas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    ap_paterno = $.trim($("#ap_paterno").val());
    ap_materno = $.trim($("#ap_materno").val());    
    correo = $.trim($("#correo").val());
    username = $.trim($("#username").val());
    contrasena = $.trim($("#contrasena").val());    
    rol = $.trim($("#tipo_usuario_idusuario").val());    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, ap_paterno:ap_paterno, ap_materno:ap_materno, correo:correo, username:username, contrasena:contrasena, rol:rol, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombre = data[0].nombre;
            ap_paterno = data[0].ap_paterno;
            ap_materno = data[0].ap_materno;
            correo = data[0].correo;
            username = data[0].username;
            contrasena = data[0].contrasena;
            rol = data[0].rol;
            if(opcion == 1){tablaPersonas.row.add([id,nombre,ap_paterno,ap_materno,correo,username,contrasena,rol]).draw();}
            else{tablaPersonas.row(fila).data([id,nombre,ap_paterno,ap_materno,correo,username,contrasena,rol]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});