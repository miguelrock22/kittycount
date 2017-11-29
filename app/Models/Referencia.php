<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Referencia
 * @package App\Models
 * @version November 29, 2017, 12:43 am UTC
 *
 * @property \App\Models\Codeudore codeudore
 * @property \App\Models\Persona persona
 * @property \Illuminate\Database\Eloquent\Collection prestamos
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string nombres
 * @property string telefonos
 * @property string parentesco
 * @property integer personas_id
 * @property integer codeudores_id
 */
class Referencia extends Model
{
    use SoftDeletes;

    public $table = 'referencias';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombres',
        'telefonos',
        'parentesco',
        'personas_id',
        'codeudores_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombres' => 'string',
        'telefonos' => 'string',
        'parentesco' => 'string',
        'personas_id' => 'integer',
        'codeudores_id' => 'integer'
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
    public function codeudor()
    {
        return $this->belongsTo(\App\Models\Codeudor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class);
    }
}
