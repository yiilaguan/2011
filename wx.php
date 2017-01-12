<?php 
//获取你发过来的数据包。
$postStr = file_get_contetns("php://input") ;
//使用simplexml技术对xml进行解析
libxml_disable_entity_loader(true) ;
// 为了防止xml外部注入。从安全性考虑，只对xml内部实体内容进行解析。
//<xml>解析内容</xml>
$postObj = simplexml_load_string(data) ;
//加载post过来的字符串。
//获取相关参数 解析xml获取的
$fromUsername = $postObj -> FromUserName ;
$toUsername = $postObj -> ToUserName ;
//获取得到的数据
file_put_contents('abc.log', "\r\n\r\n".$postStr,FILE_APPEND) ;

switch ($postObj->MsgType) {
	case 'event':
		if($postObj->Event == 'subscribe'){
			$textTpl = "<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>

			</xml>" ;
			$contentStr = "wanle " ;
			//返回格式。
			$returnStr = sprintf($textTpl,$fromUsername,$toUsername,$time,$msgType,$contentStr) ;
			//返回给用户
			echo $returnStr ;
			
		}
		break;
	
	default:
		# code...
		break;
}