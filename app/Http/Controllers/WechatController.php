<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WechatController extends Controller
{
    public function index(){
        //原样输出echostr即可
        $echostr=$_GET['echostr'];
        if(!empty($echostr)){
            echo $echostr;die;
            echo '12345';die;
        }
        //文档接收普通消息
        //接入完成后，微信公众号内用户任何操作 微信服务器=》POST格式 xml形式 发送到配置的url上
        $xml=file_get_contents("php://input"); //接收原始的xml数据或json数据流

        //写文件里
        file_put_contents("log.txt","\n".$xml."\n",FILE_APPEND);
        //xml转成对象
        $xmlObj=simplexml_load_string($xml);
    }
}
