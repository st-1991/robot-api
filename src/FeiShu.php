<?php
/**
 * Author: SunTao
 * DATE:2023/10/23
 */

namespace Suntao\RobotApi;

class FeiShu
{
    private $remote_server = 'https://open.feishu.cn/open-apis/bot/v2/hook/';

    public function __construct(string $access_token)
    {
        $this->remote_server .= $access_token;
    }

    /**
     * 发送文本消息
     * @param string $text
     * @return bool
     */
    public function sendText(string $text)
    {
        $body = [
            'msg_type' => 'text',
            'content' => [
                'text' => $text,
            ],
        ];
        $res = $this->_request(json_encode($body));
        if ($res['code'] != 0) {
            return false;
        }
        return true;
    }

    public function sendCard(array $header, array $elements)
    {
        $body = [
            'msg_type' => 'interactive',
            'card' => [
                'header' => $header,
                'elements' =>$elements,
            ],
        ];
        $res = $this->_request(json_encode($body));
        if ($res['code'] != 0) {
            return false;
        }
        return true;
    }

    private function _request(string $post_string) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->remote_server);
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
        return json_decode($data, true);
    }
}