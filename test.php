<?php

function post($url, $data, $cookie, $save_cookie = 100, $use_cookie = 200) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    if ($save_cookie == 100)
        curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie);
    if ($use_cookie == 100)
        curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie);
    $a = curl_exec($curl);
    curl_close($curl);
    return $a;
}

function uplang($cookie) {
    echo '请输入签名：';
    $upqianmingurl = 'http://www.acfun.tv/member/signSubmit.aspx';
    $lang['sign'] = trim(fgets(STDIN));
    $save_lang_status = post($upqianmingurl, $lang, $cookie, 200, 100);
    $status = json_decode($save_lang_status, true);
    if ($status) {
        echo '修改成功，退出，2.0正在做';
        exit();
    }
}

function echolang($lang) {
    echo $lang;
}

$authurl = 'http://passport.acfun.tv/login.aspx';
echolang('请输入用户名：');
$data['username'] = trim(fgets(STDIN));
echolang('请输入密码：');
$data['password'] = trim(fgets(STDIN));
$cookie = dirname(__FILE__) . '/acfun.cookie';
$auth_status = post($authurl, $data, $cookie, 100);
if ($auth_status) {
    $auth_status = json_decode($auth_status, true);
    if ($auth_status['success']) {
        echolang('请输入选项目前只有签名：\n 1.签名');
        $input = trim(fgets(STDIN));
        switch ($input) {
            case 1:
                echolang('正在进行修改今天签名');
                uplang($cookie);
                break;

            default:
                echolang('不要乱输入拉。。第二期在说把');
                exit();
                break;
        }
    }
}