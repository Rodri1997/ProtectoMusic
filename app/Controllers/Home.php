<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
               
		return view('bienvenida');
	}

	//--------------------------------------------------------------------
 	
	public function inicio(){
	
	//echo "Esta es la funcion de Inicio";

	return view("welcome_message");
	}

	
}
