<?php 
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Rakit\Validation\Validator;
    use \App\Model\Author as AuthorModel;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class AuthorController extends Controller {

        public function all() {
            return null;
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

            $idAuthor = Auth::user()->id;
            $name = $request->input('nickname');
            $mail = $request->input('mail');
            $pass = $request->input('passold');
            $passnew = $request->input('passnew');

            $user = AuthorModel::find($idAuthor);
            if (!AuthorModel::check($pass, $user['password'])) {
                $result=array('error'=> array('passold' => 'sai mật khẩu cũ'));
                return response()->json($result);
            }

            $another = AuthorModel::where('mail',$mail);
            // neu mail moi khong thuoc id nay va da dc su dung boi id khac 
            if ($user->mail != $mail && $another != null ){
                $result = array('error' => array('mail'=> 'mail này đã được sử dụng'));
                return response()->json($result);
            }

            if (!empty($passnew)){
                $user->password=AuthorModel::hashpass($passnew);
            }
            $user->nickname=$name;
            $user->mail=$mail;

            if ($user->save()) {
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
                die(var_dump($result));
                return response()->json($result) ;
            }

            $name = $request->input('nickname');
            $mail = $request->input('mail');
            $pass = $request->input('pass');
            
            $author = AuthorModel::where('mail',$mail)->first();
            if ($author != null) {
                $result = array('error'=>array('mail'=>'mail đã được sử dụng'));
                return response()->json($result);
            }
            $hashpass = AuthorModel::hashpass($pass);
            $author = new AuthorModel();
            // array('nickName'=>$name,'mail'=>$mail,'password'=>$hashpass)
            $author->nickname = $name;
            $author->mail = $mail;
            $author->password = $hashpass;
            $author->save();
            
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

            if (Auth::attempt(array(
                'mail' => $mail, 
                'password' => $pass)
            )) {
                $result = array('data'=>true);
            } else {
                $result = array('data'=>false);
            }

            return response()->json($result);
        }

        public function logout(Request $request) {
            $user = $request->session()->forget('user');
            $request->session()->flush();
            return redirect('/');
        }

        public function logon () {
            return response()->view('logon');
        }

        public function getUpdateLayout(Request $request) {
            return response()->view('detailuser');
        }
    }
?>