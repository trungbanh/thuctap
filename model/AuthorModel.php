<?php 
    require_once(ROOT_PATH.'/model/abstractModel.php');

    class AuthorModel extends abstractModel {
        protected $fields = array(
            'nickName', 
            'mail', 
            'password', 
            'idAuthor'
        );

        protected $idAuthor = null;
        protected $nickName = null;
        protected $mail = null;
        protected $password = null;

        function __construct(array $data = array()) {
            parent::__construct($data);
            die(var_dump($this));
        }

        public function getIdAuthor()
        {
            return $this->idAuthor;
        }

        public function setIdAuthor($idAuthor)
        {
            $this->idAuthor = $idAuthor;

        }

        public function getNickName()
        {
            return $this->nickName;
        }

        public function setNickName($nickName)
        {
            $this->nickName = $nickName;
        }

        public function getMail()
        {
            return $this->mail;
        }

        public function setMail($mail)
        {
            $this->mail = $mail;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }
    }


?>

<!-- 
CREATE TABLE Author (
idAuthor INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nickname TEXT NOT NULL,
mail text NOT NULL,
passwork binary(16) NOT NULL );
 -->