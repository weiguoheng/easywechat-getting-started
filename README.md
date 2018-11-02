# easywechat-getting-started

easywechat在thinkphp和laravel的入门   
laravel中默认的自带有csrf验证，所以需要在app/Http/Middleware/VerifyCsrfToken.php中添加上微信后台的配置信息的路径即可   
tp5中没有csrf验证，路由配置正确即可，参考serverController控制器就行
