<?php
session_start();
$nombresui = explode(" ", $_SESSION['nom']);
$apellidosui =  explode(" ", $_SESSION['ape']);
$codigoui = $_SESSION['cod'];
$usurol = $_SESSION['rol'];
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /software/BancaVirtual/public/vista/login.html");
}
if ($usurol == 'admin') {

?>

    <!DOCTYPE html>
    <html class="no-js">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>BANQUITO | Inicio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="../../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../../../css/font-awesome.min.css">
        <link rel="stylesheet" href="../../../css/main.css">
        <link rel="stylesheet" href="../../../css/sl-slide.css">
        <link rel="stylesheet" href="../../../css/img-efect.css">
        <link rel="stylesheet" href="../../../css/accordion.css">
        <link rel="stylesheet" href="../../../css/social.css">
        <link rel="stylesheet" href="../../../css/social.css">
        <script type="text/javascript" src="../controladores/js/validaciones.js"></script>
        <script src="../../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="../../images/ico/icon.png">
        <script src="../../../js/jquery-3.2.1.min.js"></script>
        <!--carousel-->
        <script src="../../../js/jssor.slider-26.1.5.min.js" type="text/javascript"></script>
        <script src="../../../js/funciones.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../js/objetoAjax.js"></script>

        <style>
            .contenedor-slider {
                margin: auto;
                width: 100%;
                position: relative;
                overflow: hidden;
            }

            .slider {
                display: flex;
                width: 400%;
            }

            .slider__section {
                width: 100%;
            }

            .slider__img {
                display: block;
                width: 100%;
                height: 100%;
            }

            .btn-prev,
            .btn-next {
                width: 40px;
                height: 40px;
                background: rgba(255, 255, 255, 0.7);
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                line-height: 40px;
                font-size: 30px;
                font-weight: bold;
                text-align: center;
                border-radius: 50%;
                font-family: monospace;
                cursor: pointer;
            }

            .btn-prev:hover,
            .btn-next:hover {
                background: white;
            }

            .btn-prev {
                left: 5%;
            }

            .btn-next {
                right: 5%;
            }

            .modal-body {
                height: 550px;
            }
        </style>
    </head>

    <body oncontextmenu="return false" style="background-color: #fff">
        <script>
            fbq('track', 'PaginaPrincipal');
        </script>
        <!--Header-->
        <header class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a id="logo" class="pull-left" href="index.html"></a>
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav">
                            <li class="active"><a href="index.php">Lista Usuarios</a></li>
                            <li><a href="crear_empleado.php">Crear Empleado</a></li>
                            <li><a href="../../../config/cerrarSesion.php">Cerrar Sesion</a></li>

                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>


        </header>
        <br>
        <br>
        <br>
        <br>
        <br>
        <section id="services" style="text-align: center">
            <div class="container" style="text-align: justify">
                <div class="center gap">
                    <form id="formulario01" method="POST" enctype="multipart/form-data" action="../../controladores/admin/crear_usuario.php" onsubmit="return validarCamposObligatorios()">
                        <div class=" parte1">
                            <label for="cedula">Cedula</label>
                            <input type="text" id="cedula" name="cedula" value="" />
                            <span id="mensajeCedula" class="error"> </span>
                            <br>
                            <label for="nombres">Nombres</label>
                            <input type="text" id="nombres" name="nombres" value="" onkeyup="valLetras(this)" />
                            <span id="mensajeNombres" class="error"></span>
                            <br>
                            <label for="apellidos">Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" value="" onkeyup="valLetras(this)" />
                            <span id="mensajeApellidos" class="error"></span>
                            <br>
                            <label for="direccion">Dirección</label>
                            <input type="text" id="direccion" name="direccion" value="" />
                            <span id="mensajeDireccion" class="error"></span>
                            <br>
                            <label for="telefono">Teléfono </label>
                            <input type="text" id="telefono" name="telefono" value="" onkeyup="valNumeros(this)" />
                            <span id="mensajeTelefono" class="error"></span>
                            <br>
                            <label for="fecha">Fecha Nacimiento</label>
                            <input type="text" id="fechaNacimiento" name="fechaNacimiento" value="" />
                            <span id="mensajeFechaNacimiento" class="error"></span>
                            <br>
                            <label for="correo">Correo electrónico</label>
                            <input type="text" id="correo" name="correo" value="" />
                            <span id="mensajeCorreo" class="error"></span>
                            <br>
                            <label for="estado">Estado Civil</label>
                            <select name="ecivil">
                                <option>Soltero/a</option>
                                <option>Casado/a</option>
                                <option>Divorciado/a</option>
                                <option>Separado/a</option>
                                <option>Viudo/a</option>
                            </select>
                            <br>
                            <br>
                            <label for="sex">Sexo</label>
                            <select name="sexo">
                                <option>Masculino</option>
                                <option>Femenino</option>
                            </select>
                            <br>
                            <label for="cargo">Cargo</label>
                            <select name="cargo">
                                <option>CAJERO</option>
                                <option>SUPERVISOR POLIZAS</option>
                            </select>
                            <br>

                            <label for="correo">Contraseña</label>
                            <input type="password" id="contrasena" name="contrasena" value="" />
                            <span id="mensajeContrasena" class="error"></span>
                            <br>
                            <input type="submit" id="crear" name="crear" value="Crear Usuario" />
                            <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />

                        </div>
                    </form>
                </div>
            </div>

        </section>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <!--Bottom-->
        <section id="bottom" class="main">
            <!--Container-->
            <div class="container">
                <!--row-fluids-->
                <div class="row-fluid">
                    <!--Contact Form-->
                    <div class="span7">
                        <h4>UBIQUENOS</h4>
                        <ul class="unstyled address">
                            <li>
                                <i class="icon-home"></i><strong>Dirección:</strong> calle turuhuayco y calle vieja<br>
                            </li>
                            <li>
                                <i class="icon-envelope"></i>
                                <strong>Email: </strong> info@banquito.fin.ec
                            </li>
                            <li>
                                <i class="icon-phone"></i>
                                <strong>Teléfono:</strong> 072222836
                            </li>
                            <li>
                                <i class="icon-phone"></i>
                                <strong>Celular:</strong> 0986694444
                            </li>
                        </ul>
                    </div>
                    <!--End Contact Form-->

                </div>
                <!--/row-fluid-->
            </div>
            <!--/container-->
        </section>
        <!--/bottom-->

        <!--Footer-->
        <footer id="footer">
            <div class="container">
                <div class="row-fluid">
                    <div class="span5 cp">
                        &copy; 2019 <a target="_blank" href="#" title="Free Twitter Bootstrap WordPress Themes and HTML templates">BANQUITO</a>. Todos los derechos reservados
                    </div>
                </div>
            </div>
        </footer>
        <!--/Footer-->
        <style>
            input:invalid {
                border-color: red;
            }

            input,
            input:valid {
                border-color: #444;
            }
        </style>



        <style>
            /* jssor slider loading skin spin css */

            .jssorl-009-spin img {
                animation-name: jssorl-009-spin;
                animation-duration: 1.6s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }

            @keyframes jssorl-009-spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }
        </style>
    </body>

    </html>
<?php
} else {
    header("Location: /examen/public/vista/login.html");
}
?>