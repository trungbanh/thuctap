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

        public static function hashpass ($pass){
            return hash('md5',$pass,TRUE);
        }
    }
?>
