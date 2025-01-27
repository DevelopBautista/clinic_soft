<?php
include('../app/config.php');
include('../layout/sessiones.php');
include("../app/controllers/usuarios/update.php");
include("../app/controllers/roles/listarRoles.php");
include('../layout/superior.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Actualizar Datos del Personal</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-11">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">información del Personal</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!--formulario-->
                            <form action="../app/controllers/usuarios/updateControllerUsuario.php" method="post">
                                <input type="text" name="id" value="<?php echo $id_usuario_get; ?>" hidden>
                                <div class="card-body">
                                    <!--f01-->
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="nombres"
                                                value="<?php echo $nombres; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <input type="text" class="form-control" name="dir" value="<?php echo $dir;?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="tel" value="<?php echo $tel;?>">
                                        </div>
                                    </div>
                                    <!--f02-->
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="email" value="<?php echo $email;?>"
                                                required>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <input type="text" class="form-control" name="tip_sangre" value="<?php echo $tip_sangre;?>" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="fech_ingreso" value="<?php echo $fech_ingreso;?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">

                                        <select name="rol" id="" class="form-control">
                                            <?php 
                                                foreach ($roles_datos as $rol_dato) {
                                                    $idrol=$rol_dato['id_rol'];
                                                    $rol_tb=$rol_dato['nombre_rol'];?>
                                                <option value="<?php echo $idrol;?>" <?php if ($rol_tb==$rol){?>selected="selected"<?php }?> 
                                                
                                                ><?php echo $rol_tb?></option>
                                            <?php  
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="password" class="form-control" name="pswd"
                                                placeholder="Contraseña" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="password" class="form-control" name="pswd2"
                                                placeholder="Repetir Contraseña" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="ced" value="<?php echo $cedula;?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="form-group">
                                    <a href="listarUsuarios.php" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success"
                                        name="btnRegistrar">Actualizar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
</div>

<!-- /.content-wrapper -->
<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/inferior.php'); ?>