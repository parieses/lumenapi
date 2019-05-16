<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

//use Illuminate\Routing\Controller;
class ExampleController extends Controller
{
    /**
     * @api {get} /articles/:id 根据单个id获取文章信息
     * @apiName 根据id获取文章信息
     * @apiGroup Articles
     *
     * @apiParam (params) {String} id       文章id
     *
     * @apiSuccess {Array} article 返回相应id的文章信息
     *
     * @apiSuccessExample Success-Response:
     *    HTTP/1.1 200 OK
     *      {
     *        "tile": "文章标题2",
     *        "date": 1483941498230,
     *        "author": "classlfz",
     *        "content": "文章的详细内容"
     *       }
     * @apiError (Error 4xx) 404 对应id的文章信息不存在
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 对应id的文章信息不存在
     *     {
     *       "error": err
     *     }
     */
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
