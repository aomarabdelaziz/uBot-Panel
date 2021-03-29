<?php
/**
 * User: Abdelaziz
 * Date: 3/25/2021
 * Time: 11:42 PM
 */

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @Author Abdelaziz Omar <Abdelazizomar851@gmail.com>
 * @package App\Helpers
 */
class ConnectionAvailabilityService
{

    public static function sqlConnectionAvailability($host , $username , $password) : bool
    {
        DBConnectionService::validateConnection($host , $username , $password);
        try {


            DB::connection('sqlsrv_user')->getPdo();
            return true;

        }
        catch (\Exception $ex) {

           return false;
        }

    }

    public static function serverConnectionAvailability($host , $port) : bool
    {
        try {

            $fp = fsockopen($host, $port, $errno, $errstr, 1);
            return  true;

        }
        catch (\Exception $ex) {

            return  false;

        }
    }


    public static function checkUserSqlConnectionAvailability() : bool
    {

        try {

            DBConnectionService::setConnection();
            DB::connection('sqlsrv_user')->getPdo();

            return true;


        }
        catch (\Exception $ex) {

            return false;
        }



    }
}
