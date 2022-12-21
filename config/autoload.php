<?php
function autoloadFunction($class) {
    if (preg_match('/Controller$/', $class)) {
        require("controllers/" . $class . ".php");
    }else {
        require("models/" . $class . ".php");
    }
}
// Registers the callback
spl_autoload_register("autoloadFunction");
?>