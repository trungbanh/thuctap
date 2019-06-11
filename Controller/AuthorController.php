<?php 
    namespace Blog\Controller;

    use Blog\Model\AuthorModel;
    use Blog\Reponsitory\AuthorReponsitory;
    use \Blog\App\Request;


    class AuthorController{


        public function __destruct(){
        }

        public function all() {
            $repo = new AuthorReponsitory();
            return $repo->all();
        }

        public function detail(Request $request){
            $idAuthor = $request->input('idAuthor');
            if (isset($idAuthor)) {
                $repo = new AuthorReponsitory();
                return $repo->detail();
            }
        }

        public function update (Request $request) {
            // idAuthor, nickname, mail, password
            $idAuthor = $request->input('idAuthor');
        } 

        public function insert(Request $request) {
            // $name, $mail, $pass
            $name = $request->input('name');
            $mail = $request->input('mail');
            $pass = $request->input('pass');
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
                return $result;
            }

            return false;
        }

        public function login(Request $request) {

            $mail = $request->input('mail');
            $pass = $request->input('pass');
            if (empty($mail) || empty($pass)){
                return "loi de trong";
            }
            $regex = "/@trung.com/i";
            $success = preg_match($regex,$mail,$match);
            if ($success) {
                $hashpass = hash('md5',$pass,TRUE);
                $repo = new AuthorReponsitory();
                $userId = $repo->login($mail,$hashpass);
                // $repo->close();
                $_SESSION['id_user'] = $userId;
                return require_once(ROOT_PATH.'/View/layout/index.php');
            }
        }

        public function logon () {
            return require_once(ROOT_PATH.'/View/layout/logon.php');
        } 
    }
?>