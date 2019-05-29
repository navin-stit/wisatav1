<?php

namespace App\Models\logbook;
use App\Models\logbook\logbookDetails;
use App\Models\logbook\logbookHistoricals;
use Illuminate\Database\Eloquent\Model;

class logbookHeader extends Model
{
    
    public function logbookDetails() 
    {
        return $this->hasMany(logbookDetails::class, 'logbookheaderid', 'logbookheaderid');
    }
    
    public function logbookHistorical() 
    {
        return $this->hasMany(logbookHistoricals::class, 'logbookheaderid', 'logbookheaderid');
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_book_headers';
    
    
    /**
     * The attributes to be fillable from the model.
     *
     * A dirty hack to allow fields to be fillable by calling empty fillable array
     *
     * @var array
     */
    //use Taggable;

    protected $fillable = [
        
        'logbookdate',     
        'logbooktitle',     
        'createdbyid'     
    ];
    
}
