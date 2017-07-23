<?php
/**
 * Created by PhpStorm.
 * User: ahmedalsammarraie
 * Date: 7/19/17
 * Time: 10:40 PM
 */

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;

class HipchatNotification
{

    private $url;
    private $options = array(
        'color' => 'green',
        'message' => 'My first notification (yey)',
        'notify' => true,
        'message_format' => 'text',
        'from' => 'Toolbox Brown Sugar',
    );

    public function __construct()
    {
        $url = env('HIPCHAT_URL');
        $token = env('HIPCHAT_TOKEN');
        $this->url = $url . '?auth_token=' . $token;
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