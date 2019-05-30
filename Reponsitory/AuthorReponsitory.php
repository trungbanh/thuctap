<?php 
    namespace Blog\Reponsitory;

    use \Blog\Model\AuthorModel;

class AuthorReponsitory extends \Blog\data\MysqlDB {

    public function detail ($id) {
        $stmt = $this->conn->prepare("SELECT `nickname`, `idAuthor` FROM Author WHERE id= ?");
        $stmt->bind_param('i',$id);
        $result = $stmt->execute();
        $stmt->close();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function all () {
        $stmt = $this->conn->prepare("SELECT `nickname`, `idAuthor` FROM Author");
        $result = $stmt->execute();
        $stmt->close();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function insert(AuthorModel $author) {
        $name = $author->getNickName();
        $mail = $author->getMail();
        $pass = $author->getPassword();
        $stmt = $this->conn->prepare("INSERT INTO Author (`nickname`, `mail`, `passwork`) VALUES (?,?,?)");
        $stmt->bind_param("sss",$name,$mail,$pass);
        $result = $stmt->execute();
        $stmt->close();
        if ($result) {
            return $this->theLastId();
        } else {
            return false;
        }
    }

    public function login ($mail,$pass) {
        $stmt = $this->conn->prepare("SELECT `idAuthor`, `passwork` FROM Author WHERE mail= ?");
        $stmt->bind_param("s",$mail);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                if ($row['passwork']===$pass){
                    return $row['idAuthor'];
                } else {
                    return false;
                }
            }
        }
    }

    public function checkMail($mail) {

        $stmt = $this->conn->prepare("SELECT idAuthor FROM Author WHERE mail= ?;");
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->num_rows > 0){
            return true ;
        }
        return false;
    }
}