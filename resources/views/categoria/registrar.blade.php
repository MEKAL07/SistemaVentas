@extends('layout.template')
@section('CuerpoInterno')
	<h1>REGISTRO DE CLIENTE</h1>
	
	<form id="frmRigistrar" action="{{url('categoria/registrar')}}" method="post">
		<table class="table">
			
			<tr>
				<td class="td"><label class="laveltext" for="txtNombre">Nombre Categoria</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtNombre" name="txtNombre" placeholder="Nombre Categoria" ></td></tr>			
			

			<tr>
				<td class="td"><label class="laveltext" for="txtDescripcion">Descripcion</label></td>
			</tr>
			<tr><td class="td"><input class="inputarea"  id="txtDescripcion" name="txtDescripcion" placeholder="Descripcion" ></td></tr>

			<tr>
				<td class="td"><label class="laveltext" for="cheCondicion">Condicion</label></td>
			</tr>
			<tr><td class="td"><select class="inputtext" name="cheCondicion" id="cheCondicion" >
						<option>1</option>
						<option>2</option>
					</select>					
			</td></tr>			

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
			<tr><td class="td"><input class="inputbutton" type="button" value="Registrar cliente" onclick="enviarFrmRegistrar();"></td></tr>
		</table>
		
	</form>
	<script type="text/javascript">
		function enviarFrmRegistrar()
		{
			if(confirm('Confirmar registro'))
			{
				$('#frmRigistrar').submit();
			}
		}
	</script>
@endsection