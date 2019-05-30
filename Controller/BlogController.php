<?php 
namespace Blog\Controller;

use \Blog\Reponsitory\BlogReponsitory;
use \Blog\Model\BlogModel;
use \Blog\data\MysqlDB;
use \Blog\App\Request;

    class BlogController{
        /**
         * insert new blog 
         * 
         * @params String ten ,String noidung ,Int idAuthor 
         *  param can not empty 
         * 
         * @return boolean 
         */
        public function insert( $data = array()) {
            $ten = $data['title'];
            $noidung = $data['content'];
            $tacgia = $data['idAuthor'];
            
            if (!empty($ten) && !empty($noidung) && !empty($tacgia) ){
                $baiviet = new BlogModel(array('title'=>$ten, 'content'=>$noidung, 'idAuthor'=>$tacgia));
                $repo = new BlogReponsitory();
                $result = $repo->insert($baiviet);
                $repo->close();

                if ($result) {
                    return true;
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
        public function update(\Blog\App\Request $request) {
            $fields = array('title', 'content');

            $data = $request->input();
            foreach ($fields as $key) {
                if (empty($data[$key])){
                    continue;
                } else {
                    break;
                }
                return false;
            }
            $repo = new BlogReponsitory();
            // if (!empty($this->detail($request))) {
                $result = $repo->update($data);
                $repo->close();
                if ($result) {
                    return true;
                } else {
                    return false;
                }
            // } else {
            //     return false;
            // }
            
        }

        /**
         * @param id of blog
         * 
         * @return boolean 
         */
        public function delete ($data= array()) {
            $id = $data['id'];
            if (!empty($this->detail($id))){
                $repo = new BlogReponsitory();
                $result = $repo->delete($id);
                $repo->close();
                if ($result) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false ;
            }
        }

        /**
         * get all blog have in databasse 
         * 
         * @return array BlogModel or false 
         */
        function all() {
            $repo = new BlogReponsitory();
            $list = $repo->getList();
            $repo->close();
            if (!empty($list)) {
                return $list;
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
            $id = $request->query('id');

            $repo = new BlogReponsitory();
            $list = $repo->getDetail($id);
            $repo->close();
            if (!empty($list)) {
                return require_once(ROOT_PATH . '/View/layout/detail.php');
            } else {
                return false;
            }
        }
    }
?>  