<?php 
namespace App\Http\Controllers;

use \App\Reponsitory\BlogReponsitory;
use \App\Model\Blog as BlogModel;
use Illuminate\Http\Request;

    class BlogController extends Controller{
        /**
         * insert new blog 
         * 
         * @params String ten ,String noidung ,Int idAuthor 
         *  param can not empty 
         * 
         * @return boolean 
         */
        public function insert(Request $request) {
            $ten = $request->input('title');
            $noidung = $request->input('content');
            $tacgia = $request->session()->get('user')['id'];
            if (!empty($ten) && !empty($noidung) && !empty($tacgia) ){
                $baiviet = new BlogModel();
                $baiviet->title = $ten;
                $baiviet->content=$noidung; 
                $baiviet->author=$tacgia;
                $baiviet->save();
                return \response()->json(array('data'=>true));
            }
            return \response()->json(array('error'=>false));
        }

        /**
         * @param array (String title, String content)
         * one of element can absent not both 
         *  
         * @return boolean 
         */
        public function update(Request $request) {
            $fields = array('title', 'content');
            $data = $request->input();
            if ($data['idAuthor'] != $request->session()->get('user')['id']) {
                dd($data,$request->session()->get('user'));
                return \response()->json(array('error'=>'sai id'));
            }

            // dong nay co nghia 
            // khong nen xoa 
            foreach ($fields as $key) {
                if (!empty($data[$key])){
                    break;
                } else {
                    continue;
                }
                return false;
            }
            $update = BlogModel::find($data['id']);

            $update->title = $data['title'];
            $update->content = $data['content'];

            if ($update->save()) {
                return \response()->json(array('data'=>true));
            } else {
                return \response()->json(array('error'=>'sai cap nhap'));
            }
        }

        /**
         * @param id of blog
         * 
         * @return boolean 
         */
        public function delete (Request $request) {
            // die(var_dump($request->input(), $request->session()->get('user')['id']));
            if ($request->input('idAuthor') != $request->session()->get('user')['id']) {
                return \response()->json(array('error'=>false));
            }

            if (BlogModel::destroy($request->input('id'))) {
                return \response()->json(array('data'=>true));
            } else {
                return \response()->json(array('error'=>false));
            }
        }

        /**
         * get all blog have in databasse 
         * 
         * @return array BlogModel or false 
         */
        public function all(Request $request) {
            $blogs = BlogModel::all();
            return response()->view('index', array('blogs'=> $blogs, 'user' => $request->session()->get('user')));
        }

        /**
         * get all blog have in databasse 
         * 
         * @return array BlogModel or false 
         */
        function detail(Request $request, $id) {
            $detail = BlogModel::where('id',$id)->first();
            return response()->view('detail', array('blog'=> $detail, 'user'=> $request->session()->get('user')));
        }

        function getUpdateLayout (Request $request, $id) {
            $detail = BlogModel::find($id);
            return response()->view('update', array('blog'=> $detail,'user'=> $request->session()->get('user')));
        }

        function getPaper(Request $request) {
            return response()->view('page', array('user'=>$request->session()->get('user')));
        }
    }
?>
