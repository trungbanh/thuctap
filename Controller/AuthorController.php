<?php 
    namespace Blog\Controller;

    use Blog\Model\AuthorModel;
    use Blog\Reponsitory\AuthorReponsitory;

    class AuthorController{

        public function all() {
            $repo = new AuthorReponsitory();
            return $repo->all();
        }

        public function detail($data = array()){
            $idAuthor = $data['idAuthor'];
            if (isset($idAuthor)) {
                $repo = new AuthorReponsitory();
                return $repo->detail();
            }
        }

        public function update ($data = array()) {
            // idAuthor, nickname, mail, password

            $idAuthor = $data['idAuthor'];
            
        } 

        public function insert($data = array()) {
            // $name, $mail, $pass
            $name = $data['name'];
            $mail = $data['mail'];
            $pass = $data['pass'];
            if (empty($name) || empty($mail) || empty($pass)){
                return false;
            }
            $regex = "/@trung.com/i";
            $success = preg_match($regex,$mail,$match);
            if ($success) {
                $repo = new AuthorReponsitory();
                if  ($repo->checkMail($mail)) {
                    return false;
                }
                $hashpass = hash('md5',$pass,TRUE);
                $author = new AuthorModel(array('nickName'=>$name,'mail'=>$mail,'password'=>$hashpass));
                $result = $repo->insert($author);
                $repo->close();
                return $result;
            }
        }

        public function login($mail,$pass) {
            if (empty($mail) || empty($pass)){
                return false;
            }
            $regex = "/@trung.com/i";
            $success = preg_match($regex,$mail,$match);
            if ($success) {
                $hashpass = hash('md5',$pass,TRUE);
                $repo = new AuthorReponsitory();
                $userId = $repo->login($mail,$hashpass);
                $repo->close();
                return $userId;
            }
        }
    }
?>