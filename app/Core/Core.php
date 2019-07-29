<?php 

    class Core {
        public function start($getURL){
            
            $action = 'index';

            if(isset($_GET['page'])){
                $page = ucfirst($_GET['page']).'Controller';
            } else {
                $page = 'HomeController';
            }

            if(!class_exists($page)){
                $page = 'ErrorController';
            }

            call_user_func_array(array(new $page, $action), array());
        }
    }
?>