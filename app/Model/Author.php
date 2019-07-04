<?php 

namespace App\Model;

use \Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class Author extends Model {

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
    protected $primaryKey = 'id';


    protected $fillable = array(
        'nickname', 
        'mail', 
        'password', 
        'id'
    );

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public $timestamps = false;

    public static function hashpass ($pass){
        return Hash::make($pass);
    }

    public static function check($pass,$hass) {
        if (Hash::check($pass,$hass)) {
            return true;
        }

        return false;
    }

    public function setPassword($pass)
    {
        $this->attributes['password'] = AuthorModel::hashpass($pass);
        return $this;
    }
}
?>
