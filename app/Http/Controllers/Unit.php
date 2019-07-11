<?php

namespace App\Http\Controllers;

use \App\Model\Author ;


class Unit {

    public static function getNicknameById($id) {
        $author = Author::find($id);
        if ($author == null) {
            return array('nickname'=>'ẩn danh');
        }

        return array('nickname'=>$author->nickname);
    }

}