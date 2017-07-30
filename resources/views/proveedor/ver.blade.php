@extends('layout.template')
@section('CuerpoInterno')
	<table style="border: 1px solid #428bca;border-collapse: collapse;margin: 20px;">
		<thead style="background-color: #428bca;">

			<tr>
				<th>idProveedor</th>
				<th>Nombre</th>
				<th>RUC</th>				
				<th>Ubicacion</th>	
				<th>Dirección</th>
				<th>Cuenta</th>						
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($listaproveedor as $item)
				<tr>
					<td>{{$item->idproveedor}}</td>
					<td>{{$item->nombre_proveedor}}</td>
					<td>{{$item->ruc_proveedor}}</td>
					<td>{{$item->ubicacion_proveedor}}</td>
					<td>{{$item->direccion_proveedor}}</td>
					<td>{{$item->nro_cuenta}}</td>
					<!--td>{{$item->telefono}}</td>
					<td>{{$item->sexo}}</td>
					<td>{{$item->fechaRegistro}}</td-->
					<td>
						<input type="button" name="btnEditar" value="EDITAR" onclick="editarCliente({{$item->idproveedor}})">
						<input type="button" name="btnEliminar" value="ELIMINAR" onclick="eliminarCliente({{$item->idproveedor}})">
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<script type="text/javascript">
		function editarCliente(idproveedor)
		{
			window.location.href='{{url('proveedor/editar')}}/'+idproveedor;
		}
		function eliminarCliente(idproveedor)
		{
			if(confirm('eliminar registro'))
			{
				window.location.href='{{url('proveedor/eliminar')}}/'+idproveedor;
			}
		}
	</script>
@endsection