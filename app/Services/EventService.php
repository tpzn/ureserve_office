<?php

namespace App\Services;

use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;

class EventService
{
    public static function checkEventDuplication($eventDate, $startTime, $endTime)
    {
        return DB::table('events')  //時間重複チェック
        ->whereDate('start_date', $eventDate)
        ->whereTime('end_date', '>=' , $startTime) //登録済みの終了時間と、新規の開始時間重複チェック
        ->whereTime('start_date', '<=' , $endTime) //登録済みの開始時間と、新規の終了時間重複チェック
        ->exists();
    }

    public static function countEventDuplication($eventDate, $startTime, $endTime)
    {
        return DB::table('events')  //時間重複チェック
        ->whereDate('start_date', $eventDate)
        ->whereTime('end_date', '>=' , $startTime) //登録済みの終了時間と、新規の開始時間重複チェック
        ->whereTime('start_date', '<=' , $endTime) //登録済みの開始時間と、新規の終了時間重複チェック
        ->count();
    }

    public static function joinDateAndTime($date, $time)
    {
        $join = $date." ".$time;
        return Carbon::createFromFormat('Y-m-d H:i', $join);
    }

    public static function getWeekEvents($startDate, $endDate)
    {
        $reservedPeople = DB::table('reservations')
        ->select('event_id', DB::raw('sum(number_of_people) as number_of_people'))
        ->whereNull('canceled_date')
        ->groupBy('event_id');

        return DB::table('events')
        ->leftJoinSub($reservedPeople, 'reservedPeople', function($join){
            $join->on('events.id', '=', 'reservedPeople.event_id');
        })
        ->whereBetween('start_date', [$startDate, $endDate])
        ->orderBy('start_date', 'asc')
        ->get();
    }
}