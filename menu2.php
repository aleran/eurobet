<?php
	echo '<div id="sidebar-wrapper" class="">
            <ul class="sidebar-nav">
            <div align="center" class="visible-xs"><a href="#menu-toggle" class="btn btn-info menu-toggle">Cerrar Menú</a></div>';

                if(isset($_SESSION["tipo"])){
                    echo '<li class="sidebar-brand">
                        <a href="#">
                           <span class="icon-home"></span>&nbsp;Sesion Iniciada
                        </a>
                    </li>';
                }

                else {
                    echo '<li class="sidebar-brand">
                        <a href="#">
                           <span class="icon-home"></span>&nbsp;BIENVENIDO
                        </a>
                    </li>';
                }
                echo '<li>
                    
                    <a href="bienvenido.php" title="Bienvenido a Eurobet"><span class="icon-checkmark2"></span>&nbsp;Inicio</a>
                </li>';
                if(isset($_SESSION["tipo"])){
                    if ($_SESSION["tipo"]=="root") {

                    echo '<li>
                    <a href="#" title="crear usuarios" data-toggle="modal" data-target="#modalUsuarios"><span class="icon-user-tie"></span>&nbsp;Crear Usuarios</a>
                    </li>
                
                    <li>
                        <a href="consultas.php" title="Consulta de Tickets Activos"><span class="icon-file-text2"></span>&nbsp;Tickets</a>
                    </li>';
                    
                    }
                }
                
                
                if(isset($_SESSION["tipo"])){
                    echo '<li>
                        <a href="competiciones.php" title="Apuesta"><span class="icon-coin-dollar"></span>&nbsp;Apostar</a>
                    </li>';
                }
                else {

                     echo '<li>
                        <a href="competiciones.php" target="_blank" title="Líneas del día"><span class="icon-file-text2"></span>&nbsp;Logros / Líneas</a>';

                }
                
                
                
                echo '<li>
                    <a href="reglas-de-juego.html" target="_blank"  title="Conoce nuestras políticas y términos de prestación de Servicio"><span class="icon-library"></span>&nbsp;Reglas</a>
                            
                </li>
                <li>
                    <a href="ayuda.html" target="_blank" title="¿Necesitas ayuda? , Comunícate con nosotros"><span class="icon-bullhorn"></span>&nbsp;¿Cómo Apostar?</a>
                </li>
                <li>
                    <a href="juego-responsable.html" target="_blank" title="Juego Responsable"><span class="icon-hammer2"></span>&nbsp;Responsabilidad</a>
                </li>
                <li>
                    <a href="formulario_contacto.html" target="_blank" title="PQR - Peticiones, Quejas y Reclamos"><span class="icon-pushpin"></span>&nbsp;Contáctenos</a>
                </li>
                <li>
                    <a href="descargas.html" target="_blank" title="Descarga de Software para taquillas"><span class="icon-download"></span>&nbsp;Descargas</a>
                </li>
                
                <li>
                    <a href="registro.html" target="_blank" title="Descarga de Software para taquillas"><span class="icon-file-text2"></span>&nbsp;Informes</a>
                </li>
                
            </ul>
        </div>';
?>