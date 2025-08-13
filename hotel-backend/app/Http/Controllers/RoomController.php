<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index($hotelId)
    {
        return response()->json(Room::where('hotel_id', $hotelId)->get());
    }

    public function store(Request $request, $hotelId)
    {
        $request->validate([
            'numero' => 'required|string|max:20',
            'tipo' => 'nullable|string|max:50',
        ]);
        $room = Room::create([
            'hotel_id' => $hotelId,
            'numero' => $request->numero,
            'tipo' => $request->tipo,
        ]);
        return response()->json($room, 201);
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return response()->json($room);
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->only(['numero', 'tipo', 'status']));
        return response()->json($room);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json(['message' => 'Quarto deletado com sucesso']);
    }
}
