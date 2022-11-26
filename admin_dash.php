<?php require_once "vistas/parte_superior.php"?>

<!-- Inicio -->

<div class="container">
    <h1>Bienvenido Administrador</h1>
</div>
    
    
    
<?php
include_once 'database.php';
$sql = "SELECT idusuario, nombre, ap_paterno, ap_materno, correo, username, contrasena, tipo_usuario_idusuario FROM usuario";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>                                
                                <th>Apellido Materno</th>  
                                <th>Correo</th>
                                <th>username</th>
                                <th>contrasena</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['idusuario'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['ap_paterno'] ?></td>
                                <td><?php echo $dat['ap_materno'] ?></td>    
                                <td><?php echo $dat['correo'] ?></td>
                                <td><?php echo $dat['username'] ?></td>
                                <td><?php echo $dat['contrasena'] ?></td>
                                <td><?php echo $dat['tipo_usuario_idusuario'] ?></td>
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="pais" class="col-form-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="ap_paterno">
                </div>                
                <div class="form-group">
                <label for="edad" class="col-form-label">Apelido Materno:</label>
                <input type="number" class="form-control" id="ap_materno">
                </div>
                <label for="nombre" class="col-form-label">Correo:</label>
                <input type="text" class="form-control" id="correo">
                </div>
                <div class="form-group">
                <label for="pais" class="col-form-label">Username:</label>
                <input type="text" class="form-control" id="username">
                </div>                
                <div class="form-group">
                <label for="edad" class="col-form-label">Contraseña:</label>
                <input type="number" class="form-control" id="contrasena">
                </div>            
                <label for="nombre" class="col-form-label">Rol:</label>
                <input type="text" class="form-control" id="tipo_usuario_idusuario">
                </div>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>