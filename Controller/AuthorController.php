<?php 
    namespace Blog\Controller;

    use Rakit\Validation\Validator;


    use Blog\Model\AuthorModel;
    use Blog\Reponsitory\AuthorReponsitory;
    use \Blog\App\Request;
    use \Blog\App\Session;
    use \Blog\App\App;
    use \Blog\App\Respones;

    class AuthorController{

        public function all() {
            $repo = new AuthorReponsitory();
            return $repo->all();
        }

        public function updateDetail (Request $request) {
            // idAuthor, nickname, mail, password

            $result = array();
            $validator = new Validator();
            $validation = $validator->make($request->input(), [
                'nickname' => 'required',
                'mail' => 'required|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@(trung.com)\z/',
                'passold' => 'required|min:5'
            ]);
            $validation->setAliases([
                'nickname' => 'Name',
                'mail' => 'Mail',
                'passold' => 'Password'
            ]);
            $validation->validate();

            if ($validation->fails()) {
                // handling errors
                $errors = $validation->errors();
                $result = array("error"=>$errors->firstOfAll());
                return response()->json($result); 
            }

            $idAuthor = $request->input('idAuthor');
            $name = $request->input('nickname');
            $mail = $request->input('mail');
            $pass = $request->input('passold');
            $passnew = $request->input('passnew');

            $hashpassold = AuthorModel::hashpass($pass);
            $repo = new AuthorReponsitory();
            $user = $repo->checkPass($idAuthor, $hashpassold);
            if ($user == null ) {
                $result=array('error'=> array('passold' => 'sai mật khẩu cũ'));
                return response()->json($result);
            }
            if (!empty($passnew)){
                $user->setPassword($passnew);
            }
            $user->setNickname($name);
            $user->setMail($mail);

            $result = $repo->updateDetail($user);
            if ($result !== null) {
                App::session()->setUser($user);
                $result = array('data'=>true);
                return response()->json($result);
            }

            $result = array('error'=> array( 'status' =>'cập nhập thất bại'));
            return response()->json($result);
        }

        public function insert(Request $request) {
            // $name, $mail, $pass
            $result = array();
            $validator = new Validator;

            $validation = $validator->make($request->input(), [
                'nickname' => 'required',
                'mail' => 'required|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@(trung.com)\z/',
                'pass' => 'required|min:6'
            ]);
            $validation->setAliases([
                'nickname' => 'Name',
                'mail' => 'Mail',
                'pass' => 'Password'
            ]);
            $validation->validate();

            if ($validation->fails()) {
                // handling errors
                $errors = $validation->errors();
                $result = array('error'=>$errors->firstOfAll());
                return response()->json($result) ;
            }

            $name = $request->input('nickname');
            $mail = $request->input('mail');
            $pass = $request->input('pass');
            
            $repo = new AuthorReponsitory();
            if  ($repo->checkMail($mail)) {
                $result = array('error'=>array('mail'=>'mail đã được sử dụng'));
                return response()->json($result);
            }
            $hashpass = AuthorModel::hashpass($pass);
            $author = new AuthorModel(array('nickName'=>$name,'mail'=>$mail,'password'=>$hashpass));
            // die( var_dump($author));
            $resu = $repo->insert($author);

            $result = array('data'=>true);
            return response()->json($result);
        }

        public function login(Request $request) {

            $result = array();
            $validator = new Validator();
            $validation = $validator->make($request->input(), [
                'mail' => 'required|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@(trung.com)$/',
                'pass' => 'required'
            ]);
            $validation->setAliases([
                'mail' => 'Mail',
                'pass' => 'Password'
            ]);
            $validation->validate();

            if ($validation->fails()) {
                $errors = $validation->errors();
                $result = array('error'=>$errors->firstOfAll());
                return response()->json($result) ;
            }

            $mail = $request->input('mail');
            $pass = $request->input('pass');

            $hashpass = AuthorModel::hashpass($pass);
            $repo = new AuthorReponsitory();
            $user = $repo->login($mail, $hashpass);

            if ($user !== null) {
                App::session()->setUser($user);
                $result = array('data'=>true);
                return response()->json($result);
            }

            $result = array('error'=>false);
            return response()->json($result) ;
        }

        public function logout() {
            App::session()->destroy();
            redirects()->path('/blogs');
        }

        public function logon () {
            return response()->view('User/logon.html.twig');
        }

        public function getUpdateLayout() {
            return response()->view('User/detailuser.html.twig');
        }
    }
?>