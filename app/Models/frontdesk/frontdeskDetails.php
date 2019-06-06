<?php

namespace App\Models\frontdesk;
use App\Models\frontdesk\frontdeskHistoricals;
use Illuminate\Database\Eloquent\Model;

class frontdeskDetails extends Model
{
    
    public function frontdeskHistoricals() 
    {
        return $this->hasOne(frontdeskHistoricals::class, 'frontdeskdailyheaderid', 'frontdeskdailyheaderid');
    }


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'front_desk_daily_details';
    
    
    /**
     * The attributes to be fillable from the model.
     *
     * A dirty hack to allow fields to be fillable by calling empty fillable array
     *
     * @var array
     */
   //use Taggable;

    protected $fillable = [
        
        'frontdeskdailyheaderid',     
        'description',     
        'createdbyid'     
    ];
    
    //protected $guarded = ['id'];
}
