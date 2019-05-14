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
//use App\Models\User;
class SecurityMiddleware
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
        // 判断是否为后台 Amdin 模块
//        if(!$request->is('admin/*')) {
//            return $next($request);
//        }
        $token = $request->header('token');
        if (!$token){
//            return ['code','asas'];
        }
//        var_dump($token);
        // 获取登陆用户信息
        if ($token ==12){
            return redirect('/');
        }
//        $user = User::find($uid);
        // 判断是否为管理员身份
//        if(!$user->administrator) {
//            // 非管理员无法访问 Admin 模块
//            return redirect('/');
//        }
        return $next($request);
    }
}
