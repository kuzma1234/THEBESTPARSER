<?php
namespace app\models;
class ParseYahoo extends Parse {
    public $url = 'https://search.yahoo.com/search?p=';
    public $start = '&b=';
    public $urlRegex = '/ac-algo ac-21th lh-24" href="(.*)"/Us';
    public $totalRegex = '/<\/a><span.*>(.*)results<\/span>/Us';
    public $first = 11;
}