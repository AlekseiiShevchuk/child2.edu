<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reactiontoanswer
 *
 * @package App
 * @property enum $type
 * @property string $title
 * @property string $description
 * @property string $image_path
 * @property string $youtube_video
 * @property string $audio_path
*/
class Reactiontoanswer extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['type', 'title', 'description', 'image_path', 'youtube_video', 'audio_path'];
    

    public static $enum_type = ["correct" => "correct", "incorrect" => "incorrect"];
    
}
