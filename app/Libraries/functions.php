<?php

if (!function_exists('photoMPwd')) {
    /**
     * 定义password加密方式
     * @param $pwd 原始密码
     * @return string
     */
    function photoMPwd($pwd){
        return bcrypt($pwd);
    }
}


if(!function_exists('curlPost')){
    /**
     * post数据到指定url
     * @param $url 地址
     * @param $params 数据数组
     * @param int $max_time 最大执行时间(秒)
     * @return mixed
     */
    function curlPost($url, $params, $max_time = 10, $header = array()){
        $protocol = substr(ltrim($url), 0, 5) == "https" ? 'https' : 'http';
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        if($header){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch,CURLOPT_TIMEOUT,$max_time);
        //设置curl默认访问为IPv4
        if(defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')){
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        }
        if ('https' == strtolower($protocol)) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}

if(!function_exists('curlPostJson')){
    /**
     * post数据到指定url并json_decode成数组
     * @param string $url 地址
     * @param array $params 数据数组
     * @param int $max_time 最大执行时间(秒)
     * @return array|mixed
     */
    function curlPostJson($url, $params, $max_time = 10){
        $json_str = json_encode($params);
        $header = array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($json_str)
        );
        $result = curlPost($url, $json_str, $max_time, $header);
        return json_decode($result, true);
    }
}

if(!function_exists('curlGet')){
    /**
     * 发起get请求到指定url
     * @param $url
     * @param int $max_time
     * @param array $params 数据数组,自动组合到url中
     * @return mixed
     */
    function curlGet($url, $max_time = 10, $params = array()){
        $protocol = substr(ltrim($url), 0, 5) == "https" ? 'https' : 'http';
        if($params && is_array($params)){
            $params_str = http_build_query($params);
            $connect = strpos($url, '?') ? '&' : '?';
            $url .= $connect . $params_str;
        }
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_TIMEOUT,$max_time);
        //设置curl默认访问为IPv4
        if(defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')){
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        }
        if ('https' == strtolower($protocol)) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}

if(!function_exists('curlGetJson')){
    /**
     * 发起get请求到指定url并json_decode成数组
     * @param $url
     * @param int $max_time
     * @param array $params 数据数组,自动组合到url中
     * @return array|mixed
     */
    function curlGetJson($url, $max_time = 10, $params = array()){
        $result = curlGet($url, $max_time, $params);
        return json_decode($result, true);
    }
}

if(!function_exists('getIP')){
    /**
     * 获取ip地址
     * @return string
     */
    function getIP(){
        if(array_key_exists('HTTP_CLIENT_IP', $_SERVER)){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }elseif(array_key_exists('REMOTE_ADDR', $_SERVER)){
            $ip = $_SERVER['REMOTE_ADDR'];
        }else{
            $ip = '';
        }
        return $ip;
    }
}

/**
* @param code 错误代码
* @param isback 是否需要跳回上一页
*/
if(!function_exists('getReturnMsg')){
    function getReturnMsg($code,$isback = 0){
        // 错误 或者需要返回给前端的
        if($code < 0 ){
            $msg=[
                '-1' => '参数错误',
                '-2' => '没有数据',
                '-3' => '发布失败',
                '-4' => '暂时只能评论一次哦',
                '-5' => '太快了，休息一下',
                '-6' => '请选择文件'
            ];
            if($isback){
                return back()->withErrors(['error'=> $msg[$code]],'store');
            }
            flash($msg[$code])->error()->important();
        }elseif($code > 0){
            $msg=[
                '1' => '发布成功',
            ];
            if($isback){
                return back()->withErrors(['error'=> $msg[$code]],'store');
            }
            flash($msg[$code])->success();
        }

        return $msg[$code];
    }
}

/**
* 防止sql注入字符转义 XSS攻击
*return array|string
* 
*/
if(!function_exists('escapeString')){
    function escapeString($content) {
        $pattern = "/(select[\s])|(insert[\s])|(update[\s])|(delete[\s])|(from[\s])|(where[\s])|(drop[\s])/i";
        if (is_array($content)) {
            foreach ($content as $key=>$value) {
                $content[$key] = htmlspecialchars(trim($value));
                if(!get_magic_quotes_gpc()) $content[$key] = addslashes($content[$key]);
                if(preg_match($pattern,$content[$key])) {
                    $content[$key] = '';
                }
            }
        } else {
            $content = htmlspecialchars(trim($content));
            if(!get_magic_quotes_gpc()) $content = addslashes($content);
            if(preg_match($pattern,$content)) {
                $content = '';
            }
        }
        return $content;
    }
}