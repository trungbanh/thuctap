<?php 
namespace App\Http\Controllers;

use \App\Reponsitory\BlogReponsitory;
use \App\Model\Blog as BlogModel;
use \App\Model\Author ;
use Illuminate\Http\Request;

use Auth;

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
            $tacgia = Auth::user()->id;
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

            // die(var_dump($data));
            if ($data['idAuthor'] != Auth::user()->id) {
                return \response()->json(array('error'=>'Sai id'));
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
            if ($request->input('idAuthor') != Auth::user()->id) {
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
            return response()->view('blog.index', array('blogs'=> $blogs, 'user' => Auth::user()));
        }

        /**
         * get all blog have in databasse 
         * 
         * @return array BlogModel or false 
         */
        function detail(Request $request, $id) {
            try {

                $detail = BlogModel::where('id',$id)->firstOrFail();
            } catch(\Exception $e) {
                return redirect(route('blog-index'));
            }

            return response()->view('blog.detail', array('blog'=> $detail, 'user'=> Auth::user()));
        }

        function getUpdateLayout (Request $request, $id) {
            $detail = BlogModel::find($id);
            return response()->view('blog.update', array('blog'=> $detail,'user'=> Auth::user()));
        }

        function getPaper(Request $request) {
            return response()->view('blog.new', array('user'=> Auth::user()));
        }
    }
?>
