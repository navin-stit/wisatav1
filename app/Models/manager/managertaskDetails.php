<?php

namespace App\Models\manager;
use App\Models\manager\managertaskHistoricals;

use Illuminate\Database\Eloquent\Model;

class managertaskDetails extends Model
{
    
    public function manager_historical() 
    {
        return $this->hasOne(managertaskHistoricals::class, 'managerweeklyheaderid', 'managerweeklyheaderid');
    }


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'manager_weekly_details';
    
    
    /**
     * The attributes to be fillable from the model.
     *
     * A dirty hack to allow fields to be fillable by calling empty fillable array
     *
     * @var array
     */
   //use Taggable;

    protected $fillable = [
        
        'managerweeklyheaderid',     
        'description', 
        'iscompleted',
        'completedon',
        'completedbyid',
        'createdbyid'   
    ];
    
    //protected $guarded = ['id'];
}
