<?php

namespace App\Http\Controllers;

use Auth;
use App;
use GrahamCampbell\GitHub\Facades\GitHub;

class GithubController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getNotifications()
    {
      Github::authenticate(Auth::user()->token, null, 'http_token');
      $notifications = GitHub::api('notification')->all();
      return view('notifications')->with('notifications', $notifications);
    }
    public function getNotification($id)
    {
      Github::authenticate(Auth::user()->token, null, 'http_token');
      $notification = GitHub::api('notification')->id($id);
      return view('notification')->with('notification', $notification);
    }
}
