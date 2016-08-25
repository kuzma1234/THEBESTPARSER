<?php
namespace app\commands;
use yii\console\Controller;
//use app\models\ParseGoogle;

class SearchController extends Controller {
    private $parser = 'app\models\Parse';
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world') {
        echo $message . "\n";
    }
    /**
     * This command echoes what you have entered as the message.
     * @param string $keyword the message to be echoed.
     */
    public function actionResult($parser= 'Google', $keyword = 'hello world') {
        echo "begin\n";
        $this->parser .= $parser;
        if (class_exists($this->parser)) {
            $p = new $this->parser($keyword);
            //$p->getPage();
            $p->Result();
        } else {
            echo "Parser not found\n";
        }
        echo "end\n";
    }
}
