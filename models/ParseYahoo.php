<?php
namespace app\models;
class ParseYahoo extends Parse {
    public $url = 'https://search.yahoo.com/search?p=';
    public $start = '&b=';
    public $urlRegex = '/ac-algo ac-21th lh-24" href="(.*)"/Us';
    public $totalRegex = '/<\/a><span.*>(.*)results<\/span>/Us';
    public $first = 11;
    public function getPage($first = NULL) {
        $res = parent::getPage($first);//iconv("windows-1251","utf-8", parent::getPage($first));
        file_put_contents('/Applications/MAMP/htdocs/parser/google.html', $res);
        return $res;
    }
}