<?php

namespace Suntao\RobotApi;

class DingTalk
{
    public string $remote_server;

    public function __construct($access_token)
    {
        $this->remote_server = 'https://oapi.dingtalk.com/robot/send?access_token=' . $access_token;
    }

    public function sendText(string $message)
    {
        $data = [
            'msgtype' => 'text',
            'text' => [
                'content' => $message,
            ]
        ];
        return $this->request_by_curl($this->remote_server, json_encode($data));
    }

    public function sendLink($title, $text, $message_url, $picUrl = '')
    {
        $data = [
            'msgtype' => 'link',
            'link' => [
                'title' => $title,
                'text' => $text,
                'messageUrl' => $message_url,
                'picUrl' => $picUrl,
            ]
        ];
        return $this->request_by_curl($this->remote_server, json_encode($data));
    }

    /**
     * @param string $remote_server
     * @param string $post_string
     * @return bool|string
     */
    private function request_by_curl(string $remote_server, string $post_string) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $remote_server);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/json;charset=utf-8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 线下环境不用开启curl证书验证, 未调通情况可尝试添加该代码
        // curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data, true);
        if ($data['errcode'] != 0) {
            return false;
        }
        return true;
    }
}