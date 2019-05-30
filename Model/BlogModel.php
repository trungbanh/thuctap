<?php 
namespace Blog\Model;

use Blog\Model\AbstractModel;

    class BlogModel extends AbstractModel {
        protected $fields = array(
            'title', 'content', 'idAuthor','idBlog'
        );
    }
?>


<!-- CREATE TABLE MyBlog (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Title TEXT NOT NULL,
Content text NOT NULL,
author Int(6)
) -->