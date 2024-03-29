<?php 
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Validator;
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
            $validation = Validator::make($request->input(), [
                'nickname' => 'required',
                'mail' => 'required|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@(trung\.com)$/',
                'passold' => 'required|min:5',
                'passre' => 'same:passnew'
            ]);

            if ($validation->fails()) {
                // handling errors
                $errors = $validation->errors();
                $result = array("error"=>$errors->all());
                return response()->json($result); 
            }

            $idAuthor = Auth::user()->id;
            $name = $request->input('nickname');
            $mail = $request->input('mail');
            $pass = $request->input('passold');
            $passnew = $request->input('passnew');

            $user = Auth::user();

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

            try {
                $result = $user->save();
                if ($result) {
                    $result = array('data'=>true);
                    return response()->json($result);
                }
            } catch (Exception $e) {
                $result = array('error'=> array( 'status' =>'cập nhập thất bại', 'mgs'=> $e));
                return response()->json($result);
            }
        }

        public function insert(Request $request) {
            // $name, $mail, $pass
            $result = array();
            $validation = Validator::make($request->input(), [
                'nickname' => 'required',
                'mail' => 'required|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@trung\.com$/',
                'pass' => 'required|min:5',
                'passre' => 'required|same:pass'
            ]);
            if ($validation->fails()) {
                $errors = $validation->errors();
                $result = array('error'=>$errors->all());
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

            try {
                $author = new AuthorModel();
                $author->nickname = $name;
                $author->mail = $mail;
                $author->password = $hashpass;
                $author->save();
                $result = array('data'=>true);
            } catch (Exception $e) {
                $result = array('error'=>true, 'mgs' => $e);
                
            }
            return response()->json($result);
        }

        public function login(Request $request) {

            $result = array();
            $validation = Validator::make($request->input(), [
                'mail' => 'required|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@trung\.com$/',
                'pass' => 'required'
            ]);

            if ($validation->fails()) {
                $errors = $validation->errors();
                $result = array('error'=>$errors->all());
                
                return response()->json($result) ;
            }

            $mail = $request->input('mail');
            $pass = $request->input('pass');

            try {
                if (Auth::attempt(array(
                    'mail' => $mail, 
                    'password' => $pass)
                )) {
                    $result = array('data'=>true);
                } else {
                    $result = array('data'=>false);
                }
            } catch (Exception $e) {
                $result = array('error'=>true, 'mgs'=> $e);
            }

            return response()->json($result);
        }

        public function logout(Request $request) {
            Auth::logout();
            return redirect('/');
        }

        public function logon () {
            return response()->view('author.logon');
        }

        public function getUpdateLayout(Request $request) {
            return response()->view('author.detail');
        }

    }
?>