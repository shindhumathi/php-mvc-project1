<?php
namespace app\core;

trait loggertrait
{
    public function log($msg)
    {
        echo "[ LOG ] : ".date("Y-m-d H:i:s")."--$msg<br>";
    }
}
?>