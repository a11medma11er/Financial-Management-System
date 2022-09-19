<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Products;
use App\Models\Sections;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(auth()->check())
        {
            $Sections = Sections::all();
            $Products = Products::all();
            $Invoices = Invoices::all();
            return view('index', compact('Sections', 'Products', 'Invoices'));
        }
        else
        {
            return redirect('/login');
        }
    }
}
