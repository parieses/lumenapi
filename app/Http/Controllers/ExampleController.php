<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
    public function store(Request $request,Response $response)
    {
        $name = $request->all();
//        return $name;
        var_dump(31);
        $a = DB::table('user')->select('id')->get();
        $data = $response->setContent('qw');
        var_dump(41);
        return $data;
        //
    }

    //
}
