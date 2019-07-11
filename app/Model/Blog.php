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


    public $incrementing = true;

    public $timestamps = false;

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'id';
    protected $fillable = array(
        'title', 
        'content', 
        'id_author',
        'id'
    );

    public function author()
    {
        //     $this->belongsTo(<Tên Model>        , <Khoá ngoại>, <khoá chính của model Blog>)
        return $this->belongsTo('\App\Model\Author', 'id_author', 'id');
    }
}
?>