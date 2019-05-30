<?php 

    namespace Blog\Model;

    use Blog\Model\AbstractModel;

    class AuthorModel extends AbstractModel {

        protected $fields = array(
            'nickName', 
            'mail', 
            'password', 
            'idAuthor'
        );
    }
?>

<!-- 
CREATE TABLE Author (
idAuthor INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nickname TEXT NOT NULL,
mail text NOT NULL,
passwork binary(16) NOT NULL );
 -->