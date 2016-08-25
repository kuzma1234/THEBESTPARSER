<?php
namespace app\models;
use linslin\yii2\curl\Curl;
abstract class Parse {
    /**
     * Curl
     * @var linslin\yii2\curl\Curl
     */
    protected $client;
    protected $keyword;
    public function __construct($keyword) {
        $this->keyword = $keyword;
        $this->client = new Curl();
        $this->client->setOptions([
            CURLOPT_PROXY => '178.151.149.227',
            CURLOPT_PROXYPORT => '80',
            CURLOPT_ENCODING => 'UTF-8',
            CURLOPT_FOLLOWLOCATION =>  TRUE,
            CURLOPT_PROXYTYPE => CURLPROXY_HTTP,
            CURLOPT_TIMEOUT => null,
            CURLOPT_CONNECTTIMEOUT => null
        ]);
    }
    public function getPage($first = null) {
        return $this->client->get($this->getUrl($first));
    }
    public function getTotal($page) {
        preg_match_all($this->totalRegex, $page, $result);
        preg_match_all('/[0-9]/s', html_entity_decode($result[1][0], null, 'UTF-8'), $output);
        return (int)implode($output[0]);
    }
    public function Result() {
        $page = $this->getPage();
        $total = $this->getTotal($page);
        echo 'all_resuts - '.$total."\n";
        if ($total>0) {
            $this->parsePage($page);
            for ($i = $this->first; $i <= $total; $i += 10 ) {
                $this->parsePage($this->getPage($i), round($i, -1));
            }
        } 
    }
    public function parsePage($page, $first = 0) {
        $result = [];
        preg_match_all($this->urlRegex, $page, $urls);
        foreach ($urls[1] as $url) {
            $first++;
            echo implode( [
                $first ,
                parse_url($url)['host'],
                $url
            ], ', ')."\n";
        }
    }
    public function getUrl($first = null) {
        $url = $this->url.urlencode($this->keyword);
        if ($first != null) {
            $url .= $this->start.urlencode($first);
        }
        return $url;
    }
}
