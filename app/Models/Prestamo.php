<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Prestamo
 * @package App\Models
 * @version November 29, 2017, 12:43 am UTC
 *
 * @property \App\Models\Persona persona
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection Historiale
 * @property \Illuminate\Database\Eloquent\Collection referencias
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property float prestamo
 * @property string porcentage
 * @property float total_cobrar
 * @property string dia_cobro
 * @property date dia_solicitud
 * @property boolean estado
 * @property string cuotas
 * @property float valor_cuota
 * @property string observacion
 * @property integer personas_id
 * @property integer users_id
 */
class Prestamo extends Model
{
    use SoftDeletes;

    public $table = 'prestamos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'prestamo',
        'porcentage',
        'total_cobrar',
        'dia_cobro',
        'dia_solicitud',
        'estado',
        'cuotas',
        'valor_cuota',
        'observacion',
        'personas_id',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'prestamo' => 'float',
        'porcentage' => 'string',
        'total_cobrar' => 'float',
        'dia_cobro' => 'date',
        'dia_cobro_2' => 'date',
        'dia_solicitud' => 'date',
        'estado' => 'boolean',
        'cuotas' => 'string',
        'valor_cuota' => 'float',
        'observacion' => 'string',
        'personas_id' => 'integer',
        'users_id' => 'integer'
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
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'users_id' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function historiales()
    {
        return $this->hasMany(\App\Models\Historial::class);
    }
}
