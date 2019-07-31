# php-docker

docker-compose php + nginx + mysql

> ①使用前请先确保安装docker以及docker-compose;([自行检索](https://cn.bing.com)或者[使用官方请参考：https://docs.docker.com/](https://docs.docker.com/))
> 
> ②检查命令`docker --version`、`docker-compose --version`,无报错，即可;

## 1.git clone本项目到本地


`git clone git@github.com:zhangxx19940204/php_docker.git php_docker`

> `php_docker` 为用户自定义目录，可以是任意名称,也可以为空，自带文件目录

## 2.启动容器

```linux
cd php_docker
docker-compose up -d 
```
> 进入到环境目录，同时运行起来环境（默认以后台模式启动【`-d`】）

## 3.查看容器状态
```linux
docker ps -a
```
> mysql `Restarting (1) 1 second ago`启动出错，查看可用 `docker logs [CONTAINER ID]`[mysql的容器ID]

>本项目中，mysql的数据未上传，太大，可以自己复制即可，在当前目录下，进行复制
```linux
cd php_docker

docker run -d --rm --name tmp_mysql -e MYSQL_ROOT_PASSWORD=123456  mysql:5.7

docker cp tmp_mysql:/var/lib/mysql/. .\mysql\data\
```
>首先进入到环境目录下，然后创建一个临时mysql容器，然后将mysql基础配置文件，复制到项目中，接下来关闭、重启即可

```linux
docker-compose down
docker stop $(docker ps -aq)
docker-compose up -d
```
> `docker-compose down`停止并删除相关的容器，`docker stop $(docker ps -aq)`停止所有的容器，上面我们使用的临时容器，停止即删除，所以也已删除，接下来就可以重新启动了，迄今为止，环境已正常运行

## 4.获取mysql的IP地址

```linux
docker inspect [containerID] | grep IPAddress
```
或者
```linux
docker inspect [containerID]
```
> 然后 `IPAddress`这个值，上个命令，windows下，好像不能用

>获取IP后，将IP替换`./html/index.php`文件中的mysql的IP即可

## 5.综合

> 需要修改的，应该就是`docker-compose.yaml`文件中的mysql版本和密码、nginx指向的域名








