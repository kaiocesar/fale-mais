<?php

namespace TelzirApp\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use TelzirApp\Repositories\PlanosRepository;
use TelzirApp\Models\Plan;

/**
 * Class PlanosRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PlanosRepositoryEloquent extends BaseRepository implements PlanosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Plan::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
