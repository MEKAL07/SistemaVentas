<?php

	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Session\SessionManager;
	use App\Model\TCategoria;
	use DB;
	
	 class CategoriaController extends Controller
	 {
	 	
	 	public function actionRegistrar(Request $request,SessionManager $sessionManager)
	 	{
	 		if($_POST)
	 		{
	 			try
	 			{
	 				DB::beginTransaction();
	 				//validacion 
	 				/*$tcategoriaemail=Tcategoria::whereRaw('email=?',[trim($request->input('emailCorreo'))])->first();
	 				$tcategoriadni=Tcategoria::whereRaw('idcategoria=?',[trim($request->input('txtidcategoria'))])->first();
	 				if($tcategoriaemail!=null or $tcategoriadni!=null  )
	 				{
	 					$sessionManager->flash('mensaje','Dato en uso');
                		$sessionManager->flash('color',env('COLOR_ERROR'));
                		return redirect('/categoria/registrar');
	 				}*/
	 				$tcategoria=new TCategoria();
	 				  
		              $tcategoria->nombre=$request->input('txtNombre');
		              //$tcategoria->apellido=$request->input('txtApellido');
		              $tcategoria->descripcion=$request->input('txtDescripcion');
		              $tcategoria->condicion=$request->input('cheCondicion');
		              	              
		              /*$tcategoria->fechaRegistro=date('Y-m-d H:m:s');
		              $tcategoria->fechaModificacion=date('Y-m-d H:m:s');*/

		              $tcategoria->save();
		              DB::commit();
		              $sessionManager->flash('mensajeGeneral','categoria registrado correctamente');
              		  $sessionManager->flash('color',env('COLOR_CORRECTO'));
	 			}
	 			catch (\Exception $ex)
	 			{
	 				DB::rollback();
	 				$sessionManager->flash('mensajeGeneral','categoria no registrado');
                    $sessionManager->flash('color',env('COLOR_ERROR'));
	 			}
	 			return redirect('/categoria/registrar');
	 		}
	 		return view('categoria/registrar');
	 	}
	 	/*lista de categorias*/
		public function actionVer()
		{
		 	$listacategoria=TCategoria::all();
		 	return view('categoria/ver',['listacategoria'=>$listacategoria]);
		}
		/*editar categoria*/
		public function actionEditar(Request $request,$idcategoria=null,SessionManager $sessionManager)
		{
			if($_POST)
	 		{
				try
	 			{
	 				DB::beginTransaction();
	 				//validacion 
	 				$tcategoriaemail=TCategoria::whereRaw('idcategoria!=?',[$request->input('hdidcategoria')])->first();
	 				/*if($tcategoriaemail!=null)
	 				{
	 					$sessionManager->flash('mensaje','Correo electronico en uso');
                		$sessionManager->flash('color',env('COLOR_ERROR'));
                		return redirect('/categoria/editar/'.$request->input('hdidcategoria'));
	 				}*/
	 				$tcategoria=TCategoria::find($request->input('hdidcategoria'));
		              $tcategoria->nombre=$request->input('txtNombre');
		              //$tcategoria->apellido=$request->input('txtApellido');
		              $tcategoria->descripcion=$request->input('txtDescripcion');
		              $tcategoria->condicion=$request->input('cheCondicion');
		              	
		              /*$tcategoria->sexo=$request->input('listSexo');
		              $tcategoria->fechaModificacion=date('Y-m-d H:m:s');*/

		              $tcategoria->save();
		              DB::commit();
		              $sessionManager->flash('mensajeGeneral','Datos de categoria actualizado correctamente');
              		  $sessionManager->flash('color',env('COLOR_CORRECTO'));
	 			}
	 			catch (\Exception $ex)
	 			{
	 				DB::rollback();
	 				$sessionManager->flash('mensajeGeneral','Error al actualizar datos de categoria ');
                    $sessionManager->flash('color',env('COLOR_ERROR'));
	 			}
	 			return redirect('/categoria/ver');
		 	}
	 		$tcategorias=TCategoria::find($idcategoria);//se usa cuando es por id
	        if($tcategorias==null)
	        {
	          return redirect('/categoria/ver');
	        }
	 		return view('categoria/editar',['tcategoria'=>$tcategorias]);
		}
		/*eliminar*/
	 	public function actionEliminar($idcategoria)
	    {
	        $tcategoria=TCategoria::find($idcategoria);
	 
	        if($tcategoria!=null)
	        {
	          $tcategoria->delete();
	        }
	        return redirect('/categoria/ver');
	    }
	    /*public function actionBuscar(Request $request)
	    {  	
	    	
	        return view('categoria/buscar');
	    }
	    public function actionListar(Request $request)
	    {
	    	
    		$idcategoria=Tcategoria::whereRaw('idcategoria=?',[$request->input('categoriadni')])->get();

    		return view('categoria/listar',['bcategoria'=>$idcategoria]);
	    	
	    }*/
	} 
 ?>