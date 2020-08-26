<?php
use think\facade\Db;
use DuckPhp\DuckPhp;
require_once('../vendor/autoload.php');

$options=[];
$options['override_class']='';      // 示例文件，不要被子类干扰。
$options['skip_setting_file']=true; // 示例文件，不需要配置文件。
DuckPhp::RunQuickly($options,function(){
    Db::setConfig([
        'default'     => 'mysql',
        'connections' => [
            'mysql'     => [
                'type'     => 'mysql',
                'hostname' => '127.0.0.1',
                'username' => 'root',
                'password' => '123456',
                'database' => 'DnSample',
            ]
        ]
    ]);
    //就这句话了
    DuckPhp::G()->setDBHandler(function(){return Db::class;});
    $sql="select * from Users where true limit 1";
    $data=DuckPhp::DB()::query($sql);
    var_dump($data);
});
