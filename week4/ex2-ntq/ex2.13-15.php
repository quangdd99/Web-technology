<?php
class Hello {
    function sayHello(){
        return 'Hello World';
    }
}

class GoodBye extends Hello {
    function sayGoobye(){
        return 'Goodbye World!';
    }
}

$msg = new GoodBye();
echo $msg->sayHello() . '<br/>';
echo $msg->sayGoobye() . '<br/>';

?>