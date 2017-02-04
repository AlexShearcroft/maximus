<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Auth;

use Illuminate\Http\Request;
use Carbon\Carbon;
//use Request;

class DashboardController extends Controller {

    
    public function __construct()
    {
        
    }
    
    
    /**
     * Dashboard
     *
     * @return Response
     */
	public function index() 
    {
        
        return view('admin.dashboard');
    }

}
