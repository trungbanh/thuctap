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
                try {
                    $baiviet = new BlogModel();
                    $baiviet->title = $ten;
                    $baiviet->content=$noidung; 
                    $baiviet->id_author=$tacgia;
                    $baiviet->save();
                    return \response()->json(array('data'=>true));
                } catch (Exception $e) {
                    return \response()->json(array('error'=>'lỗi hệ thống', 'msg'=> $e));
                }
                
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

            if ($data['idAuthor'] != Auth::user()->id) {
                return \response()->json(array('error'=>'Id không trùng khớp'));
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

            try {
                $result = $update->save();
            } catch (Exception $e) {
                return \response()->json(array('error'=>'lỗi hệ thống', 'msg'=> $e));
            }

            if ($result) {
                return \response()->json(array('data'=>true));
            } else {
                return \response()->json(array('error'=>'cập nhập thất bại'));
            }
        }

        /**
         * @param id of blog
         * 
         * @return boolean 
         */
        public function delete (Request $request) {
            if ($request->input('idAuthor') != Auth::user()->id) {
                return \response()->json(array('error'=>true));
            }
            try {
                $result = BlogModel::destroy($request->input('id'));

                if ($result) {
                    return \response()->json(array('data'=>true));
                } else {
                    return \response()->json(array('error'=>true));
                }
            } catch (Exception $e) {
                return \response()->json(array('error'=>true , 'mgs'=> $e));
            }
           
        }

        /**
         * get all blog have in databasse 
         * 
         * @return array BlogModel or false 
         */
        public function all(Request $request) {
            try {
                $blogs = BlogModel::all();
                return response()->view('blog.index', array('blogs'=> $blogs));
            } catch (Exception $e) {
                return response()->view('blog.index');
            }
            
        }

        /**
         * get all blog have in databasse 
         * 
         * @return array BlogModel or false 
         */
        function detail(Request $request, $id) {
            try {
                $detail = BlogModel::where('id',$id)->firstOrFail();
                return response()->view('blog.detail', array('blog'=> $detail));

            } catch(\Exception $e) {
                return redirect(route('blog-index'));
            }
        }

        function getUpdateLayout (Request $request, $id) {

            try {
                $detail = BlogModel::find($id);
                return response()->view('blog.update', array('blog'=> $detail));
            } catch (Exception $e) {
                return response()->view('blog.update', array('error'=> $e));
            }
            
        }

        function getPaper(Request $request) {
            return response()->view('blog.new');
        }
    }
?>
