<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/11/15
 * Time: 09:03
 */

namespace TelzirApp\Services;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use TelzirApp\Repositories\PlanosRepository;

class PlanosService
{

    protected $repository;

    public function __construct(PlanosRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function array_coalesce($key, $array, $default = "null", $only_number=false)
    {
        $value = $default;

        if (array_key_exists($key, $array))
        {
            $value = ($only_number === false) ? $array[$key] : preg_replace('/[^0-9]/','', $array[$key]);
        }

        return  $value;
    }

    public function getConsumption($data=null)
    {

        if (is_null($data) || !is_array($data))
        {
            return false;
        }

        $messages = [
            'ddd_origin' => 'The ddd origin field is required',
            'ddd_receiver' => 'The ddd receiver field is required',
            'minutes' => 'The minutes field is required',
            'plan' => 'The plan field is required'
        ];

        $validator = Validator::make($data,
            [
               'ddd_origin' => 'required|integer',
               'ddd_receiver' => 'required|integer',
               'minutes' => 'required|integer',
               'plan' => 'required|integer',

            ], $messages);

        if ($validator->fails()===true)
        {
            return ["error"=>$validator->errors()];
        }

        try{

            $minutes = $data['minutes'];
            $plan = $data['plan'];
            $ddd_origin = $data['ddd_origin'];
            $ddd_receiver = $data['ddd_receiver'];


            $results = DB::select(DB::raw("select
                if (pc.flag_cursor = 0, u1.code, u2.code) as origin,
                if (pc.flag_cursor = 1, u1.code, u2.code) as destination,
                pc.time, pl.name,
                if (pc.time < {$minutes} and pc.rate_min_with > 0, pc.rate_min_with + ((pc.rate_min_with * 0.10) * ({$minutes}-pc.time)), pc.rate_min_with) as val_with,
                if (pc.time < {$minutes} and pc.rate_min_without > 0, ((pc.rate_min_without * 0.10) * ({$minutes}-pc.time))+pc.rate_min_without , pc.rate_min_without) as val_without
                from phone_calls pc
                left join plans pl
                on pl.id = pc.plans_id
                left join rates ra
                on ra.id = pc.rates_id
                left join areas u1 on (u1.id = ra.area_origin_id)
                left join areas u2 on (u2.id = ra.area_destination_id)
                where pl.id = {$plan} and ra.area_origin_id = {$ddd_origin} and ra.area_destination_id = {$ddd_receiver}"));

        }
        catch(\Exception $e)
        {
            return ['error'=>$e->getMessage()];
        }
        return $results;



    }

}