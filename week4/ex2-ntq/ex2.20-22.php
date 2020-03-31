<?php
    class StandardHeader {
        
        var $header = '';
        
        function StandardHeader($title){
            $html = <<<EOD
                <html>
                <head>
                    <title>$title</title>
                </head>
                <body>
                    <h1>$title</h1>
            EOD;
            $this->setHeader($html);
        }

        function setHeader($string){
            if(!empty($this->header)){
                $this->header .=$string;
            }    
            else {
                $this->header = $string;
            }
        }

        function getHeader(){
            return $this->header;
        }
    }

    // subclass
    class CategoryHeader extends StandardHeader {
        function CategoryHeader($category, $baseURL){
            parent::StandardHeader($category);
            $html = <<<EOD
                <p><a href="$baseURL>Home</a>
                <a href="$baseURL?category">$category</a></p>
            EOD;
            $this->setHeader($html);
        }
    }

    $baseURL = '/';
    $categories = array('PHP', 'MySQL', 'CSS');

    if(isset($GET['category']) && in_array($GET['category'], $categories)) {
        $header = new CategoryHeader($GET[category], $baseURL);
    } else {
        $header = new StandardHeader('Home');
    }

    echo $header->getHeader();
 ?>   
    <h2>Categories</h2>
    <p><a href="<?php echo $baseURL ?>?category = PHP">PHP</a></p>
    <p><a href="<?php echo $baseURL ?>?category = MySQL">MySQL</a></p>
    <p><a href="<?php echo $baseURL ?>?category = CSS">CSS</a></p>
</body>
</html>
