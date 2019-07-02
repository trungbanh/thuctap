<?php 
namespace App\Model;

use \Illuminate\Database\Eloquent\Model;

class Blog extends Model 
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MyBlog';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'id';
    protected $fillable = array(
        'title', 
        'content', 
        'author',
        'id'
    );
}
?>