> HiPHP1.0的运行环境要求PHP7.1+。

## 安装

~~~
composer create-project KenRitchie/hiphp hp
~~~

* 指定版本安装
~~~
composer create-project KenRitchie/hiphp=v1.0.0 hp
~~~

* nginx
~~~
server{
	listen       80;
	server_name localhost;
	index index.html index.php;
	
	root D:/desktopback/hp;
	client_max_body_size 256m;
	
	location / {
	   try_files $uri @rewrite;
	 }
	location @rewrite {
	   set $static 0;
	   if  ($uri ~ \.(css|js|jpg|jpeg|png|gif|ico|woff|eot|svg|css\.map|min\.map)$) {
		 set $static 1;
	   } 
	   if ($static = 0) {
		 rewrite ^/(.*)$ /index.php?s=/$1;
	   }

	}
	location ~ .php$ {
	  try_files $uri =404;
	  include D:/phpStudy/PHPTutorial/nginx/conf/fastcgi.conf;
	  fastcgi_pass 127.0.0.1:9000;
	}
	
}


~~~
* 访问127.0.0.1

## 用途

* 了解框架的实现
* 小功能的开发，比如秒杀，拼团等
