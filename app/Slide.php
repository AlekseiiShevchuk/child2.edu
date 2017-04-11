<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slide
 *
 * @package App
 * @property enum $type
 * @property string $title
 * @property string $description
 * @property string $description_audio_file_path
 * @property string $media_content_description
 * @property string $media_content_description_audio_file_path
 * @property string $media_content_image_file_path
 * @property string $media_content_youtube_video
 * @property string $lesson
 * @property tinyInteger $is_active
 */
class Slide extends Model
{
    const GOOD_RESULT = 'Успешно пройден';
    const BAD_RESULT = 'Не пройден';
    const NO_RESULT = 'Этот тест еще не проходили';
    use SoftDeletes;

    protected $fillable = [
        'type',
        'title',
        'description',
        'description_audio_file_path',
        'media_content_description',
        'media_content_description_audio_file_path',
        'media_content_image_file_path',
        'media_content_youtube_video',
        'is_active',
        'lesson_id'
    ];


    public static $enum_type = ["presentation" => "presentation", "test" => "test"];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLessonIdAttribute($input)
    {
        $this->attributes['lesson_id'] = $input ? $input : null;
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id')->withTrashed();
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function correct_answers()
    {
        return $this->hasMany(Answer::class)->where('is_correct', 1);
    }

    public function getLastResultFromSession()
    {
        return request()->session()->get('slide_' . $this->id . '_last_result', self::NO_RESULT);
    }

    public function saveLastResultToSession($result)
    {
        request()->session()->put('slide_' . $this->id . '_last_result', $result);
    }


}
