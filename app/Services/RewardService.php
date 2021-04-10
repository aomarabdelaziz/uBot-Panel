<?php
/**
 * User: Abdelaziz
 * Date: 3/29/2021
 * Time: 11:05 PM
 */

namespace App\Services;

/**
 * @Author Abdelaziz Omar <Abdelazizomar851@gmail.com>
 * @package App\Services
 */
class RewardService
{
    public static function getRewardType(int $rewardType) : string
    {
        switch ($rewardType)
        {
            case 1 :
                $rewardType = 'Silk';
                break;
            case 2 :
                $rewardType = 'Gold';
                break;
            case 3 :
                $rewardType = 'Item';
                break;
            case 4 :
                $rewardType = 'All/Other';
                break;

        }

        return  $rewardType;


    }
    public static function getRewardControl(int $rewardControl) : string
    {


        return $rewardControl = $rewardControl == 1 ? 'Inventory' : 'Storage';


    }
    public static function getSilkType(int $silkType) : string
    {

        return $silkType = ($silkType == 1) ? 'silk_own' : (($silkType == 2) ? 'silk_gift' : 'silk_points');


    }
}
