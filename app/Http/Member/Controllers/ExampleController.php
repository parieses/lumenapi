<?php

namespace App\Http\Member\Controllers;
use Illuminate\Http\Request;
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
        $name = $request->input('name');
        return 12;
        //
    }

    //
}
