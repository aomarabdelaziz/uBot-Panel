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
    public static function getRewardType(string $rewardType) : int
    {
        $rewardNo = 1;
        switch ($rewardType)
        {
            case "Silk":
                $rewardNo = 1;
                break;

            case "Gold":
                $rewardNo = 2;
                break;

            case "Item":
                $rewardNo = 3;
                break;

            case "All/Other":
                $rewardNo = 4;
                break;
        }


        return  $rewardNo;


    }
    public static function getRewardControl(string $rewardControl) : int
    {
        $rewardControlNo = 1;
        switch ($rewardControl)
        {
            case "Inventory":
                $rewardControlNo = 1;
                break;

            case "Storage":
                $rewardControlNo = 2;
                break;


        }


        return  $rewardControlNo;


    }
    public static function getSilkType(string $silkType) : int
    {
        $silkNo = 1;
        switch ($silkType)
        {
            case "silk_own":
                $rewardControlNo = 1;
                break;

            case "silk_gift":
                $rewardControlNo = 2;
                break;

            case "silk_point":
                $rewardControlNo = 3;
                break;


        }


        return  $silkNo;


    }
}
