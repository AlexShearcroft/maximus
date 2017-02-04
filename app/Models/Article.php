<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Article extends Model {

    /**
     * Fillable fields for an article
     *
     * @var array
     */
	protected $fillable = [
        'title',
        'body',
        'published_at'
    ];
    
    /**
     * Additional fields to treat as carbon instances
     *
     * @var array
     */
    protected $dates = ['published_at'];
    
    /**
     * Scope queries to articles that have been published
     *
     * @param $query
     */
    public function scopePublished($query) 
    {
        $query->where('published_at', '<=', Carbon::now());
    }
    
    /**
     * Scope queries to articles that have been unpublished
     *
     * @param $query
     */
    public function scopeUnpublished($query) 
    {
        $query->where('published_at', '>', Carbon::now());
    }
    
    // setNameAttribute
    /**
     * Set the published_at attribute
     *
     * @param $date
     */  
    public function setPublishedAtAttribute($date)
    {
    
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        //$this->attributes['published_at'] = Carbon::parse($date);
        
    }
    
    // getNameAttribute
    /**
     * Get the published_at attribute
     *
     * @param $date
     */  
    public function getPublishedAtAttribute($date)
    {
    
        return Carbon::parse($date)->format('Y-m-d');
        //$this->attributes['published_at'] = Carbon::parse($date);
        
    }
    
    /**
     * An article is owned by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    /**
     * Get the tags associated with the given article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tags')->withTimeStamps();
    }
    
    /**
     * Get a list of tag ids associated with the current article
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }

}
