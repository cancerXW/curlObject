<?php
/**
 * curl 封装
 */

namespace lib;

class NetWorkRequest
{
    private $url;   //请求地址
    private $header;    //请求头
    private $content;   //请求内容(需要发送的数据)
    private $handle;    //curl句柄
    private $errMsg;    //异常信息

    /**
     * NetWorkRequest constructor.
     * @param string $url 请求地址
     * @throws \ErrorException URL异常
     */
    public function __construct($url)
    {
        $this->handle = curl_init($url);
    }

    /**
     * @param string $url
     * @throws \ErrorException URL异常
     */
    public function setUrl($url)
    {
        $this->url = $url;
        curl_setopt($this->handle, CURLOPT_URL, $url);
    }

    /**
     * @param string|array $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }


    /**
     * @param string|array $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * 发送请求
     * @return bool
     */
    public function send()
    {
        $r = curl_exec($this->handle);
        if (!$r) {
            $this->errMsg = curl_error($this->handle);
            return false;
        }
        return $this->errMsg;
    }

    /**
     * 获取错误信息
     * @return string 错误信息
     */
    public function getErrMsg()
    {
        return $this->errMsg;
    }


}