<?php

namespace TelzirApp\Http\Controllers;

use Illuminate\Http\Request;
use TelzirApp\Http\Controllers\Controller;
use TelzirApp\Services\PlanosService;

class APIController extends Controller
{

    protected $servicePlan;

    public function __construct(PlanosService $servicePlan)
    {
        $this->servicePlan = $servicePlan;
    }

    public function getConsumption(Request $request)
    {
        $data = $request->all();
        return $this->servicePlan->getConsumption($data);
    }

    public function getDDD()
    {
        return $this->servicePlan->getDDD();
    }


}
