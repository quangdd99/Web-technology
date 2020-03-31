<?php
class Hello {
    function getMessage(){
        return 'Hello World';
    }
}

class GoodBye extends Hello {
    function getMessage(){
    //    $parentMsg = Hello::getMessage();
       $parentMsg = parent::getMessage();
       return $parentMsg . '<br> Goodbye World!';
    }
}

$goodbye = new GoodBye();
echo $goodbye->getMessage() . '<br>';

?>