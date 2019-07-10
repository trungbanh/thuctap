<?php 

namespace App\Model;

use \Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Author extends Authenticatable {

    use Notifiable;
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

    public function getAuthIdentifierName() {
        return 'mail';
    }
    public function getAuthIdentifier() {
        return $this->{$this->getAuthIdentifierName()};;
    }

    /**
   * {@inheritDoc}
   * @see \Illuminate\Contracts\Auth\Authenticatable::getAuthPassword()
   */
    public function getAuthPassword()
    {
        return $this->password;
    }
 
    /**
     * {@inheritDoc}
     * @see \Illuminate\Contracts\Auth\Authenticatable::getRememberToken()
     */
    public function getRememberToken()
    {
        if (! empty($this->getRememberTokenName())) {
        return $this->{$this->getRememberTokenName()};
        }
    }
 
    /**
     * {@inheritDoc}
     * @see \Illuminate\Contracts\Auth\Authenticatable::setRememberToken()
     */
    public function setRememberToken($value)
    {
        if (! empty($this->getRememberTokenName())) {
        $this->{$this->getRememberTokenName()} = $value;
        }
    }
 
    /**
     * {@inheritDoc}
     * @see \Illuminate\Contracts\Auth\Authenticatable::getRememberTokenName()
     */
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }

}
?>
