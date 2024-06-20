<?php

namespace app\common\vendor;

use yii\console\Controller;
use yii\helpers\Console;

/**
 * Class ConsoleController
 * @package app\common\vendor
 */
class ConsoleController extends Controller
{
    private $startTime;

    public function beforeAction($action):bool
    {
        $this->startTime = microtime(true);
        $this->debug("============================", 'Y', false);
        return true;
    }

    public function debug($string, $color = "n", $newLine = true)
    {
        if ($newLine) {
            echo "\n";
        }
        echo Console::renderColoredString("%{$color}{$string}%n");
        return true;
    }

    public function afterAction($action, $result)
    {
        $time = microtime(true) - $this->startTime;
        $time = number_format($time, 6, '.', '');
        $this->debug("========{$time}=SEC========", 'Y');
        $this->debug("");
        return true;
    }
}