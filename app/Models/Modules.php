<?php

namespace App\Models;
use App\Models\UserPermissions;
use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    
    public function userPermission() {
        return $this->hasMany(UserPermissions::class, 'moduleid', 'moduleid');
    }
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modules';
    
    
    /**
     * The attributes to be fillable from the model.
     *
     * A dirty hack to allow fields to be fillable by calling empty fillable array
     *
     * @var array
     */
    use Taggable;

    protected $fillable = [
        
        'modulename'     
    ];
    
    //protected $guarded = ['id'];
}
