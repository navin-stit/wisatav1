<?php

namespace App\Models\manager;

use Illuminate\Database\Eloquent\Model;

class managertaskHistoricals extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'manager_weekly_historicals';
    
    
    /**
     * The attributes to be fillable from the model.
     *
     * A dirty hack to allow fields to be fillable by calling empty fillable array
     *
     * @var array
     */
    use Taggable;

    protected $fillable = [
        
        'managerweeklydetailid',     
        'managerweeklyheaderid',     
        'description',     
        'createdbyid'     
    ];
}
