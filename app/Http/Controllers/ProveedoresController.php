<?php

	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Session\SessionManager;
	use App\Model\TProveedor;
	use DB;
	
	 class ProveedoresController extends Controller
	 {
	 	
	 	public function actionRegistrar(Request $request,SessionManager $sessionManager)
	 	{
	 		if($_POST)
	 		{
	 			try
	 			{
	 				DB::beginTransaction();
	 				//validacion 
	 				/*$tproveedoremail=Tproveedor::whereRaw('email=?',[trim($request->input('emailCorreo'))])->first();
	 				$tproveedordni=Tproveedor::whereRaw('idproveedor=?',[trim($request->input('txtidproveedor'))])->first();
	 				if($tproveedoremail!=null or $tproveedordni!=null  )
	 				{
	 					$sessionManager->flash('mensaje','Dato en uso');
                		$sessionManager->flash('color',env('COLOR_ERROR'));
                		return redirect('/proveedor/registrar');
	 				}*/
	 				$tproveedor=new TProveedor();
	 				  
		              $tproveedor->nombre_proveedor=$request->input('txtNombre');
		              //$tproveedor->apellido=$request->input('txtApellido');
		              $tproveedor->ruc_proveedor=$request->input('txtRuc');
		              $tproveedor->ubicacion_proveedor=$request->input('txtUbicacion');
		              $tproveedor->direccion_proveedor=$request->input('txtDireccion');	
		              $tproveedor->nro_cuenta=$request->input('txtCuenta');		              
		              /*$tproveedor->fechaRegistro=date('Y-m-d H:m:s');
		              $tproveedor->fechaModificacion=date('Y-m-d H:m:s');*/

		              $tproveedor->save();
		              DB::commit();
		              $sessionManager->flash('mensajeGeneral','proveedor registrado correctamente');
              		  $sessionManager->flash('color',env('COLOR_CORRECTO'));
	 			}
	 			catch (\Exception $ex)
	 			{
	 				DB::rollback();
	 				$sessionManager->flash('mensajeGeneral','proveedor no registrado');
                    $sessionManager->flash('color',env('COLOR_ERROR'));
	 			}
	 			return redirect('/proveedor/registrar');
	 		}
	 		return view('proveedor/registrar');
	 	}
	 	/*lista de proveedors*/
		public function actionVer()
		{
		 	$listaproveedor=TProveedor::all();
		 	return view('proveedor/ver',['listaproveedor'=>$listaproveedor]);
		}
		/*editar proveedor*/
		public function actionEditar(Request $request,$idproveedor=null,SessionManager $sessionManager)
		{
			if($_POST)
	 		{
				try
	 			{
	 				DB::beginTransaction();
	 				//validacion 
	 				$tproveedoremail=TProveedor::whereRaw('idproveedor!=?',[$request->input('hdidproveedor')])->first();
	 				/*if($tproveedoremail!=null)
	 				{
	 					$sessionManager->flash('mensaje','Correo electronico en uso');
                		$sessionManager->flash('color',env('COLOR_ERROR'));
                		return redirect('/proveedor/editar/'.$request->input('hdidproveedor'));
	 				}*/
	 				$tproveedor=TProveedor::find($request->input('hdidproveedor'));
		              $tproveedor->nombre_proveedor=$request->input('txtNombre');
		              //$tproveedor->apellido=$request->input('txtApellido');
		              $tproveedor->ruc_proveedor=$request->input('txtRuc');
		              $tproveedor->ubicacion_proveedor=$request->input('txtUbicacion');
		              $tproveedor->direccion_proveedor=$request->input('txtDireccion');	
		              $tproveedor->nro_cuenta=$request->input('txtCuenta');		
		              /*$tproveedor->sexo=$request->input('listSexo');
		              $tproveedor->fechaModificacion=date('Y-m-d H:m:s');*/

		              $tproveedor->save();
		              DB::commit();
		              $sessionManager->flash('mensajeGeneral','Datos de proveedor actualizado correctamente');
              		  $sessionManager->flash('color',env('COLOR_CORRECTO'));
	 			}
	 			catch (\Exception $ex)
	 			{
	 				DB::rollback();
	 				$sessionManager->flash('mensajeGeneral','Error al actualizar datos de proveedor ');
                    $sessionManager->flash('color',env('COLOR_ERROR'));
	 			}
	 			return redirect('/proveedor/ver');
		 	}
	 		$tproveedors=TProveedor::find($idproveedor);//se usa cuando es por id
	        if($tproveedors==null)
	        {
	          return redirect('/proveedor/ver');
	        }
	 		return view('proveedor/editar',['tproveedor'=>$tproveedors]);
		}
		/*eliminar*/
	 	public function actionEliminar($idproveedor)
	    {
	        $tproveedor=TProveedor::find($idproveedor);
	 
	        if($tproveedor!=null)
	        {
	          $tproveedor->delete();
	        }
	        return redirect('/proveedor/ver');
	    }
	    /*public function actionBuscar(Request $request)
	    {  	
	    	
	        return view('proveedor/buscar');
	    }
	    public function actionListar(Request $request)
	    {
	    	
    		$idproveedor=Tproveedor::whereRaw('idproveedor=?',[$request->input('proveedordni')])->get();

    		return view('proveedor/listar',['bproveedor'=>$idproveedor]);
	    	
	    }*/
	} 
 ?>