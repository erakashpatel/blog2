<?php

namespace App;
//use App\Mail\ProjectCreated;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
//use App\Events\ProjectCreated;


class Project extends Model
{
    protected $fillable = ['title','description','user_id','duration','difficulty'];

    // protected $dispatchEvents = [
    // 	'created' => ProjectCreated::class
    // ];
    
    // protected static function boot()
    // {
    // 	parent::boot();

    // 	static::created(function($project){
    // 		Mail::to($project->user->email)->send(
    //         new ProjectCreated($project)
    //     );
    // 	});

    // }
    public function user(){
		return $this->belongsTo('App\User','user_id');
	}
     public function scopeFilter($query,QueryFilter $filters)
    {  
        $query->where('user_id',Auth()->id());
        return $filters->apply($query);
    }

}
