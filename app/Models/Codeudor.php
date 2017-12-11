<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Codeudor
 * @package App\Models
 * @version November 29, 2017, 12:42 am UTC
 *
 * @property \App\Models\Persona persona
 * @property \Illuminate\Database\Eloquent\Collection prestamos
 * @property \Illuminate\Database\Eloquent\Collection Referencia
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string cedula
 * @property string nombres
 * @property string direccion_casa
 * @property string direccion_trabajo
 * @property string oficio
 * @property string telefono
 * @property string celular
 * @property integer personas_id
 */
class Codeudor extends Model
{
    use SoftDeletes;

    public $table = 'codeudores';
    
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
        'personas_id',
        'url_cedula',
        'url_carta_laboral'
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
        'personas_id' => 'integer'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function referencias()
    {
        return $this->hasMany(\App\Models\Referencia::class);
    }
}
