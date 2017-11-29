<?php

namespace App\Repositories;

use App\Models\Prestamo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PrestamoRepository
 * @package App\Repositories
 * @version November 29, 2017, 12:43 am UTC
 *
 * @method Prestamo findWithoutFail($id, $columns = ['*'])
 * @method Prestamo find($id, $columns = ['*'])
 * @method Prestamo first($columns = ['*'])
*/
class PrestamoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Prestamo::class;
    }
}
