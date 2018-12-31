<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Merchandise;
use App\Entities\Category;
use Stripe\Stripe;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Stripe::setApiKey("sk_test_4Mz6xyiUqRLeQLJsoDK89WHE");

        $charges = \Stripe\Charge::all();

        $revenue = 0;


        foreach($charges->data  as $charge){


            $revenue += (int)$charge->amount / 100;

        }



        return view('site.index')
                 ->with('merchandised_count',Merchandise::all()->count())
                 ->with('category_count',Category::all()->count())
                 ->with('revenue_count', $revenue);
    }
}
