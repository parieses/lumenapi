<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

//use Illuminate\Routing\Controller;
class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function store(Request $request)
    {
        $name = $request->all();
//        return $name;
        DB::table('user')->insert(['id'=>rand(1,999999)]);
        return 111111111111111;
        //
    }

    //
}
