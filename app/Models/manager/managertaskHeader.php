<?php

namespace App\Models\manager;
use App\Models\manager\managertaskDetails;
use App\Models\manager\managertaskHistoricals;
use Illuminate\Database\Eloquent\Model;

class managertaskHeader extends Model
{
    
    public function managerTaskDetails() 
    {
        return $this->hasMany(managerTaskDetails::class, 'managerweeklyheaderid', 'managerweeklyheaderid');
    }
    
    public function managerTaskHistoricals() 
    {
        return $this->hasMany(managerTaskHistoricals::class, 'managerweeklyheaderid', 'managerweeklyheaderid');
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'manager_weekly_headers';
    
    
    /**
     * The attributes to be fillable from the model.
     *
     * A dirty hack to allow fields to be fillable by calling empty fillable array
     *
     * @var array
     */
    //use Taggable;

    protected $fillable = [
        
        'managerweeklydate',     
        'managerweeklytitle',     
        'createdbyid'     
    ];
    
}
