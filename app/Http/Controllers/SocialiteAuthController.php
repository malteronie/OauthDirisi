<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class SocialiteAuthController extends Controller
{
    public function destroyClient($id) {
        $client = Client::find($id);
        $client->delete();
        // dd($client);
        return to_route('dashboard.clients');
    }
}