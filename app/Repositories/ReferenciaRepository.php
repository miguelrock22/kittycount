<?php

namespace App\Repositories;

use App\Models\Referencia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ReferenciaRepository
 * @package App\Repositories
 * @version November 29, 2017, 12:43 am UTC
 *
 * @method Referencia findWithoutFail($id, $columns = ['*'])
 * @method Referencia find($id, $columns = ['*'])
 * @method Referencia first($columns = ['*'])
*/
class ReferenciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombres',
        'direccion_casa',
        'direccion_trabajo',
        'telefono',
        'telefono_trabajo',
        'celular',
        'parentesco',
        'personas_id',
        'codeudores_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Referencia::class;
    }
}
