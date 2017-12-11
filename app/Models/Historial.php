<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Historial
 * @package App\Models
 * @version November 29, 2017, 12:44 am UTC
 *
 * @property \App\Models\Persona persona
 * @property \App\Models\Prestamo prestamo
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection prestamos
 * @property \Illuminate\Database\Eloquent\Collection referencias
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property float total_cobrado
 * @property string cuotas
 * @property string observacion
 * @property integer personas_id
 * @property integer users_id
 * @property integer prestamos_id
 */
class Historial extends Model
{
    use SoftDeletes;

    public $table = 'historiales';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'total_cobrado',
        'cuotas',
        'observacion',
        'personas_id',
        'users_id',
        'prestamos_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'total_cobrado' => 'float',
        'cuotas' => 'string',
        'observacion' => 'string',
        'personas_id' => 'integer',
        'users_id' => 'integer',
        'prestamos_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class, 'personas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function prestamo()
    {
        return $this->belongsTo(\App\Models\Prestamo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'users_id');
    }
}
