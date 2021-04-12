<?php
/**
 * User: Abdelaziz
 * Date: 4/12/2021
 * Time: 1:55 PM
 */

namespace App\Services;

/**
 * @Author Abdelaziz Omar <Abdelazizomar851@gmail.com>
 * @package App\Services
 */
class GetEventKeyNotice
{
    public static function getEvent($event): string
    {
        switch ($event) {
            case 'Trivia':
            case 'Choose':
            case 'Viceversa':
            case 'Convert':
            case 'Reverse':
            case 'ReArrange':
                $event = 'QS';
                break;
            case 'LuckyPM':
            case 'LuckyGlobal':
            case 'LuckyStaller':
                $event = 'LuckyStore';
                break;
            case 'LotterySilk':
            case 'LotteryGold':
            case 'LotteryCoins':
                $event = 'Lottery';
                break;
            case 'HnS':
            case 'SnD':
            case 'Stall':
                $event = 'Search';
                break;

        }


        return $event ?? 'All';
    }
}
