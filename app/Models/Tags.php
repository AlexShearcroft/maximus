<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model {
    
    /**
     * Fillable fields for a tag
     *
     * @var array
     */
	protected $fillable = [
        'name'
    ];
    
    /**
     * Get the articles associated with the given tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    
	public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
    }

}
