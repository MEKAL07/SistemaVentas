@extends('layout.template')
@section('CuerpoInterno')
	<h1>REGISTRO DE CLIENTE</h1>
	
	<form id="frmEditar" action="{{url('categoria/editar')}}" method="post">
		<table class="table">
			
			<tr>
				<td class="td"><label class="laveltext" for="txtNombre">Nombre Categoria</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtNombre" name="txtNombre" value="{{$tcategoria->nombre}}" ></td></tr>			
			

			<tr>
				<td class="td"><label class="laveltext" for="txtDescripcion">Descripcion</label></td>
			</tr>
			<tr><td class="td"><input class="inputarea"  id="txtDescripcion" name="txtDescripcion"  value="{{$tcategoria->descripcion}}"></td></tr>

			<tr>
				<td class="td"><label class="laveltext" for="cheCondicion">Condicion</label></td>
			</tr>
			<tr><td class="td"><select class="inputtext" name="cheCondicion" id="cheCondicion" value="{{$tcategoria->condicion}}">
						<option>1</option>
						<option>2</option>
					</select>					
			</td></tr>			

			<tr><td class="td"><label class="laveltext" id="labelMensajeGeneral"  >
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
				<input type="hidden" id="hdidcategoria" name="hdidcategoria" value="{{$tcategoria->idcategoria}}">
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