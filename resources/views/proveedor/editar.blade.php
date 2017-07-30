@extends('layout.template')
@section('CuerpoInterno')
	<h1>REGISTRO DE CLIENTE</h1>
	
	<form id="frmEditar" action="{{url('proveedor/editar')}}" method="post">
		<table class="table">
			
			<tr>
				<td class="td"><label class="laveltext" for="txtNombre">Nombre Proveedor</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtNombre" name="txtNombre" placeholder="Nombre cliente" value="{{$tproveedor->nombre_proveedor}}" onkeypress="return soloLetras(event)"></td></tr>

			<tr>
				<td class="td"><br><label class="laveltext" for="txtRuc">RUC <span id="spanMensaje">
					@if(Session::has('mensaje'))
						<script>
							$('#spanMensaje').html('{{Session::get('mensaje')}}');
							$('#spanMensaje').css({'color':'{{Session::get('color')}}'});
						</script>
					@endif
				</span></label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" name="txtRuc" id="txtRuc" maxlength="10" placeholder="DNI cliente" value="{{$tproveedor->ruc_proveedor}}" onkeypress="return solonumeros(event)"></td></tr>

			<tr>
				<td class="td"><label class="laveltext" for="txtUbicacion">Ubicacion</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtUbicacion" name="txtUbicacion" placeholder="Nombre cliente" value="{{$tproveedor->ubicacion_proveedor}}" onkeypress="return soloLetras(event)"></td></tr>

			<tr>
				<td class="td"><br><label class="laveltext" for="txtDireccion">Dirección</label></td>
			</tr>
			<tr><td><input class="inputtext" type="text" id="txtDireccion" name="txtDireccion" value="{{$tproveedor->direccion_proveedor}}" ></td></tr>


			<tr>
				<td class="td"><br><label class="laveltext" for="txtCuenta">Número de Cuenta <span id="spanMensaje">
					@if(Session::has('mensaje'))
						<script>
							$('#spanMensaje').html('{{Session::get('mensaje')}}');
							$('#spanMensaje').css({'color':'{{Session::get('color')}}'});
						</script>
					@endif
				</span></label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" name="txtCuenta" id="txtCuenta" maxlength="15"  value="{{$tproveedor->nro_cuenta}}" onkeypress="return solonumeros(event)"></td></tr>

			

			

			

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
				<input type="hidden" id="hdidproveedor" name="hdidproveedor" value="{{$tproveedor->idproveedor}}">
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