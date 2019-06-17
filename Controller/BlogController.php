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
                    return move_on('/blog/'.$result['id']);
                } else {
                    return false;
                }
            } else {
                return false;
            }
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
            if ($request->input('idAuthor') != strval(App::session()->getUser()->id_author)) {
                return \move_on('/blog/'.$data['id']);
            }

            foreach ($fields as $key) {
                if (empty($data[$key])){
                    continue;
                } else {
                    break;
                }
                return false;
            }
            $repo = new BlogReponsitory();
            $result = $repo->update($data);
            if ($result) {
                return \move_on('/blog/'.$data['id']);
            } else {
                return \move_on('/blog/'.$data['id']);
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
            $id = $request->input('id');
            $repo = new BlogReponsitory();
            $result = $repo->delete($id);
            if ($result) {
                return \move_on(' /blogs');
            } else {
                return \move_on(' /blogs');
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
            if (!empty($list)) {
                return render('/View/layout/index.php',array('list'=> $list));
            } else {
                return false;
            }
        }

        /**
         * get all blog have in databasse 
         * 
         * @return array BlogModel or false 
         */
        function detail(Request $request) {
            $id = $request->getQueryByKey('id');

            $repo = new BlogReponsitory();
            $list = $repo->getDetail($id);
            if (!empty($list)) {
                return render('/View/layout/detail.php',array('list'=> $list));
            } else {
                return false;
            }
        }

        function getUpdateLayout (Request $request) {
            $id = $request->getQueryByKey('id');
            $repo = new BlogReponsitory();
            $list = $repo->getDetail($id);
            if (!empty($list)) {
                return render('/View/layout/update.php',array('list'=> $list));
            } else {
                return false;
            }
        }
    }
?>  
