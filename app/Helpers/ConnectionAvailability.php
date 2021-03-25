<?php
/**
 * User: Abdelaziz
 * Date: 3/25/2021
 * Time: 11:42 PM
 */

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

/**
 * @Author Abdelaziz Omar <Abdelazizomar851@gmail.com>
 * @package App\Helpers
 */
class ConnectionAvailability
{
    public static function sqlConnectionAvailability($host , $username , $password) : bool
    {
        DBConnection::validateConnection($host , $username , $password);
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

            $fp = fsockopen($host, $port, $errno, $errstr, 6);
            return  true;

        }
        catch (\Exception $ex) {

            return  false;

        }
    }
}
