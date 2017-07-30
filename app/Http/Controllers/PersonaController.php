<?php

	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Session\SessionManager;
	use App\Model\TPersona;
	use DB;
	
	 class PersonaController extends Controller
	 {
	 	
	 	public function actionRegistrar(Request $request,SessionManager $sessionManager)
	 	{
	 		if($_POST)
	 		{
	 			try
	 			{
	 				DB::beginTransaction();
	 				//validacion 
	 				/*$tpersonaemail=TPersona::whereRaw('email=?',[trim($request->input('emailCorreo'))])->first();
	 				$tpersonadni=TPersona::whereRaw('idpersona=?',[trim($request->input('txtidpersona'))])->first();
	 				if($tpersonaemail!=null or $tpersonadni!=null  )
	 				{
	 					$sessionManager->flash('mensaje','Dato en uso');
                		$sessionManager->flash('color',env('COLOR_ERROR'));
                		return redirect('/persona/registrar');
	 				}*/
	 				$tpersona=new TPersona();
	 				  
		              $tpersona->nombreap=$request->input('txtNombre');
		              //$tpersona->apellido=$request->input('txtApellido');
		              $tpersona->tipo_documento=$request->input('listDoc');
		              $tpersona->num_documento=$request->input('txtNumpersona');
		              $tpersona->direccion=$request->input('txtDireccion');		              
		              /*$tpersona->fechaRegistro=date('Y-m-d H:m:s');
		              $tpersona->fechaModificacion=date('Y-m-d H:m:s');*/

		              $tpersona->save();
		              DB::commit();
		              $sessionManager->flash('mensajeGeneral','persona registrado correctamente');
              		  $sessionManager->flash('color',env('COLOR_CORRECTO'));
	 			}
	 			catch (\Exception $ex)
	 			{
	 				DB::rollback();
	 				$sessionManager->flash('mensajeGeneral','persona no registrado');
                    $sessionManager->flash('color',env('COLOR_ERROR'));
	 			}
	 			return redirect('/persona/registrar');
	 		}
	 		return view('persona/registrar');
	 	}
	 	/*lista de personas*/
		public function actionVer()
		{
		 	$listapersona=TPersona::all();
		 	return view('persona/ver',['listapersona'=>$listapersona]);
		}
		/*editar persona*/
		public function actionEditar(Request $request,$idpersona=null,SessionManager $sessionManager)
		{
			if($_POST)
	 		{
				try
	 			{
	 				DB::beginTransaction();
	 				//validacion 
	 				$tpersonaemail=TPersona::whereRaw('idpersona!=?',[$request->input('hdidpersona')])->first();
	 				/*if($tpersonaemail!=null)
	 				{
	 					$sessionManager->flash('mensaje','Correo electronico en uso');
                		$sessionManager->flash('color',env('COLOR_ERROR'));
                		return redirect('/persona/editar/'.$request->input('hdidpersona'));
	 				}*/
	 				$tpersona=TPersona::find($request->input('hdidpersona'));
		              $tpersona->nombreap=$request->input('txtNombre');		            
		              //$tpersona->apellido=$request->input('txtApellido');
		              $tpersona->tipo_documento=$request->input('listDoc');
		              $tpersona->num_documento=$request->input('txtNumpersona');
		              $tpersona->direccion=$request->input('txtDireccion');	
		              /*$tpersona->sexo=$request->input('listSexo');
		              $tpersona->fechaModificacion=date('Y-m-d H:m:s');*/

		              $tpersona->save();
		              DB::commit();
		              $sessionManager->flash('mensajeGeneral','Datos de persona actualizado correctamente');
              		  $sessionManager->flash('color',env('COLOR_CORRECTO'));
	 			}
	 			catch (\Exception $ex)
	 			{
	 				DB::rollback();
	 				$sessionManager->flash('mensajeGeneral','Error al actualizar datos de persona ');
                    $sessionManager->flash('color',env('COLOR_ERROR'));
	 			}
	 			return redirect('/persona/ver');
		 	}
	 		$tpersonas=TPersona::find($idpersona);//se usa cuando es por id
	        if($tpersonas==null)
	        {
	          return redirect('/persona/ver');
	        }
	 		return view('persona/editar',['tpersona'=>$tpersonas]);
		}
		/*eliminar*/
	 	public function actionEliminar($idpersona)
	    {
	        $tpersona=TPersona::find($idpersona);
	 
	        if($tpersona!=null)
	        {
	          $tpersona->delete();
	        }
	        return redirect('/persona/ver');
	    }
	    /*public function actionBuscar(Request $request)
	    {  	
	    	
	        return view('persona/buscar');
	    }
	    public function actionListar(Request $request)
	    {
	    	
    		$idpersona=Tpersona::whereRaw('idpersona=?',[$request->input('personadni')])->get();

    		return view('persona/listar',['bpersona'=>$idpersona]);
	    	
	    }*/
	} 
 ?>