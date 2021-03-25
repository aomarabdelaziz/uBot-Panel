<?php
/**
 * User: Abdelaziz
 * Date: 3/24/2021
 * Time: 10:19 PM
 */

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

/**
 * @Author Abdelaziz Omar <Abdelazizomar851@gmail.com>
 * @package App\Helpers
 */
class DBConnection
{

    public static function setConnection(): void
    {
        DB::purge('sqlsrv_user');

        $ip_port = explode(',', auth()->user()->projects->sql_host);
        config(
            [
                'database.connections.sqlsrv_user' => [
                    'driver' => 'sqlsrv',
                    "host" => $ip_port[0],
                    "port" => $ip_port[1],
                    "database" => 'uBot3',
                    "username" => auth()->user()->projects->sql_username,
                    "password" => auth()->user()->projects->sql_password
                ]
            ]
        );


        // dd(Config::get('database.connections.sqlsrv_user'));
        /*  DB::purge('sqlsrv_user');
          DB::reconnect('sqlsrv_user');*/
    }

    public static function validateConnection($host, $username, $password): void
    {
        DB::purge('sqlsrv_user');
        $ip_port = explode(',', $host);
        config(
            [
                'database.connections.sqlsrv_user' => [
                    'driver' => 'sqlsrv',
                    "host" => $ip_port[0],
                    "port" => $ip_port[1],
                    "database" => 'uBot3',
                    "username" => $username,
                    "password" => $password,
                ]
            ]
        );
    }
}
