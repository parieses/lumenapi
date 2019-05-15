<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public function boot(Request $request)
    {
        $url = $request->url();
        $param = json_encode($request->all());
        $token = $request->input('token');
        $source  = $request->input('source');

        $uuid = 12;//get_uid($token, $source);
        $bdid = 12;//get_bd_uid($token, $source);
        $uid = $uuid ? $uuid : $bdid ? $bdid : 0;
        $logData = [
            'uid' => $uid,  //判断用户的uid，需要根据自己的业务判断
            'router' => $url,  //请求的url
            'created_at' => date('Y-m-d H:i:s'),
            'current_ip' => $request->ip(), //IP地址
            'params' =>  $param //请求的参数
        ];
        //listen db
        DB::listen(function ($query) use ($logData) {
            $tmp = str_replace('?', '"' . '%s' . '"', $query->sql);
            $tmp = @vsprintf($tmp, $query->bindings);
            $tmp = str_replace("\\", "", $tmp);
            Log::channel("sql")->info(' execution time: ' . $query->time . 'ms; ' . $tmp . "\t");
            $action = substr($tmp, 0, 6);
            $patt = strpos($tmp,'admin_logs');
            //如果是更新删除操作则存储到数据库里
            if ($action == 'update' || $action == 'delete' || $action == 'insert' && !$patt ) {
                $actionModel = DB::table('admin_logs');
                $logData['sql'] = $tmp;
                $actionModel->insert($logData);
            }
        });
    }
}
