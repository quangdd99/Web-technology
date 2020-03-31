<?php
class Hello {
    function getMessage(){
        return 'Hello World';
    }
}

class GoodBye extends Hello {
    function getMessage(){
        return 'Goodbye World!';
    }
}

$hello = new Hello();
echo $hello->getMessage() . '<br>';

$goodbye = new GoodBye();
echo $goodbye->getMessage() . '<br>';

?>