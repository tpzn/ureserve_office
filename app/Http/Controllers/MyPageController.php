<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Event;
use App\Models\Reservation;
use App\Services\MyPageService;
use Carbon\Carbon;

class MyPageController extends Controller
{
    public function index()
    {
        $user = User::FindOrFail(Auth::id());
        $events = $user->events; //イベント一覧を取得
        $fromTodayEvents = MyPageService::reservedEvent($events, 'fromToday');
        $pastEvents = MyPageService::reservedEvent($events, 'past');

        return view('mypage/index',
        compact('fromTodayEvents', 'pastEvents'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $reservation = Reservation::where('user_id', '=' ,Auth::id())
        ->where('event_id', '=', $id)
        ->latest()
        ->first();

        return view('mypage/show', compact('event', 'reservation'));

    }

    public function cancel($id)
    {
        $reservation = Reservation::where('user_id', '=', Auth::id())
        ->where('event_id', '=', $id)
        ->latest()
        ->first();

        $reservation->canceled_date = Carbon::now()->format('Y-m-d H:i:s');
        $reservation->save();

        session()->flash('status', 'キャンセルが完了しました');

        return to_route('dashboard');
    }
}
