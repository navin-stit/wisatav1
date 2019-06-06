<?php

namespace App\Models\frontdesk;
use App\Models\frontdesk\frontdeskDetails;
use App\Models\frontdesk\frontdeskHistoricals;
use Illuminate\Database\Eloquent\Model;

class frontdeskHeader extends Model
{
    
    public function frontdeskDetails() 
    {
        return $this->hasMany(frontdeskDetails::class, 'frontdeskdailyheaderid', 'frontdeskdailyheaderid');
    }
    
    public function frontdeskHistoricals() 
    {
        return $this->hasMany(frontdeskHistoricals::class, 'frontdeskdailyheaderid', 'frontdeskdailyheaderid');
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'front_desk_daily_headers';
    
    
    /**
     * The attributes to be fillable from the model.
     *
     * A dirty hack to allow fields to be fillable by calling empty fillable array
     *
     * @var array
     */
    //use Taggable;

    protected $fillable = [
        
        'frontdeskdailydate',     
        'frontdeskdailytitle',     
        'createdbyid'     
    ];
    
}
