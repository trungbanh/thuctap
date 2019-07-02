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
            $tacgia = App::session()->getUser()->id_author;
            if (!empty($ten) && !empty($noidung) && !empty($tacgia) ){
                $baiviet = new BlogModel(array('title'=>$ten, 'content'=>$noidung, 'idAuthor'=>$tacgia));
                $repo = new BlogReponsitory();
                $result = $repo->insert($baiviet);
                if ($result) {
                    return redirects()->path('/blog/'.$result['id']);
                } 
            }
            return false;
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
            if ($data['idAuthor'] != strval(App::session()->getUser()->id_author)) {
                return redirects()->path('/blog/'.$data['id']);
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
            $repo = new BlogReponsitory();
            $result = $repo->update($data);
            if ($result) {
                return redirects()->path('/blog/'.$data['id']);
            } else {
                return redirects()->path('/blog/'.$data['id']);
            }
        }

        /**
         * @param id of blog
         * 
         * @return boolean 
         */
        public function delete (Request $request) {
            if ($request->input('idAuthor') != strval(App::session()->getUser()->id_author)) {
                return null;
            }

            $repo = new BlogReponsitory();
            $result = $repo->delete($request->input('id'));
            if ($result) {
                return redirects()->path('/blogs');
            } else {
                return redirects()->path('/blogs');
            }
        }

        /**
         * get all blog have in databasse 
         * 
         * @return array BlogModel or false 
         */
        public function all() {
            $blogs = BlogModel::all();
            $user = array ('id'=>1,'nickname'=>'test');
            return response()->view('index', array('blogs'=> $blogs, 'user' => $user));
        }

        /**
         * get all blog have in databasse 
         * 
         * @return array BlogModel or false 
         */
        function detail($id) {
            $detail = BlogModel::where('id',$id)->first();

            $user = array ('id'=>1,'nickname'=>'test');
            return response()->view('detail', array('blog'=> $detail, 'user' => $user));
        }

        function getUpdateLayout ($id) {
            $repo = new BlogReponsitory();
            $detail = $repo->getDetail($request->getQueryByKey('id'));
            $user = array ('id'=>1,'nickname'=>'test');
            return response()->view('update', array('blog'=> $detail, 'user' => $user));
        }

        function getPaper() {
            return response()->view('page', array('user'=>true));
        }
    }
?>  
