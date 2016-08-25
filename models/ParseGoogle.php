<?php
namespace app\models;
class ParseGoogle extends Parse {
    public $url = 'https://www.google.com/search?q=';
    public $start = '&start=';
    public $urlRegex = '/<h3 class="r"><a href="\/url\?q=(.*)"/Us';
    public $totalRegex = '/id="resultStats">(.*)<\/div>/Us';
    public $first = 10;
    public function getPage($first = NULL) {
        return iconv("windows-1251","utf-8", parent::getPage($first));
    }
}