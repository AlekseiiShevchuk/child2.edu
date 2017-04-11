<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lesson
 *
 * @package App
 * @property string $title
 * @property string $description
 * @property string $category
*/
class Lesson extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'description', 'category_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCategoryIdAttribute($input)
    {
        $this->attributes['category_id'] = $input ? $input : null;
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }

    public function slides()
    {
        return $this->hasMany(Slide::class);
    }
    
}
