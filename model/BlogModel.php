<?php
    require_once(ROOT_PATH . '/model/abstractModel.php');
    class BlogModel extends abstractModel {
        protected $fields = array(
            'title', 'content', 'idAuthor','idBlog'
        );
        
        protected $idBlog = null ;
        protected $title = '';
        protected $content = '';
        protected $idAuthor = null;
    
        
        public function getId() {
            return $this->idBlog;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getContent() {
            return $this->content;
        }
        
        public function getAuthor() {
            return $this->idAuthor;
        }
    }
?>


<!-- CREATE TABLE MyBlog (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Title TEXT NOT NULL,
Content text NOT NULL,
author Int(6)
) -->