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
			@foreach ($listacategoria as $item)
				<tr>
					<td>{{$item->idcategoria}}</td>
					<td>{{$item->nombre}}</td>
					<td>{{$item->descripcion}}</td>
					<td>{{$item->condicion}}</td>
					
					<td>
						<input type="button" name="btnEditar" value="EDITAR" onclick="editarCliente({{$item->idcategoria}})">
						<input type="button" name="btnEliminar" value="ELIMINAR" onclick="eliminarCliente({{$item->idcategoria}})">
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<script type="text/javascript">
		function editarCliente(idcategoria)
		{
			window.location.href='{{url('categoria/editar')}}/'+idcategoria;
		}
		function eliminarCliente(idcategoria)
		{
			if(confirm('eliminar registro'))
			{
				window.location.href='{{url('categoria/eliminar')}}/'+idcategoria;
			}
		}
	</script>
@endsection