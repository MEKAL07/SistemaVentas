@extends('layout.template')
@section('CuerpoInterno')
	<table style="border: 1px solid #428bca;border-collapse: collapse;margin: 20px;">
		<thead style="background-color: #428bca;">

			<tr>
				<th>ID</th>
				<th>Nombre Appellidos</th>
				<th>Tipo de Documento</th>				
				<th>N° de Documento</th>	
				<th>Dirección</th>						
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($listapersona as $item)
				<tr>
					<td>{{$item->idpersona}}</td>
					<td>{{$item->nombreap}}</td>
					<td>{{$item->tipo_documento}}</td>
					<td>{{$item->num_documento}}</td>
					<td>{{$item->direccion}}</td>
					<!--td>{{$item->telefono}}</td>
					<td>{{$item->sexo}}</td>
					<td>{{$item->fechaRegistro}}</td-->
					<td>
						<input type="button" name="btnEditar" value="EDITAR" onclick="editarCliente({{$item->idpersona}})">
						<input type="button" name="btnEliminar" value="ELIMINAR" onclick="eliminarCliente({{$item->idpersona}})">
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<script type="text/javascript">
		function editarCliente(idpersona)
		{
			window.location.href='{{url('persona/editar')}}/'+idpersona;
		}
		function eliminarCliente(idpersona)
		{
			if(confirm('eliminar registro'))
			{
				window.location.href='{{url('persona/eliminar')}}/'+idpersona;
			}
		}
	</script>
@endsection