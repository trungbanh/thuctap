<?php namespace Blog\Reponsitory;
use \Blog\Model\BlogModel;
use \Blog\data\MysqlDB;


use \Zend\Db\Adapter\Driver\ResultInterface;
use \Zend\Db\ResultSet\HydratingResultSet;
use \Zend\Hydrator\ClassMethodsHydrator;
use \Zend\Db\Sql\Sql;


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

        $sql    = new Sql($this->adapter);
        $insert = $sql->insert();
        $insert->into('MyBlog');
        $insert->columns(['Title','Content','author']);
        $insert->values([$title,
                        $content,
                        $author]);
        $statement = $sql->prepareStatementForSqlObject($insert);
        $result = $statement->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }

        // $stmt = $this->conn->prepare("INSERT INTO MyBlog (Title, Content, author) VALUES (?,?,?)");
        // $stmt->bind_param("ssi",$title,$content,$author);
        // $stmt->execute();
        // $result = $stmt->get_result();

        // if ($result) {
        //     return $this->theLastId();
        // } else {
        //     return false;
        // }
    }
    /**
     * Update Blog 
     * 
     * @param array ( String title, String content, Int id )
     * 
     * @return boolean 
     */
    public function update($data = array()) {

        $value = array();
        if (!empty($data)){
            if (isset($data['title'])){
                $value['Title'] = $data['title'];
            }
            if (isset($data['content'])) {
                $value['Content'] = $data['content'];
            }
        }
        $sql    = new Sql($this->adapter);
        $update = $sql->update();
        $update->table('MyBlog');
        $update->set($value);
        $update->where(['id='.$data['id']]);
        $statement = $sql->prepareStatementForSqlObject($update);
        $result = $statement->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }

        // $updateSql = '';
        // $typeParams = '';
        // $bindParams = array();
        // $valueParams = array();
        // if (!empty($data)){
        //     $fields = array('title', 'content');
        //     if (isset($data['title'])){
        //         $valueParams[] = " Title = ?";
        //         $typeParams .= 's';
        //         $bindParams[] = &$data['title'];
        //     }
        //     if (isset($data['content'])) {
        //         $valueParams[] = " Content = ?";
        //         $typeParams .= 's';
        //         $bindParams[] = &$data['content'];
        //     }
        // }
        // if (!empty($valueParams)) {
        //     $updateSql = implode(', ', $valueParams);
        // }
        // $id = $data['id'];
        // $typeParams .= 'i';
        // $bindParams[] = &$id;
        // if (empty($updateSql)) {
        //     return false;
        // }
        // $rawSQL = "UPDATE MyBlog SET {$updateSql} WHERE id = ?";
        // $stmt = $this->conn->prepare($rawSQL);
        // array_unshift($bindParams, $typeParams);
        // call_user_func_array(array($stmt,'bind_param'),$bindParams);
        // if (!$stmt->execute()) {
        //     die(var_dump($stmt->error));
        // } 
        // $result = $stmt->get_result();
       
        // if ($result) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    /**
     * 
     * @param id Int 
     * 
     * @return boolean 
     * 
     */
    public function delete($id){
        $sql    = new Sql($this->adapter);
        $delete = $sql->delete();
        $delete->from('MyBlog');
        $delete->where(['id='.$id]);
        $statement = $sql->prepareStatementForSqlObject($delete);
        $result = $statement->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
        // $stmt = $this->conn->prepare("DELETE FROM MyBlog WHERE id =?;");
        // $stmt->bind_param("i",$id);
        // $stmt->execute();
        // $result = $stmt->get_result();
        // if ($result) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    /**
     * 
     * @param none parameter
     * 
     * @return false if fail query, array(BlogModel) if success  
     * 
     */
    public function getList() {
        $sql    = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('MyBlog');
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        if ($results instanceof ResultInterface && $results->isQueryResult()) {
            $resultSet = new HydratingResultSet(new ClassMethodsHydrator, new BlogModel);
            $resultSet->initialize($results);
            if ($resultSet) {
                return $resultSet;
            } else {
                return null;
            }
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
        $sql    = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('MyBlog');
        $select->where(['id='.$id]);
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        if ($results instanceof ResultInterface && $results->isQueryResult()) {
            $resultSet = new HydratingResultSet(new ClassMethodsHydrator, new BlogModel);
            $resultSet->initialize($results);
            if ($resultSet) {
                return $resultSet;
            } else {
                return null;
            }
        }
    }
}