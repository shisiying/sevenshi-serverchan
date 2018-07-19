<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/7/18
 * Time: 9:58
 */

namespace Sevenshi\Serverchan;


class SevenService
{
    private $sckey;

    private $text;

    private $desp;

    private $channel;

    public function __construct($sckey) {
        $this->sckey = $sckey;
    }

    public function setTitle($text){
        $this->text = $text;
        return $this;
    }

    public function setMessage($desp)
    {
        $this->desp = $desp;
        return $this;
    }

    public function setChannel($channel)
    {
        $this->channel = $channel;
        return $this;
    }


    public function push()
    {
        $postdata = http_build_query(
            array(
                'text' => $this->text,
                'desp' => $this->desp
            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        $context  = stream_context_create($opts);

        return $result = file_get_contents('https://sc.ftqq.com/'.$this->sckey.'.send', false, $context);
    }

    public function pushbear()
    {
        $postdata = http_build_query(
            array(
                'text' => $this->text,
                'desp' => $this->desp,
                'sendkey'=>$this->channel
            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        $context  = stream_context_create($opts);

        return $result = file_get_contents('https://pushbear.ftqq.com/sub', false, $context);
    }
}

