<?php 
    require_once(ROOT_PATH . '/model/BlogModel.php');
    require_once(ROOT_PATH . '/Reponsitory/BlogRepository.php');
    class BlogControler{

        public function insert($ten, $noidung, $tacgia) {
            /**
             * insert new blog 
             * 
             * @params String ten ,String noidung ,Int idAuthor 
             *  param can not empty 
             * 
             * @return boolean 
             */
            if (!empty($ten) && !empty($noidung) && !empty($tacgia) ){
                $baiviet = new BlogModel(array('title'=>$ten, 'content'=>$noidung, 'idAuthor'=>$tacgia));
                $repo = new BlogRepository();
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

        public function update($data = array()) {
            /**
             * @param array (String title, String content)
             * one of element can absent not both 
             *  
             * @return boolean 
             */
            $fields = array('title', 'content');
            foreach ($fields as $key) {
                if (empty($data[$key])){
                    continue;
                } else {
                    break;
                }

                return false;
            }
            $repo = new BlogRepository();
            $detail = $repo ->getDetail($data['id']);

            $oldblog = array();
            if ($detail == false) {
                echo '<h1> id khong ton tai </h1>';
                return $detail;
            } else {
                foreach ($detail as $blog) {
                    
                        $oldblog['title'] = $blog->getTitle();
                        $oldblog['content'] = $blog->getContent();
                        $oldblog['id'] = $blog->getId();
                }
                foreach ($fields as $key) {
                    if (empty($data[$key])){
                        $data[$key] = $oldblog[$key];
                    } 
                }
            }
            $result = $repo->update($data) ;
            $repo->close();
            if ($result) {
                return true;
            } else {
                return false;
            }
            
        }

        public function delete ($id) {

            /**
             * @param id of blog
             * 
             * @return boolean 
             */

            $repo = new BlogRepository();
            $result = $repo->delete($id);
            $repo->close();
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        function getAll() {
            /**
             * get all blog have in databasse 
             * 
             * @return array BlogModel or false 
             */
            $repo = new BlogRepository();
            $list = $repo->getList();
            $repo->close();
            
            if (!empty($list)) {
                return $list;
            } else {
                return false;
            }
        }

        function getDetail($id) {
            /**
             * get all blog have in databasse 
             * 
             * @return array BlogModel or false 
             */
            $repo = new BlogRepository();
            $list = $repo->getDetail($id);
            $repo->close();
            if ($list) {
                return $list;
            } else {
                return false;
            }

        }
    }

?>  

