<?php 
    namespace Blog\Controller;

    use Blog\Model\AuthorModel;
    use Blog\Reponsitory\AuthorReponsitory;
    use \Blog\App\Request;
    use \Blog\App\Session;

    use Twig\Loader\FilesystemLoader;
    use Twig\Environment;

    class AuthorController{

        public function __destruct(){
        }

        public function all() {
            $repo = new AuthorReponsitory();
            return $repo->all();
        }

        public function updateDetail (Request $request) {
            // idAuthor, nickname, mail, password
            $idAuthor = $request->input('idAuthor');
            $name = $request->input('nickname');
            $mail = $request->input('mail');
            $pass = $request->input('passold');
            $passnew = $request->input('passnew');

            if (true || empty($mail) || empty($pass) || empty($name)){
                return "<h3>lỗi để trống</h3>";
            }
            $regex = "/@trung.com/i";
            $success = preg_match($regex,$mail,$match);
            if (!$success) {
                return "<h3> mail chi cho phep @trung.com </h3>" ;
            }
            $hashpassold = AuthorModel::hashpass($pass);
            $repo = new AuthorReponsitory();
            $user = $repo->checkPass($idAuthor, $hashpassold);
            if ($user == null ) {
                return "<h3>sai mail hoặc mật khẩu</h3>" ;
            }
            if (!empty($passnew)){
                $passnew = AuthorModel::hashpass($passnew);
                $user->setPassword($passnew);
            }
            $user->nickName = $name;
            $user->mail = $mail;
            $result = $repo->updateDetail($user);
            if ($result !== null) {
                return render('\View\layout\detailuser.php');
            }
            return "<h3>update thất bại</h3>";
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
                $user = $repo->login($mail, $hashpass);
                if ($user !== null ) {
                    $_SESSION['user'] = $user;
                    return \move_on('/View/layout/index.php');
                }
                
            }
        }

        public function logout() {
            unset($_SESSION['user']);
            session_destroy();
            \move_on('/blogs');
        }

        public function logon () {
            return render('/View/layout/logon.php');
        }

        public function getUpdateLayout() {
            return render('/View/layout/detailuser.php');
        }
    }
?>