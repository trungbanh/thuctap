<?php 
namespace Blog\Controller;

use \Blog\Reponsitory\BlogReponsitory;
use \Blog\Model\BlogModel;
use \Blog\data\MysqlDB;
use \Blog\App\Request;
use \Blog\App\Session;
use \Blog\App\App;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

    class BlogController{
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
                return redirects()->path(' /blogs');
            } else {
                return redirects()->path(' /blogs');
            }
        }

        /**
         * get all blog have in databasse 
         * 
         * @return array BlogModel or false 
         */
        public function all() {
            $repo = new BlogReponsitory();
            $list = $repo->getList();
            
            return response()->view('/Blog/index.html.twig', array('list'=> $list));
        }

        /**
         * get all blog have in databasse 
         * 
         * @return array BlogModel or false 
         */
        function detail(Request $request) {
            $repo = new BlogReponsitory();
            $detail = $repo->getDetail($request->getQueryByKey('id'));

            return response()->view('/Blog/detail.html.twig',array('detail'=> $detail));
        }

        function getUpdateLayout (Request $request) {
            $repo = new BlogReponsitory();
            $detail = $repo->getDetail($request->getQueryByKey('id'));

            return response()->view('/Blog/update.html.twig',array('detail'=> $detail));
        }

        function getPaper() {
            return response()->view('/Blog/paper.html.twig');
        }
    }
?>  
