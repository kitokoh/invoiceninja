<?php
/**
 * Africa Novatech (https://africanovatech.com).
 *
 * @link https://africanovatech.com source repository
 *
 * @copyright Copyright (c) 2023. Invoice Novatech LLC (https://africanovatech.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace App\Utils\Traits\Recurring;

use Illuminate\Support\Carbon;

trait HasRecurrence
{
    /**
     * Calculates the first day of the month, this will ALWAYS
     * be the first of NEXT month
     *
     * @param  Carbon $date The given date
     * @return Carbon       The first of NEXT month
     */
    public function calculateFirstDayOfMonth($date)
    {
        return $date->copy()->startOfMonth()->addMonth();
    }

    /**
     * Calculates the last day of the month.
     *
     * If it is the last day of the month - we add a month on.
     *
     * @param  Carbon $date The start date
     * @return Carbon       The last day of month
     */
    public function calculateLastDayOfMonth($date)
    {
        if ($date->isLastOfMonth()) {
            return $date->copy()->addMonthNoOverflow()->endOfMonth();
        }

        return $date->copy()->endOfMonth();
    }

    /**
     * Sets the day of the month, if in the past we ADD a month
     *
     * @param Carbon $date              The start date
     * @param string|int $day_of_month  The day of the month
     */
    public function setDayOfMonth($date, $day_of_month)
    {
        $carbon_date = Carbon::parse($date);

        $set_date = $carbon_date->copy()->setUnitNoOverflow('day', $day_of_month, 'month');

        //If the set date is less than the original date we need to add a month.
        //If we are overflowing dates, then we need to diff the dates and ensure it doesn't equal 0
        if ($set_date->lte($date) || $set_date->diffInDays($carbon_date) == 0) {
            $set_date->addMonthNoOverflow();
        }

        if ($day_of_month == '31') {
            $set_date->endOfMonth();
        }

        return $set_date;
    }
}
