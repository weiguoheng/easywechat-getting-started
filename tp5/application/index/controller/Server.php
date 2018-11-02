<?php
namespace app\index\controller;

use Config;
use EasyWeChat\Factory;

class Server
{
	protected $app;
	public function __construct()
    {
		$config = [
		    'app_id' => Config::get('appid'),
		    'secret' => Config::get('appsecret'),
		    'token' => Config::get('token'),
		    // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
		    'response_type' => 'array',
		];

		$this->app = Factory::officialAccount($config);
    }

    public function index()
    {
        $app = $this->app;

        $app->server->push(function ($message) {
		    switch ($message['MsgType']) {
		        case 'event':
		            return '收到事件消息';
		            break;
		        case 'text':
		            return '收到文字消息';
		            break;
		        case 'image':
		            return '收到图片消息';
		            break;
		        case 'voice':
		            return '收到语音消息';
		            break;
		        case 'video':
		            return '收到视频消息';
		            break;
		        case 'location':
		            return '收到坐标消息';
		            break;
		        case 'link':
		            return '收到链接消息';
		            break;
		        case 'file':
		            return '收到文件消息';
		        // ... 其它消息
		        default:
		            return '收到其它消息';
		            break;
		    }
		});
		
        $response = $app->server->serve();
		// $response 为 `Symfony\Component\HttpFoundation\Response` 实例
		// 对于需要直接输出响应的框架，或者原生 PHP 环境下
		$response->send();
    }

    public function hello($name = 'ThinkPHP5')
    {
        echo heleo.$name;
    }
}
