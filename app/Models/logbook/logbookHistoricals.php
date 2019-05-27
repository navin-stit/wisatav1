<?php

namespace App\Models\logbook;

use Illuminate\Database\Eloquent\Model;

class logbookHistoricals extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_book_historicals';
    
    
    /**
     * The attributes to be fillable from the model.
     *
     * A dirty hack to allow fields to be fillable by calling empty fillable array
     *
     * @var array
     */
    use Taggable;

    protected $fillable = [
        
        'logbookdetailid',     
        'logbookheaderid',     
        'notes',     
        'createdbyid'     
    ];
}
