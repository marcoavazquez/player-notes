<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerNoteRequest;
use App\Repositories\PlayerNoteRepository;
use Illuminate\Http\Request;

class PlayerNotesController extends Controller
{
    private PlayerNoteRepository $playerNoteRepository;

    public function __construct(PlayerNoteRepository $playerNoteRepository)
    {
        $this->playerNoteRepository = $playerNoteRepository;
    }

    public function index()
    {
        $notes = $this->playerNoteRepository->getAll();

        return response()->json($notes);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'player_id' => 'required|exists:users,id',
            'note' => 'required|string',
        ]);

        $data['support_id'] = $request->user()->id;

        $note = $this->playerNoteRepository->create($data);

        return response()->json($note, 201);
    }
}
