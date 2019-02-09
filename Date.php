<?php

class Date
{
  /**
   * To check a day of week.
   * @param date $date
   * @return int 0 => sunday, 1 => monday, ... 6 => Saturday
   */
  static function checkDayOfWeek($date)
  {
    $datetime = new DateTime($date);
    $week = (int)$datetime->format('w');
    return $week;
  }
  /**
   * method to get a number of weekdays
   * @param  date $start_date
   * @param  date $end_date
   * @return integer $numWeekdays
   */
  static function getNumWeekdays($start_date, $end_date)
  {
    $numWeekdays = 0;
    $currentDay = $start_date;
    while($currentDay <= $end_date)
    {
      $weekday = Date::checkDayOfWeek($currentDay);
      if ($weekday == 0 || $weekday == 6)
        $currentDay++;
      else
      {
        $numWeekdays++;
        $currentDay++;
      }
    }
    return $numWeekdays;
  }

  /**
   * calculation of minimum value
   * @param  int $baseline  0 ~ 100
   * @param  int $numWeekdays
   * @return float
   */
  static function calculBaseline($baseline, $numWeekdays)
  {
    try {
      if ($baseline >= 0 && $baseline <= 100){
        $min = $baseline / $numWeekdays;
        return (float)$min;
      }
      else
        throw new Exception('Please enter an integer from 0 to 100 !');
    } catch(Exception $e){
      echo $e->getMessage();
    }
  }

  /**
   * Generate a random value on float
   * @param  float $min
   * @param  float $max
   * @return float
   */
  static function f_rand($min, $max)
  {
    $randomFloat = $min + mt_rand() / mt_getrandmax() * ($max - $min);
    $randomFloat = round($randomFloat, 2);
    return $randomFloat;
  }

  static function arrayGenerator($start_date, $end_date, $total, $baseline)
  {
    // Prepare un array
    $result = array();
    // Initialize the fiste date
    $current_date = $start_date;
    // Get a number of weekdays
    $numWeekdays = Date::getNumWeekdays($start_date, $end_date);
    // I use it later
    $restOfWeekdays = $numWeekdays - 1;
    // Calcule the minimum of the random
    $min_rand = Date::calculBaseline($baseline, $numWeekdays);
    // Initialize the total of the random
    $restOfTotal = $total;

    while ($current_date <= $end_date)
    {
      // Condition to check the last day
      if ($current_date == $end_date)
      {
        // If it's Saturday or Sunday
        if (Date::checkDayOfWeek($current_date) == 0)
        {
          $result += array($current_date => 0);
          $twodaysBefore = date("Y-m-d", strtotime($current_date. "-2 day"));
          $result[$twodaysBefore] += round($restOfTotal, 2);
          $current_date++;
        }
        elseif (Date::checkDayOfWeek($current_date) == 6)
        {
          $result += array($current_date => 0);
          $onedayBefore = date("Y-m-d", strtotime($current_date. "-1 day"));
          $result[$onedayBefore] += round($restOfTotal, 2);
          $current_date++;
        }
        else
        {
          $result += array($current_date => round($restOfTotal, 2));
          $current_date++;
        }
      }
      else
      {
        // if it's a weekend
        if ((Date::checkDayOfWeek($current_date) == 0) || (Date::checkDayOfWeek($current_date) == 6))
        {
          $result += array($current_date => 0);
          $current_date++;
        }
        else {
          // if it's a weekday
          $result += array($current_date => Date::f_rand($min_rand, $restOfTotal - ($min_rand * $restOfWeekdays)));
          $restOfTotal -= $result[$current_date];
          $restOfWeekdays--;
          $current_date++;
        }
      }
    }
    return $result;
  }
}

echo Date::getNumWeekdays('2016-12-21', '2016-12-27') . "\n";
echo Date::calculBaseline(100, 5) . "\n";
$result = Date::arrayGenerator('2016-12-19', '2016-12-25', 75200, 50);
foreach ($result as $key => $value) {
  echo $key . " = " . $value . "\n";
}
echo array_sum($result);
