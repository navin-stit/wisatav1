<?php

namespace App\Models\frontdesk;

use Illuminate\Database\Eloquent\Model;

class frontdeskHistoricals extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'front_desk_daily_historicals';
    
    
    /**
     * The attributes to be fillable from the model.
     *
     * A dirty hack to allow fields to be fillable by calling empty fillable array
     *
     * @var array
     */
    use Taggable;

    protected $fillable = [
        
        'frontdeskdailydetailid',     
        'frontdeskdailyheaderid',     
        'description',     
        'createdbyid'     
    ];
}
