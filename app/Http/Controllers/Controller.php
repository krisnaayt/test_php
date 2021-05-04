<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DateTime;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function convertToViewDate($date){
        $dateFormat = DateTime::createFromFormat('Y-m-d', $date);
        return $dateFormat->format('d/m/Y');
    }

    public function convertToDBDate($date){
        $dateFormat = DateTime::createFromFormat('d/m/Y', $date);
        return $dateFormat->format('Y-m-d'); 
    }


    public function convertToViewDateTime($date){
        $dateFormat = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $dateFormat->format('d/m/Y H:i');
    }

    public function convertToDBDateTime($date){
        $dateFormat = DateTime::createFromFormat('d/m/Y H:i', $date);
        return $dateFormat->format('Y-m-d H:i:s'); 
    }
}
