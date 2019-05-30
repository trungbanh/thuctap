<?php namespace Blog\Reponsitory;
use \Blog\Model\BlogModel;
use \Blog\data\MysqlDB;
/**
 * BlogRepository is a class to connect mysql database 
 * 
 */
class BlogReponsitory extends MysqlDB {

    /**
     * Insert new blog to database 
     * 
     * @param BlogModel (Title, Content, author) id can null
     * 
     * @return boolean 
     * 
     */
    public function insert(BlogModel $blog) {
        
        $title = $blog->title;
        $content = $blog->content;
        $author = $blog->idAuthor;

        $stmt = $this->conn->prepare("INSERT INTO MyBlog (Title, Content, author) VALUES (?,?,?)");
        $stmt->bind_param("ssi",$title,$content,$author);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            return $this->theLastId();
        } else {
            return false;
        }
    }
    /**
     * Update Blog 
     * 
     * @param array ( String title, String content, Int id )
     * 
     * @return boolean 
     */
    public function update($data = array()) {

        $updateSql = '';
        $typeParams = '';
        $bindParams = array();
        $valueParams = array();

        if (!empty($data)){
            $fields = array('title', 'content');

            if (isset($data['title'])){
                $valueParams[] = " Title = ?";
                $typeParams .= 's';
                $bindParams[] = $data['title'];
            }
                
            if (isset($data['content'])) {
                $valueParams[] = " Content = ?";
                $typeParams .= 's';
                $bindParams[] = $data['content'];
            }

        }
        
        if (!empty($valueParams)) {
            $updateSql = implode(', ', $valueParams);
        }
        
        $id = $data['id'];
        $typeParams .= 'i';
        $bindParams[] = $id;

        if (empty($updateSql)) {
            return false;
        }

        $rawSQL = "UPDATE MyBlog SET {$updateSql} WHERE id = ?";
        $stmt = $this->conn->prepare($rawSQL);

        if ($stmt) {
            return false;
        }


        array_unshift($bindParams, $typeParams);

        // die("UPDATE MyBlog SET {$updateSql} WHERE id = ?"); ssi 
        call_user_func_array(array($stmt,'bind_param'),array($bindParams));

        if (!$stmt->execute()) {
            die(var_dump($stmt->error));
        } 
        $result = $stmt->get_result();
       
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param id Int 
     * 
     * @return boolean 
     * 
     */
    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM MyBlog WHERE id =?;");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param none parameter
     * 
     * @return false if fail query, array(BlogModel) if success  
     * 
     */
    public function getList() {
        $return = array();
        $stmt = $this->conn->prepare("SELECT * FROM MyBlog;");
        $stmt->execute();
        $result = $stmt->get_result();
    
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
    
    /**
    * 
    * @param id Int 
    * 
    * @return false if fail query, array(BlogModel) if success  
    * 
    */
    public function getDetail($id) {
        $stmt = $this->conn->prepare("SELECT * FROM MyBlog WHERE id=?;");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
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