<?php 
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Rakit\Validation\Validator;
    use \App\Model\Author as AuthorModel;
    use Illuminate\Http\Request;

    class AuthorController extends Controller {

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
                'mail' => 'required|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@(trung\.com)$/',
                'passold' => 'required|min:5',
                'passre' => 'same:passnew'
            ]);
            $validation->setAliases([
                'nickname' => 'Name',
                'mail' => 'Mail',
                'passold' => 'Password',
                'passre' => 'Password'
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

            // neu mail moi khong thuoc id nay va da dc su dung boi id khac 
            if (!$repo->checkMailWithId($idAuthor,$mail) && $repo->checkMail($mail) ){
                $result = array('error' => array('mail'=> 'mail này đã được sử dụng'));
                return \response()->json($result);
            }

            if (!empty($passnew)){
                $user->setPassword($passnew);
            }
            $user->setNickname($name);
            $user->setMail($mail);

            $result = $repo->updateDetail($user);
            if ($result !== null) {
                Request::session()->setUser($user);
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
                'mail' => 'required|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@trung\.com$/',
                'pass' => 'required|min:5',
                'passre' => 'required|same:pass'
            ]);
            $validation->setAliases([
                'nickname' => 'Name',
                'mail' => 'Mail',
                'pass' => 'Password',
                'passre' => 'Password'
            ]);
            $validation->validate();

            if ($validation->fails()) {
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
            $resu = $repo->insert($author);

            $result = array('data'=>true);
            return response()->json($result);
        }

        public function login(Request $request) {

            $result = array();
            $validator = new Validator();
            $validation = $validator->make($request->input(), [
                'mail' => 'required|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@trung\.com$/',
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
                Request::session(array('user'=>$user));
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
            return response()->view('logon');
        }

        public function getUpdateLayout() {
            $user = array ('id_author'=>1,'nickname'=>'test');
            return response()->view('detailuser',array('user'=>$user ));
        }
    }
?>