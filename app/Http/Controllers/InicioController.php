<?php

	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;

	 class InicioController extends Controller
	 {
	 	
	 	public function actionInicio()
	 	{
	 		return view('index/inicio');
	 	}
	 } 
 ?>