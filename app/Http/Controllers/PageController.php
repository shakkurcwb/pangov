<?php

namespace App\Http\Controllers;

use \Auth;
use Illuminate\Http\Request;

use \App\Contact;
use \App\Event;
use \App\Repositories\Repository;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(Contact $contact, Event $event)
    {
        $user_id = Auth::id();

        $contact = new Repository($contact);
        $event = new Repository($event);

        $c = $contact->getModel();
        $e = $event->getModel();

        $today = today()->format('Y-m-d');
        $week = today()->addDays(7)->format('Y-m-d');
        
        $resources = [
            'contacts' => $c->my($user_id)->count(),

            'favorites' => $c->my($user_id)->favorites()->recents()->limit(6)->get(),

            'recent_contacts' => $c->my($user_id)->recents()->limit(6)->get(),
            'public_contacts' => $c->recents()->limit(6)->get(),

            'events' => $e->mineOrJoined($user_id)->count(),
            'events_today' => $e->mineOrJoined($user_id)->today()->count(),
            'events_week' => $e->mineOrJoined($user_id)->thisWeek()->count(),

            'recent_events' => $e->mineOrJoined($user_id)->recents()->limit(6)->get(),
            'public_events' => $e->publics()->recents()->limit(6)->get(),
        ];

        // dd($resources);

        return view('dashboard', $resources);
    }

    public function profile()
    {
        return view('profile');
    }

    public function settings()
    {
        return view('settings');
    }

    public function help()
    {
        return view('help');
    }

    public function feedback()
    {
        return view('feedback');
    }
}