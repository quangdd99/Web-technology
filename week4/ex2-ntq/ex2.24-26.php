<?php
    class Message {
        var $message;
        function setMessage($message){
            $this->message = $message;
        }

        function getMessage(){
            return $this->message;
        }
    }

    class PoliteMessage extends Message {
        function PoliteMessage(){
            $this->setMessage('How are you today?');
        }
    }

    class TerseMessage extends Message {
        function TerseMessage (){
            $this->setMessage('Howzit?');
        }
    }

    class RudeMessage extends Message {
        function RudeMessage() {
            $this->setMessage('You look like *%&* today!');
        }
    }

    class MessageReader {
        var $messages;
        function MessageReader($messages) {
            $this->messages = $messages;
            $this->readMessage();
        }

        function readMessage(){
            foreach ($this->messages as $message) {
                echo $message->getMessage() . '<br>';
            }
        }
    }

    $className = array('PoliteMessage', 'TerseMessage', 'RudeMessage');
    $messages = array();
    srand((float)microtime()*1000000); //prepare random shuffer
    for($i = 0; $i < 10; $i++) {
        shuffle($className);
        $messages[] = new $className[0]();
    }

    $messagesReader = new MessageReader($messages);
?>