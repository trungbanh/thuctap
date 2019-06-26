<?php 
    namespace Blog\Reponsitory;

    use \Blog\Model\AuthorModel;
    use \Zend\Db\Adapter\Driver\ResultInterface;
    use \Zend\Db\ResultSet\HydratingResultSet;
    use \Zend\Hydrator\ClassMethodsHydrator;
    use \Zend\Db\Sql\Sql;



class AuthorReponsitory extends \Blog\data\MysqlDB {

    /**
     * @return null
     */
    public function detail ($id) {
        $sql    = new Sql($this->adapter);
        $select = $sql->select();
        $select->columns(['nickname','mail']);
        $select->where(['id='.$id]);
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        if ($results) {
            foreach($results as $result) {
                return $result;
            }
        }

        return null;
    }

    public function updateDetail($detail) {
        // die(var_dump($detail));
        $sql    = new Sql($this->adapter);
        $update = $sql->update();
        $update->table('Author');
        $update->set(['nickname' => $detail->getNickname(), 'mail' => $detail->getMail(), 'passwork'=>  $detail->getPassword()]);
        $update->where(['idAuthor=' . $detail->getIdAuthor()]);
        $statement = $sql->prepareStatementForSqlObject($update);
        $results = $statement->execute();
        if ($results) {
            return true;
        }
        
        return false;
    }

    /**
     * return null|array|
     */
    public function all () {
        $stmt = $this->adapter->query("SELECT `nickname`, `idAuthor` FROM Author");
        $result = $stmt->execute();
        $stmt->close();
        if ($result) {
            return $result;
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function insert(AuthorModel $author) {
        $name = $author->nickName;
        $mail = $author->mail;
        $pass = $author->password;

        $sql    = new Sql($this->adapter);
        $insert = $sql->insert();
        $insert->values(['passwork'=>$pass,'nickname'=>$name,'mail'=>$mail]);
        $insert->into('Author');
        $statement = $sql->prepareStatementForSqlObject($insert);
        $results = $statement->execute();
        if ($results) {
            return true;
        }

        return false;
    }

    /**
     * @return null|AuthorModel
     */
    public function login ($mail, $pass) {
        $sql    = new Sql($this->adapter);
        $select = $sql->select();
        $select->columns(['idAuthor','passwork','nickname','mail']);
        $select->from('Author');
        $select->where(['mail' => $mail]);
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        if ($results instanceof ResultInterface && $results->isQueryResult()) {
            $resultSet = new HydratingResultSet(new ClassMethodsHydrator, new AuthorModel);
            $resultSet->initialize($results);
            if ($resultSet) {
                foreach ($resultSet as $re){
                    if ($re->passwork == $pass){
                        return $re;
                    }
                }
            }
        }

        return null;
    }

    public function checkPass ($id,$pass) {
        $sql    = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('Author');
        $select->where('idAuthor='. $id);
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        if ($results instanceof ResultInterface && $results->isQueryResult()) {
            $resultSet = new HydratingResultSet(new ClassMethodsHydrator, new AuthorModel);
            $resultSet->initialize($results);
            if ($resultSet) {
                foreach ($resultSet as $re){
                    if ($re->passwork == $pass){
                        return $re;
                    }
                }
            }
        }
        return null;
    }

    public function checkMail($mail) {
        $sql    = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('Author');
        
        $select->where("mail='".$mail."'");
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        if ($results instanceof ResultInterface && $results->isQueryResult()) {
            $resultSet = new HydratingResultSet(new ClassMethodsHydrator, new AuthorModel);
            $resultSet->initialize($results);
            foreach ($resultSet as $re){
                if ($re) {
                    return true;
                
                }
            }
            
        }
        return false;
    }
}