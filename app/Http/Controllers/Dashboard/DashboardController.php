<?php
	
	namespace App\Http\Controllers\Dashboard;
	
	use App\Http\Controllers\Controller;
	use DB;
	
	class DashboardController extends Controller
	{
		public function __construct(){
			// $this->middleware('auth::admin');
		}
		
		public function index(){
			
			return view('dashboard.home');
		}
	}
