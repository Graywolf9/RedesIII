<?php require 'header.php'; ?>
		<DIV id="alumnos">
			<H2>Alumnos</H2>
			<?php
				if (isset($_POST['resultado'])){
					$variable = $_POST["busqueda"];
					$resultado = mysqli_query($db, "SELECT * FROM alumno WHERE Nombre LIKE '%$variable%' OR Codigo LIKE '$variable%' OR Ingreso LIKE '$variable'") or die(mysqli_error($db));
					echo "Se encontraron ".count($resultado)." alumnos</DIV>";
					echo "<TABLE border=1>";
					echo "<TD>Código</TD><TD>Nombre</TD><TD>Estatus</TD><TD>Créditos</TD><TD>Semestre</TD><TD>Modalidad</TD><TD>Correo</TD><TD>Telefono</TD><TD>Ingreso</TD><TD>Egreso</TD><TD>Carrera</TD>";
					for ($x=0;$x<count($resultado);$x++){
						$row = mysqli_fetch_array($resultado, MYSQLI_BOTH);
						echo "<TR><FORM action='alumnos.php' method=post>";
							echo "<TD><INPUT TYPE=text NAME='Codigo' VALUE='".$row["Codigo"]."' /></TD>";
							echo "<TD><INPUT TYPE=text NAME='Nombre' VALUE='".$row["Nombre"]."' /></TD>";
							echo "<TD>".$row["Estatus"]."</TD>";
							echo "<TD><INPUT TYPE=text NAME='Creditos' VALUE='".$row["Creditos"]."' /></TD>";
							echo"<td><INPUT TYPE=text NAME='Semestre' VALUE='".$row["Semestre"]."' /></TD>";
							echo"<td><INPUT TYPE=text NAME='Modalidad' VALUE='".$row["Modalidad"]."' /></TD>";
							echo"<td><INPUT TYPE=text NAME='Correo' VALUE='".$row["Correo"]."' /></TD>";
							echo"<td><INPUT TYPE=text NAME='Telefono' VALUE='".$row["Telefono"]."' /></TD>";
							echo"<td><INPUT TYPE=text NAME='Ingreso' VALUE='".$row["Ingreso"]."' /></TD>";
							echo"<td><INPUT TYPE=text NAME='Egreso' VALUE='".$row["Egreso"]."' /></TD>";
							echo"<td><INPUT TYPE=text NAME='Carrera' VALUE='".$row["Carrera"]."' /></TD>";
							echo "<TD><INPUT TYPE=submit VALUE='Guardar' NAME='guardar' /></TD>";
	    					echo "</FORM>";
	    					echo "<FORM action='alumnos.php' method=post>";
	    					echo "<INPUT TYPE=hidden NAME='Codigo' VALUE='".$row["Codigo"]."' />";
	    					echo "<TD><INPUT TYPE=submit VALUE='Eliminar' NAME='eliminar' /></TD>";
						echo "</FORM></TR>";
					}
					echo "</TABLE>";
				} else if (isset($_POST['guardar'])) {
					$estatus = $_POST["Estatus"];
					$codigo = $_POST["Codigo"];
					$nombre = $_POST["Nombre"];
					$creditos = $_POST["Creditos"];
					$semestre = $_POST["Semestre"];
					$modalidad = $_POST["Modalidad"];
					$Correo = $_POST["Correo"];
					$Telefono = $_POST["Telefono"];
					$Ingreso = $_POST["Ingreso"];
					$Egreso = $_POST["Egreso"];
					$Carrera = $_POST["Carrera"];

					$resultado = mysqli_query($db, "UPDATE alumno SET Estatus='$estatus', Codigo=$codigo, Nombre='$nombre', Creditos='$creditos', Semestre='$semestre',Modalidad='$modalidad',Correo='$Correo',Telefono='$Telefono',Ingreso='$Ingreso',Egreso='$Egreso',Carrera='$Carrera' WHERE Codigo=$codigo") or die(mysqli_error($db));
					?><script type="text/javascript">
						alert("Alumno actualizado con exito");
						document.location.href = ".";
					</script><?php
				} else if (isset($_POST['eliminar'])){
					$codigo = $_POST["Codigo"];
					?><script type="text/javascript">
					    var resp = confirm('Seguro que deseas eliminar este registro');
					    if (resp){
					        document.location.href = "alumnos.php?Codigo=<?php echo $codigo ?>";
					    }
					</script><?php
				} else if (isset($_GET["Codigo"])){
					$codigo = $_GET["Codigo"];
				    $resultado = mysqli_query($db, "DELETE FROM alumno WHERE Codigo=$codigo") or die(mysqli_error($db));
					?><script type="text/javascript">
						alert("Alumno eliminado con exito");
						document.location.href = ".";
					</script><?php
				} else if (isset($_POST['nuevo'])){
					$codigo = $_POST["Codigo"];
					$nombre = $_POST["Nombre"];
					$ingreso = $_POST["Ingreso"];
					$resultado = mysqli_query($db, "INSERT INTO alumno (Codigo, Nombre, Ingreso) VALUES ($codigo, '$nombre', '$ingreso')") or die(mysqli_error($db));
					?><script type="text/javascript">
						alert("Alumno actualizado con exito");
						document.location.href = ".";
					</script><?php
				} else {?>
					<FORM action="alumnos.php" method=post>
						Introduce tu busqueda: <INPUT NAME="busqueda" TYPE=text id="busqueda"><br/>
						<INPUT TYPE=submit NAME="resultado">
					</FORM>
					<H2>Agregar alumno</H2>
					<FORM action="alumnos.php" method=post>
						Código: <INPUT TYPE=number NAME="Codigo" /><br/>
						Nombre: <INPUT TYPE=text NAME="Nombre" /><br/>
						Ingreso: <INPUT TYPE=date NAME="Ingreso" /><br/>
						<INPUT TYPE=submit VALUE="Agregar" NAME="nuevo" />
					</FORM></DIV>
				<?php }
			?>
<?php require 'footer.php'; ?>