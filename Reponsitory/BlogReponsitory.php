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
        } 

        return false;
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
        }

        return false;
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
        }
        
        return false;
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
            }
        }
        
        return null;
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
                foreach ( $resultSet as $result ) {
                    return $result;
                }
            } 
        }

        return null;
    }
}