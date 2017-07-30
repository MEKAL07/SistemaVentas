@extends('layout.template')
@section('CuerpoInterno')
	<h1>REGISTRO DE CLIENTE</h1>
	
	<form id="frmEditar" action="{{url('persona/editar')}}" method="post">
		<table class="table">
			
			<tr>
				<td class="td"><label class="laveltext" for="txtNombre">Nombre y Apellidos</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtNombre" name="txtNombre" placeholder="Nombre cliente" value="{{$tpersona->nombreap}}" onkeypress="return soloLetras(event)"></td></tr>

			<tr>
				<td class="td"> <br><label class="laveltext" for="listDoc">Tipo de Documento </label></td>
			</tr>
			<tr><td class="td"><select class="inputtext" name="listDoc" id="listDoc" value="{{$tpersona->tipo_documento}}">
						<option>DNI</option>
						<option>RUC</option>
					</select>					
			</td></tr>

			<tr>
				<td class="td"><br><label class="laveltext" for="txtNumpersona">Número de documento <span id="spanMensaje">
					@if(Session::has('mensaje'))
						<script>
							$('#spanMensaje').html('{{Session::get('mensaje')}}');
							$('#spanMensaje').css({'color':'{{Session::get('color')}}'});
						</script>
					@endif
				</span></label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" name="txtNumpersona" id="txtNumpersona" maxlength="8" placeholder="DNI cliente" value="{{$tpersona->num_documento}}" onkeypress="return solonumeros(event)"></td></tr>

			<tr>
				<td class="td"><br><label class="laveltext" for="txtDireccion">Dirección</label></td>
			</tr>
			<tr><td><input class="inputtext" type="text" id="txtDireccion" name="txtDireccion" value="{{$tpersona->direccion}}"></td></tr>

			<!--tr>
				<td class="td"><label class="laveltext" for="txtApellido">Apellidos</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtApellido" name="txtApellido" placeholder="Apellido paterno y materno cliente" onkeypress="return soloLetras(event)"></td></tr>

			

			<tr>
				<td class="td"><label class="laveltext" for="emailCorreo">Correo electronico <span id="spanMensaje">
					@if(Session::has('mensaje'))
						<script>
							$('#spanMensaje').html('{{Session::get('mensaje')}}');
							$('#spanMensaje').css({'color':'{{Session::get('color')}}'});
						</script>
					@endif
				</span></label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="email" id="emailCorreo" name="emailCorreo" placeholder="Correo electronico" onkeypress="return validar_email( email )"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtTelefono" solonumeros(event)>Telfono</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtTelefono" name="txtTelefono" placeholder="Telefono cliente" maxlength="9"  onkeypress="return solonumeros(event)"></td></tr-->

			

			<tr><td class="td"><label class="laveltext" id="labelMensajeGeneral">
					@if(Session::has('mensajeGeneral'))
						<script>
							$('#labelMensajeGeneral').html('{{Session::get('mensajeGeneral')}}');
							$('#labelMensajeGeneral').css({'color':'{{Session::get('color')}}'});
						</script>
					@endif
				</label></td>
			</tr>
			{{csrf_field()}}
			<tr><td class="td">
				<input type="hidden" id="hdidpersona" name="hdidpersona" value="{{$tpersona->idpersona}}">
				<input class="inputbutton" type="button" value="Guardar cambios" onclick="enviarFrmEditar();">
			</td></tr>
		</table>
		
	</form>
	<script type="text/javascript">
		function enviarFrmEditar()
		{
			if(confirm('Confirmar actualizacion de datos'))
			{
				$('#frmEditar').submit();
			}
		}
	</script>
@endsection