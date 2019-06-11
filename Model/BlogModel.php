<?php 
namespace Blog\Model;

use Blog\Model\AbstractModel;

    class BlogModel extends AbstractModel {
        protected $fields = array(
            'title', 'content', 'idAuthor','idBlog'
        );
    }
?>