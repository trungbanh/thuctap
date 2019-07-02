<?php 

namespace App\Model;

use \Illuminate\Database\Eloquent\Model;

class Author extends Model 
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Author';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'id_author';


    protected $fillable = array(
        'nickname', 
        'mail', 
        'password', 
        'id_author'
    );

    public static function hashpass ($pass){
        return hash('md5',$pass,TRUE);
    }

    public function setPassword($pass)
    {
        $this->attributes['password'] = AuthorModel::hashpass($pass);
        return $this;
    }
}
?>
