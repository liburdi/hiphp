### 前言

日常开发中，会发现有些项目不用框架反而效率更高、性能更好。

这是为什么呢？

框架的依赖过多，生命周期长。

常见的开源框架哪怕再小，其实对于某些场景而言也是非常重的。

类似秒杀、消息中心等场景，或者是根据业务边界把单体项目拆分出来的微服务，反而是越接近原生越好。

### 用途

- 了解框架的实现
- 高性能小场景的项目开发，比如秒杀，拼团等
- 让开发者专注于代码实现、架构设计


### 安装
> HiPHP1.0的运行环境要求PHP7.1+。
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
        default_type text/html;
        charset utf-8;
        root /wwwroot/hiphp;
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
         fastcgi_pass   127.0.0.1:9000;
         fastcgi_index  index.php;
         fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
         include        fastcgi_params;
        }

}


~~~
* 访问127.0.0.1


