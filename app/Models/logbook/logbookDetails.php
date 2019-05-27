<?php

namespace App\Models\logbook;
use App\Models\logbook\logbookHistoricals;

use Illuminate\Database\Eloquent\Model;

class logbookDetails extends Model
{
    
    public function logbook_historical() 
    {
        return $this->hasOne(logbookHistoricals::class, 'logbookdetailid', 'logbookdetailid');
    }


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_book_details';
    
    
    /**
     * The attributes to be fillable from the model.
     *
     * A dirty hack to allow fields to be fillable by calling empty fillable array
     *
     * @var array
     */
   //use Taggable;

    protected $fillable = [
        
        'logbookheaderid',     
        'notes',     
        'createdbyid'     
    ];
    
    //protected $guarded = ['id'];
}
