<?php

require_once(ROOT_PATH.'/data/Mysql.php');

class BlogRepository extends MysqlDB {
    /**
     * BlogRepository is a class to connect mysql database 
     * 
     */
    public function insert(BlogModel $blog) {
        /**
         * Insert new blog to database 
         * 
         * @param BlogModel (Title, Content, author) id can null
         * 
         * @return boolean 
         * 
         */
        $title = $blog->getTitle();
        $contend = $blog->getContent();
        $author = $blog->getAuthor();

        $sql = "INSERT INTO MyBlog (Title, Content, author) VALUES ('".$title."', '".$contend."', ".number_format($author).");";

        $result = $this->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data = array()) {

        /**
         * Update Blog 
         * 
         * @param array ( String title, String content, Int id )
         * 
         * @return boolean 
         */
        if (isset($data)){
            $fields = array('title', 'content','id');
            $sql = "UPDATE MyBlog SET Title='".$data['title'] ."', Content='".$data['content']."' WHERE id =".$data['id'].";";
            $result = $this->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function delete($id){
        /**
         * 
         * @param id Int 
         * 
         * @return boolean 
         * 
         */

        $sql = 'DELETE FROM MyBlog WHERE id ='.$id.';';
        $result = $this->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getList() 

    /**
     * 
     * @param none parameter
     * 
     * @return false if fail query, array(BlogModel) if success  
     * 
     */

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
         /**
        * 
        * @param id Int 
        * 
        * @return false if fail query, array(BlogModel) if success  
        * 
        */
        $sql = "SELECT * FROM MyBlog WHERE id=".$id.";";
        $result = $this->query($sql);
        $return = array ();
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