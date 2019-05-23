<?php 
    require_once(ROOT_PATH . '/model/author.php');
    
    require_once(ROOT_PATH . '/Reponsitory/AuthorRepository.php');
    class AuthorControler{

        public function insert($name, $mail, $pass) {
            $regex = "/@trung.com/i";

            $success = preg_match($regex,$mail,$match);
            if ($success) {
                $hashpass = hash('md5',$pass,TRUE);
                // die($hashpass);
                $author = new AuthorModel(array('nickName'=>$name,'mail'=>$mail,'password'=>$hashpass));
                $repo = new AuthorRepository();
                $repo->insert($author);
                $repo->close();
            }
        }

        public function login($mail,$pass) {
            $regex = "/@trung.com/i";

            $success = preg_match($regex,$mail,$match);
            if ($success) {
                $hashpass = hash('md5',$pass,TRUE);
                $repo = new AuthorRepository();
                $userId = $repo->login($mail,$hashpass);
                $repo->close();

                return $userId;
            }
        }


    }

?>