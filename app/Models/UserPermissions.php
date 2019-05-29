<?php

namespace App\Models;
use App\Models\User;
use App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class UserPermissions extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    
    protected $table = 'user_permissions';

    /**
     * The attributes to be fillable from the model.
     *
     * A dirty hack to allow fields to be fillable by calling empty fillable array
     *
     * @var array
     */
   // use Taggable;

    protected $fillable = [
        
        'moduleid',
        'userid',
        'view',
        'add',
        'edit',
        'delete'
    ];
    
    protected $guarded = ['id'];

}
