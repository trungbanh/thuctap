<?php 
    namespace Blog\Reponsitory;

    use \Blog\Model\AuthorModel;
    use \Zend\Db\Adapter\Driver\ResultInterface;
    use \Zend\Db\ResultSet\HydratingResultSet;
    use \Zend\Hydrator\ClassMethodsHydrator;
    use \Zend\Db\Sql\Sql;



class AuthorReponsitory extends \Blog\data\MysqlDB {

    public function detail ($id) {

        $sql    = new Sql($this->adapter);
        $select = $sql->select();
        $select->columns(['nickname','mail']);
        $select->where(['id='.$id]);
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        if ($results) {
            foreach($results as $result):
                return $result;
            endforeach;
        } else {
            return false;
        }

        // $stmt = $this->adapter->prepare("SELECT `nickname`, `mail` FROM Author WHERE id= ?");
        // $stmt->bind_param('i',$id);
        // $result = $stmt->execute();
        // $stmt->close();
        // if ($result) {
        //     return $result;
        // } else {
        //     return false;
        // }
    }

    public function updateDetail($detail) {
        $sql    = new Sql($this->adapter);
        $update = $sql->update();
        $update->table('Author');
        $update->set(['nickname'=>$detail->nickname,'mail'=>$detail->mail]);
        $update->where(['idAuthor='.$detail->id_author]);
        $statement = $sql->prepareStatementForSqlObject($update);
        $results = $statement->execute();
        if ($results) {
            return true;
        } else {
            return false;
        }

    }

    public function all () {
        $stmt = $this->adapter->query("SELECT `nickname`, `idAuthor` FROM Author");
        $result = $stmt->execute();
        $stmt->close();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

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
        } else {
            return null;
        }
    

        // $stmt = $this->adapter->prepare("INSERT INTO Author (`nickname`, `mail`, `passwork`) VALUES (?,?,?)");
        // $stmt->bind_param("sss",$name,$mail,$pass);
        // $result = $stmt->execute();
        // $stmt->close();
        // if ($result) {
        //     return $this->theLastId();
        // } else {
        //     return false;
        // }
    }

    public function login ($mail,$pass) {
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
                return null;
            } else {
                return null;
            }
        }
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
                return null;
            } else {
                return null;
            }
        }
    }

    public function checkMail($mail) {

        // $stmt = $this->adapter->prepare("SELECT idAuthor FROM Author WHERE mail= ?;");
        // $stmt->bind_param("s", $mail);
        // $stmt->execute();
        // $result = $stmt->get_result();
        // $stmt->close();
        // if ($result->num_rows > 0){
        //     return true ;
        // }
        // return false;
    }
}