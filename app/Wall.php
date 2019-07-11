<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: master
 * Date: 7/10/19
 * Time: 10:03 PM
 */
class Wall extends Model{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'wall_content', 'user_id',
    ];
    /**
     * @var string name of the table
     */
    protected $table ="wall";
    protected $appends = ['user_name'];

    public function getUserNameAttribute()
    {
        return $this->user()->first()->name;
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
