<?php
/**
 * User: Abdelaziz
 * Date: 4/13/2021
 * Time: 11:42 AM
 */

namespace App\Services;

/**
 * @Author Abdelaziz Omar <Abdelazizomar851@gmail.com>
 * @package App\Services
 */
class PackagePrice
{
    public static function getPackagePrice(int $amount) : int
    {

        $price = 0;

        switch ($amount)
        {

            case  400 :
                    $price = 25;
                break;
            case  1200 :
                $price = 75;
                break;
            case  2400 :
                $price = 150;
                break;
            case  4800 :
                $price = 300;
                break;
            default :
                $price = 25;
                break;


        }

        return  $price ;
    }
}
