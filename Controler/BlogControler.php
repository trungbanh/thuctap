<?php 
    require_once(ROOT_PATH . '/model/blog.php');
    require_once(ROOT_PATH . '/Reponsitory/BlogRepository.php');
    class BlogControler{

        public function insert($ten, $noidung, $tacgia) {
            if (!empty($ten) && !empty($noidung) && !empty($tacgia) ){
                $baiviet = new BlogModel(array('title'=>$ten, 'content'=>$noidung, 'idAuthor'=>$tacgia));
                $repo = new BlogRepository();
                $repo->insert($baiviet);
                $repo->close();
            } else {
                echo "chua du noi dung";
            }
            
        }

        public function update(BlogModel $blog) {
            $repo = new BlogRepository();
            $repo->update($blog) ;
            $repo->close();
        }

        public function delete ($id) {
            $repo = new BlogRepository();
            $repo->delete($id);
            $repo->close();
        }

        function getAll() {
            $repo = new BlogRepository();

            $list = $repo->getList();

            $repo->close();

            return $list;

        }

        function getDetail($id) {
            $repo = new BlogRepository();
            $list = $repo->getDetail($id);
            $repo->close();
            return $list;

        }
    }

?>  

