<?php

require_once(ROOT_PATH.'/data/Mysql.php');

class BlogRepository extends MysqlDB {
    public function insert(BlogModel $blog) {
        $title = $blog->getTitle();
        $contend = $blog->getContent();
        $author = $blog->getAuthor();

        $sql = "INSERT INTO MyBlog (Title, Content, author) VALUES ('".$title."', '".$contend."', ".number_format($author).");";

        $result = $this->query($sql);

        if ($result) {
            echo "New record created successfully";
        }
    }

    public function update(BlogModel $blog) {
        $title = $blog->getTitle();
        $contend = $blog->getContent();
        $author = $blog->getAuthor();
        $id = $blog->getId();

        $sql = "update MyBlog set Title='".$title."', Content='".$contend."', author=".number_format($author)." where id =".$id.";";

        $result = $this->query($sql);

        if ($result) {
            echo "New record created successfully";
        }
    }

    public function delete($id){
        $sql = 'delete from MyBlog where id ='.$id.';';
        $result = $this->query($sql);

        if ($result) {
            echo "New record created successfully";
        }
    }

    public function getList() 
    {
        $return = array();
        $sql = "select * from MyBlog;";
        $result = $this->query($sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $return[] = new BlogModel(array('title'=>$row["Title"], 'content'=>$row["Content"], 'idAuthor'=>$row["author"], 'idBlog'=>$row['id']));
            }
        }
        return $return;
    }

    public function getDetail($id) {
        $sql = "select * from MyBlog where id=".$id.";";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $return[] = new BlogModel(array('title'=>$row["Title"], 'content'=>$row["Content"], 'idAuthor'=>$row["author"], 'idBlog'=>$row['id']));
            }
        }
        return $return;
    }
}