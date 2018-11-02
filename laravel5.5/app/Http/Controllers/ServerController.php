<?php
	namespace App\Http\Controllers;

	use EasyWeChat\Factory;

	class ServerController extends Controller{
		protected $app;
		function __construct(){
			$config = [
			    'app_id' => 'wxe73a7444c2c229e6',
			    'secret' => '98cfe4d16b741874d87ec58d7d4a7717',
			    'token'  =>  'heng',
			    // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
			    'response_type' => 'array',
			];

			$this->app = Factory::officialAccount($config);
		}
		public function index(){
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

			// 在 laravel 中：
			$response = $app->server->serve();

			// 而 laravel 中直接返回即可：

			return $response;
		}
	}
?>