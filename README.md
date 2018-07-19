# A Easy Laravel Package for ServerChan

See [Server酱](http://sc.ftqq.com/3.version)

## Quick Start Guide

- Create a Laravel 5.5 project: `composer create-project laravel/laravel myproject dev-develop`

- `cd myproject`

- Add dependency: `composer require sevenshi/serverchan`

- Copy configuration: `php artisan vendor:publish`

- set the SCKEY you get from the serverchan on the .env `SCKEY=SCU17044T7eafa406fxxxxxxxxxx`

Now you are ready to use the Seven Facade, e.g. open routes/web.php:


- send message to yourself 

``` PHP
<?php

Route::get('seven',function (){
    Seven::setTitle('hi')->setMessage('hello world')->push();
});

```

- send message to who subscribe your channel

the channel comes from the [PushBear](http://pushbear.ftqq.com/admin/#/),and channel key comes from the channel you create 

``` PHP
<?php

Route::get('seven',function (){
    Seven::setTitle('hi')->setMessage('hello every body')->setChannel('4794-e28b9dae54e86365773xxx')->pushbear();
});

```

- response


if the request is ok,it will response these data below:

push:

    - success {"errno":0,"errmsg":"success","dataset":"done"}
    
pushbear:
    
    - {"code":0,"message":"","data":"1\u6761\u6d88\u606f\u5df2\u6210\u529f\u63a8\u9001\u5230\u53d1\u9001\u961f\u5217","created":"2018-07-18 14:43:05"}
    

