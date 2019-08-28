<?php 
    class Core {
        public function start($getURL){
            if(isset($_GET['page'])){
                $page = ucfirst($_GET['page']).'Controller';
            } else {
                $page = 'HomeController';
            }

            if(!class_exists($page)){
                $page = 'ErrorController';
            }
            if(isset($getURL['method'])){
                switch ($getURL['method'] ) {
                    case 'alter':
                        $action = 'alterData';
                        call_user_func_array(array(new $page, $action), array());        
                        break;
                    case 'insert':
                        $action = 'insertData';
                        call_user_func_array(array(new $page, $action), array());
                        break;
                    case 'login':
                        $action = 'login';
                        call_user_func_array(array(new $page, $action), array());
                        break;
                }
            } elseif(isset($getURL['delete'])){
            
                $action = 'deleteData';
                $id = $getURL['delete'];
                call_user_func_array(array(new $page, $action), array('ID' => $id));
            
            } else {
            
                $action = 'index';
                call_user_func_array(array(new $page, $action), array());
            
            }
        }
    }
?>