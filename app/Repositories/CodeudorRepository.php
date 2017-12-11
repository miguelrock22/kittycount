<?php

namespace App\Repositories;

use App\Models\Codeudor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CodeudorRepository
 * @package App\Repositories
 * @version November 29, 2017, 12:42 am UTC
 *
 * @method Codeudor findWithoutFail($id, $columns = ['*'])
 * @method Codeudor find($id, $columns = ['*'])
 * @method Codeudor first($columns = ['*'])
*/
class CodeudorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Codeudor::class;
    }
}
