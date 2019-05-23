<?php 
    require_once(ROOT_PATH . '/model/BlogModel.php');
    require_once(ROOT_PATH . '/Reponsitory/BlogRepository.php');
    class BlogControler{

        public function insert($ten, $noidung, $tacgia) {
            if (!empty($ten) && !empty($noidung) && !empty($tacgia) ){
                $baiviet = new BlogModel(array('title'=>$ten, 'content'=>$noidung, 'idAuthor'=>$tacgia));
                $repo = new BlogRepository();
                $result = $repo->insert($baiviet);
                $repo->close();

                if ($result) {
                    return array('status'=>'success');
                } else {
                    return array('status'=>'fail');
                }
            } else {
                return array('status'=>'khong de trong noi dung ');
            }
        }

        public function update($data = array()) {
            $fields = array('title', 'content');
            foreach ($fields as $key) {
                if (empty($data[$key])){
                    continue;
                } else {
                    break;
                }

                return array('status'=>'khong de trong noi dung ');
            }
            $repo = new BlogRepository();
            $detail = $repo ->getDetail($data['id']);

            $oldblog = array();

            foreach ($detail as $blog) {
                if (empty($blog)) {
                    return array('status'=>'id khong ton tai');
                } else {
                    $oldblog['title'] = $blog->getTitle();
                    $oldblog['content'] = $blog->getContent();
                    $oldblog['id'] = $blog->getId();
                }
            }
            foreach ($fields as $key) {
                if (empty($data[$key])){
                    $data[$key] = $oldblog[$key];
                } 
            }

            $result = $repo->update($data) ;
            $repo->close();
            if ($result) {
                return array('status'=>'success');
            } else {
                return array('status'=>'fail');
            }
            
        }

        public function delete ($id) {

            $repo = new BlogRepository();
            $result = $repo->delete($id);
            $repo->close();
            if ($result) {
                return array('status'=>'success');
            } else {
                return array('status'=>'fail');
            }
        }

        function getAll() {
            $repo = new BlogRepository();
            $list = $repo->getList();
            $repo->close();
            
            if (!empty($list)) {
                return $list;
            } else {
                return array('status'=>'fail');
            }
        }

        function getDetail($id) {
            $repo = new BlogRepository();
            $list = $repo->getDetail($id);
            $repo->close();
            if (!empty($list)) {
                return $list;
            } else {
                return array('status'=>'fail');
            }

        }
    }

?>  

