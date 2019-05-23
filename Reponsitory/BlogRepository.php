<?php

require_once(ROOT_PATH.'/data/Mysql.php');

class BlogRepository extends MysqlDB {
    /**
     * Insert blog
     * 
     * @param BlogModel $blog
     */
    public function insert(BlogModel $blog) {
        $title = $blog->getTitle();
        $contend = $blog->getContent();
        $author = $blog->getAuthor();

        $sql = "INSERT INTO MyBlog (Title, Content, author) VALUES ('".$title."', '".$contend."', ".number_format($author).");";

        $result = $this->query($sql);

        if ($result) {
            return array('status'=>'success');
        } else {
            return false;
        }
    }

    public function update($data = array()) {
        if (isset($data)){
            $fields = array('title', 'content','id');
            foreach ($fields as $key) {
                if (empty($data[$key])){
                    continue;
                } else {
                    break;
                }
            }

            $sql = "UPDATE MyBlog SET Title='".$data['title']."', Content='".$data['content']."' WHERE id =".$data['id'].";";
            $result = $this->query($sql);
            if ($result) {
                return array('status'=>'success');
            } else {
                return array('status'=>'fail');
            }
        } else {
            return false;
        }
    }

    public function delete($id){
        $sql = 'DELETE FROM MyBlog WHERE id ='.$id.';';
        $result = $this->query($sql);

        if ($result) {
            return array('status'=>'success');
        } else {
            return false;
        }
    }

    public function getList() 
    {
        $return = array();
        $sql = "SELECT * FROM MyBlog;";
        $result = $this->query($sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $return[] = new BlogModel(array('title'=>$row["Title"], 'content'=>$row["Content"], 'idAuthor'=>$row["author"], 'idBlog'=>$row['id']));
            }
        }
        if ($result) {
            return $return;
        } else {
            return false;
        }
    }

    public function getDetail($id) {
        $sql = "SELECT * FROM MyBlog WHERE id=".$id.";";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $return[] = new BlogModel(array('title'=>$row["Title"], 'content'=>$row["Content"], 'idAuthor'=>$row["author"], 'idBlog'=>$row['id']));
            }
        }
        if ($result) {
            return $return;
        } else {
            return false;
        }
    }
}