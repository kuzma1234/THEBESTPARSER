<?php
namespace app\models;
class ParseBing extends Parse {
    public $url = 'http://www.bing.com/search?q=';
    public $start = '&first=';
    public $urlRegex = '/class="b_algo">.*<h2><a href="(.*)"/Us';
    public $totalRegex = '/class="sb_count">(.*)<\/span>/Us';
    public $first = 11;
}
