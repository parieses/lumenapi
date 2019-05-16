<?php

/**
 * SecurityMiddleware.php
 *
 * 后台模块安全保护中间件
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   lumen
 * @author    W2LE
 * @copyright 2018/5/4
 */
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Log;

//use App\Models\User;
class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//        Log::debug('Request Url: '.$request->url());
//        Log::debug('Request Method: '.$request->method());
//        Log::debug('Request Params: '.json_encode($request->all()));
        var_dump(21);
        return $next($request);
    }
}
