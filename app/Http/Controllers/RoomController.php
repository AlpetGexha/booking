<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\View\View;

final class RoomController extends Controller
{
    /**
     * Display a listing of the room types.
     */
    public function index(): View
    {
        $roomTypes = RoomType::with('amenities')->get();

        return view('rooms', compact('roomTypes'));
    }
}
