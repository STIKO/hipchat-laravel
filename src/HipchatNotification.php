<?php
/**
 * Created by PhpStorm.
 * User: ahmedalsammarraie
 * Date: 7/19/17
 * Time: 10:40 PM
 */

namespace HipchatNotification;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;

class HipchatNotification
{

    private $url;
    private $options = array();

    public function __construct()
    {
        $url = config('hipchat.rul');
        $token = config('hipchat.token');
        $this->url = $url . '?auth_token=' . $token;
        $this->options['color'] = env('hipchat.color');
        $this->options['message'] = env('hipchat.message');
        $this->options['notify'] = env('hipchat.notify');
        $this->options['message_format'] = env('hipchat.message_format');
    }

    public function message($message)
    {
        $this->options['message'] = $message;
    }

    public function messageFormat($format)
    {
        $this->options['message_format'] = $format;
    }

    public function color($color)
    {
        $this->options['color'] = $color;
    }

    public function notify($bool)
    {
        $this->options['notify'] = $bool;
    }

    public function options($options)
    {
        $this->options = $options;
    }

    public function send()
    {
        $headers = ['Content-Type: application/json'];
        return $this->callUrlPost($this->url, $headers, $this->options);
    }

    private function callUrlPost($url, $headers, $content)
    {
        if (is_array($content)) {
            $content = json_encode($content);
        }
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
}