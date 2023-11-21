### 用途

- 了解框架的实现


### 安装
> HiPHP1.0的运行环境要求PHP7.1+。
~~~
composer create-project liburdi/hiphp hp
~~~

* 指定版本安装
~~~
composer create-project liburdi/hiphp=v1.0.0 hp
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


