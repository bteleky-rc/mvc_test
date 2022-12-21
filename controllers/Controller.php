<?php
    abstract class Controller
    {

        /**
         * An array which indexes will be accessible as variables in tempaltes
         *
         * @var array
         */
        protected $data = array();

        /**
         * a template name withouth the extension
         *
         * @var string
         */
        protected $view = "";

        /**
         * the HTML head
         *
         * @var array
         */
        protected $head = array('title' => '', 'description' => '');


        /**
         * Undocumented function
         *
         * @return void
         */
        public function renderView() 
        {
            if($this->view) {
                extract($this->data);
                require("views/" . $this->view ."php");
            }
        }

        public function redirect($url) {
            header("Location: /$url");
            header("Connection: close");
            exit();
        }
        /**
         * The main controller method
         *
         * @param [type] $params
         * @return void
         */
        abstract function process($params);

    }
