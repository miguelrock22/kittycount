<?php

namespace App\Repositories;

use App\Models\Historial;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HistorialRepository
 * @package App\Repositories
 * @version November 29, 2017, 12:44 am UTC
 *
 * @method Historial findWithoutFail($id, $columns = ['*'])
 * @method Historial find($id, $columns = ['*'])
 * @method Historial first($columns = ['*'])
*/
class HistorialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'total_cobrado',
        'cuotas',
        'observacion',
        'personas_id',
        'users_id',
        'prestamos_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Historial::class;
    }
}
