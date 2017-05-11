<?php
echo '<div id="sidebar-wrapper">
            <ul class="sidebar-nav">
            <div align="center" class="visible-xs"><a href="#menu-toggle" class="btn btn-info menu-toggle">Cerrar Menú</a></div>
                <li class="sidebar-brand">
                    <a href="#">
                       <span class="icon-home"></span>&nbsp;BIENVENIDO
                    </a>
                </li>
                
                <li>
                    
                    <a href="index.php?pais='.$_GET["pais"].'"" title="Bienvenido a Eurobet"><span class="icon-checkmark2"></span>&nbsp;Inicio</a>
                </li>
                
                <li>
                    <a href="#" title="Registro de datos para creación de cuentas" data-toggle="modal" data-target="#modalRegistro"><span class="icon-user-tie"></span>&nbsp;Regístrate</a>
                </li>
                
                <li>
                    <a href="competiciones.php?pais='.$_GET["pais"].'"  title="Líneas del día"><span class="icon-file-text2"></span>&nbsp;Logros / Líneas</a>
                </li>
                
                
                <li>
                    <a href="reglas-de-juego.html?pais='.$_GET["pais"].'"" target="_blank"  title="Conoce nuestras políticas y términos de prestación de Servicio"><span class="icon-library"></span>&nbsp;Reglas</a>
                            
                </li>
                <li>
                    <a href="ayuda.html?pais='.$_GET["pais"].'"" target="_blank" title="¿Necesitas ayuda? , Comunícate con nosotros"><span class="icon-bullhorn"></span>&nbsp;¿Cómo Apostar?</a>
                </li>
                <li>
                    <a href="juego-responsable.html?pais='.$_GET["pais"].'"" target="_blank" title="Juego Responsable"><span class="icon-hammer2"></span>&nbsp;Responsabilidad</a>
                </li>
                <li>
                    <a href="formulario_contacto.html?pais='.$_GET["pais"].'"" target="_blank" title="PQR - Peticiones, Quejas y Reclamos"><span class="icon-pushpin"></span>&nbsp;Contáctenos</a>
                </li>
                <li>
                    <a href="descargas.html" target="_blank" title="Descarga de Software para taquillas"><span class="icon-download"></span>&nbsp;Descargas</a>
                </li>
                <li>
                    <a href="http://www.mismarcadores.com" target="_blank" title="Resultados de Deportes en Vivo"><span class="icon-file-text2"></span>&nbsp;Resultados</a>
                </li>
                
                
                
            </ul>
        </div>'
?>