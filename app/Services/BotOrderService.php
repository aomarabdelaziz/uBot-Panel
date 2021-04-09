<?php
/**
 * User: Abdelaziz
 * Date: 4/9/2021
 * Time: 3:31 AM
 */

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

/**
 * @Author Abdelaziz Omar <Abdelazizomar851@gmail.com>
 * @package App\Services
 */
class BotOrderService
{
    protected string $ability;

    /**
     * BotOrderService constructor.
     * @param string $ability
     */
    public function __construct(string $ability)
    {
        $this->ability = $ability;
    }


    public function canAccess()
    {
        if(!Gate::allows($this->ability)) {
            return response([
                "error" => 'You have to renew your membership to do this action'
            ]);
        }

        return $this;
    }

    public function checkUserConnection()
    {
        if(!ConnectionAvailabilityService::checkUserSqlConnectionAvailability()) {
            return response([
                "error" => 'Cannot read any sql connection , please make sure that your connection is correct'
            ]);
        }

        return true;
    }
}
