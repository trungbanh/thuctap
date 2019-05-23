<?php
require_once(ROOT_PATH.'/data/Mysql.php');


class AuthorRepository extends MysqlDB {
    public function insert(AuthorModel $author) {
        $name = $author->getNickName();
        $mail = $author->getMail();
        $pass = $author->getPassword();
        $sql = "INSERT INTO Author (nickname, mail, passwork) VALUES ('".$name."', '".$mail."', '".$pass."');";

        $result = $this->query($sql);

        if ($result) {
            echo "New record created successfully";
        }
    }

    public function login ($mail,$pass) {
        $sql = "select idAuthor, passwork from Author where mail='". $mail."';";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['passwork']===$pass){
                    return $row['idAuthor'];
                } else {
                    die('not okey');
                }
            }
        }
    }
}