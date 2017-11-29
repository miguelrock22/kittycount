<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Persona
 * @package App\Models
 * @version November 29, 2017, 12:40 am UTC
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection Codeudore
 * @property \Illuminate\Database\Eloquent\Collection Historiale
 * @property \Illuminate\Database\Eloquent\Collection Prestamo
 * @property \Illuminate\Database\Eloquent\Collection Referencia
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string cedula
 * @property string nombres
 * @property string direccion_casa
 * @property string direccion_trabajo
 * @property string oficio
 * @property string telefono
 * @property string celular
 * @property string url_cedula
 * @property string url_carta_laboral
 * @property integer user_id
 */
class Persona extends Model
{
    use SoftDeletes;

    public $table = 'personas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cedula',
        'nombres',
        'direccion_casa',
        'direccion_trabajo',
        'oficio',
        'telefono',
        'celular',
        'url_cedula',
        'url_carta_laboral',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cedula' => 'string',
        'nombres' => 'string',
        'direccion_casa' => 'string',
        'direccion_trabajo' => 'string',
        'oficio' => 'string',
        'telefono' => 'string',
        'celular' => 'string',
        'url_cedula' => 'string',
        'url_carta_laboral' => 'string',
        'user_id' => 'integer'
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
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function codeudores()
    {
        return $this->hasMany(\App\Models\Codeudor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function historiales()
    {
        return $this->hasMany(\App\Models\Historial::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function prestamos()
    {
        return $this->hasMany(\App\Models\Prestamo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function referencias()
    {
        return $this->hasMany(\App\Models\Referencia::class);
    }
}
