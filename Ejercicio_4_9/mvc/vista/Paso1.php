<html>
<head>
<meta charset="UTF-8">
<title>Trabajando con sesiones</title>
</head>
<body>
<center>
<h2>Trabajando con sesiones</h2>
<TABLE BORDER="1" CELLPADDING="2" CELLSPACING="4">
<TR ALIGN="center" BGCOLOR="yellow">
<TD COLSPAN="2"><B>Información de la Sesión</B></TD>
</TR>
<TR>
<TD BGCOLOR="yellow">ID</TD>
<TD>{{session_id}}</TD>
</TR>
<TR>
<TD BGCOLOR="yellow">Número de accesos</TD>
<TD>{{contador}}</TD>
</TR>
<TR>
<TD BGCOLOR="yellow">Nombre de la cookie de la sesión</TD>
<TD>{{session_name}}</TD>
</TR>
</TABLE>
<BR><PRE><a href="index.php">Actualizar</a> | <a href="index.php?accion=eliminar">Resetear Contador</a></PRE>
<center>
</body>
</html>