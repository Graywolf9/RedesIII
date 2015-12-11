<?php require 'conexion.php'; ?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<META charset="utf8" />
		<TITLE>Coordinación LTIN</TITLE>
		<LINK REL="stylesheet" HREF="estilo.css" TYPE="text/css" />
		<!-- Negritas -->
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <!-- Normal -->
        <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
        <!-- Divertido -->
        <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
        <SCRIPT TYPE="text/javascript">
        	document.write("\
        		<STYLE>\
        			BODY {\
        				width: "+(window.innerWidth-(window.innerWidth*.02))+"px;\
        				height: "+(window.innerHeight-(window.innerHeight*.02))+"px;\
        			}\
        		</STYLE>\
        	");
        </SCRIPT>
	</HEAD>
	<BODY>
		<DIV id="encabezado">
			<SCRIPT TYPE="text/javascript">
				var dispositivo = navigator.userAgent.toLowerCase();
				var mobil = false;
			    if (dispositivo.search(/iphone|ipod|ipad|android/) > -1) mobil = true;
			    if (mobil){
			    	document.getElementById('p').style.display = "none";
			    	document.getElementById('m'.style.display = "block";
			    }
	            function mostrar(){
	                //document.getElementById("menu3").style.display = "block";
	                alert("1");
	            }
			</SCRIPT>
			<DIV id="p">
				<UL id="menu">
		    		<LI onmouseover="document.getElementById('pmenu3').style.display = 'block'" onmouseout="document.getElementById('pmenu3').style.display = 'none'">
		    			<A id="menu2" HREF="#">Menu</A>
		    			<UL id="pmenu3" style="display: none">
		    				<LI><A HREF="alumnos.php">Alumnos</A></LI>
		    				<LI><A HREF="estatus.php">Estatus</A></LI>
		    				<LI><A HREF="semestre.php">Semestre</A></LI>
		                    <LI><A HREF="modalidad.php">Modalidad</A></LI>
		    			</UL>
		    		</LI>
		    		<LI><A HREF="contacto.php">Contacto</A></LI>
		    		<LI><A HREF="coordinacion.php">Coordinación</A></LI>
		    	</UL>
		    </DIV>
		    <DIV id="m" style="display: none">
		    	<UL><LI><IMG alter="menu" src="">
			    	<UL id="menu">
			    		<LI>
			    			<A id="menu2" HREF="#">Menu</A>
			    			<UL id="mmenu3" style="display: none">
			    				<LI><A HREF="alumnos.php">Alumnos</A></LI>
			    				<LI><A HREF="estatus.php">Estatus</A></LI>
			    				<LI><A HREF="semestre.php">Semestre</A></LI>
			                    <LI><A HREF="modalidad.php">Modalidad</A></LI>
			    			</UL>
			    		</LI>
			    		<LI><A HREF="contacto.php">Contacto</A></LI>
			    		<LI><A HREF="coordinacion.php">Coordinación</A></LI>
			    	</UL>
		    	</LI></UL>
		    </DIV>
		</DIV>
