<?php require 'header.php'; ?>
		<DIV id="alumnos">
			<H2>Estatus</H2>
			<?php
				if (isset($_POST['resultado'])){
					$variable = $_POST["busqueda"];
					$resultado = mysqli_query($db, "SELECT * FROM alumno WHERE Nombre LIKE '%$variable%' OR Codigo LIKE '$variable%' OR Ingreso LIKE '$variable'") or die(mysqli_error($db));
					echo "Se encontraron ".count($resultado)." alumnos";
					echo "<TABLE border=1>";
					echo "<TD>Código</TD><TD>Nombre</TD><TD>Estatus</TD><TD>Créditos</TD>";
					for ($x=0;$x<count($resultado);$x++){
						$row = mysqli_fetch_array($resultado, MYSQLI_BOTH);
						echo "<TR><FORM action='estatus.php' method=post>";
							echo "<TD>".$row["Codigo"]."</TD>";
							echo "<INPUT TYPE=hidden NAME='Codigo' VALUE='".$row["Codigo"]."' />";
							echo "<TD>".$row["Nombre"]."</TD>";
							echo "<TD>".$row["Estatus"]."</TD>";
							echo "<TD>".$row["Creditos"]."</TD>";
							echo "<TD><SELECT NAME='Estatus'>";
							echo "<OPTION VALUE=''>Selecciona un estatus</OPTION>";
								$res = mysqli_query($db, "SELECT * FROM status");
								while($row1 = mysqli_fetch_array($res, MYSQLI_BOTH)){
									echo "<OPTION VALUE='".$row1["Estatus"]."'>".$row1["Estatus"]."</OPTION>";
								}
							echo "</SELECT></TD>";
							echo "<TD><INPUT TYPE=submit NAME='guardar' /></TD>";
						echo "</FORM><TR>";
					}
					echo "</TABLE>";
				} else if (isset($_POST['guardar'])) {
					$estatus = $_POST["Estatus"];
					$codigo = $_POST["Codigo"];
					$resultado = mysqli_query($db, "UPDATE alumno SET Estatus='$estatus' WHERE Codigo=$codigo") or die(mysqli_error($db));
					?><script type="text/javascript">
						alert("Alumno actualizado con exito");
						document.location.href = ".";
					</script><?php
				} else {?>
					<FORM action="estatus.php" method=post>
						Introduce tu busqueda: <INPUT NAME="busqueda" TYPE=text id="busqueda"><br/>
						<INPUT TYPE=submit NAME="resultado">
					</FORM>
				<?php }
			?>
		</DIV>
<?php require 'footer.php'; ?>