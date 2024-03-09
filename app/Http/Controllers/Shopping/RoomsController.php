<?php

namespace App\Http\Controllers\Shopping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shopping\client;
use App\Models\Shopping\room;

class RoomsController extends Controller
{
    //
    public function checkAvailableRooms($client_id, Request $request)
    {
        $dateFrom = $request->input('dateFrom');
        $dateTo = $request->input('dateTo');
        $client = new Client();
        $room = new Room();

        //dd($dateFrom, $dateTo);
        $data = [];
        $data['dateFrom'] = $dateFrom;
        $data['dateTo']   = $dateTo;
        if ($dateFrom == null || $dateTo == null) {
            $data['rooms']    = $room;  
        } else {
            $data['rooms']    = $room->getAvailableRooms($dateFrom, $dateTo);
        }
        $data['client']   = $client->find($client_id);

        return view('Hottel/rooms/checkAvailableRooms', $data);
    }
}
