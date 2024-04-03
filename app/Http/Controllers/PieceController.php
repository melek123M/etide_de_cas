<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePieceRequest;
use App\Http\Requests\UpdatePieceRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PieceRepository;
use Illuminate\Http\Request;
use Flash;

class PieceController extends AppBaseController
{
    /** @var PieceRepository $pieceRepository*/
    private $pieceRepository;

    public function __construct(PieceRepository $pieceRepo)
    {
        $this->pieceRepository = $pieceRepo;
    }

    /**
     * Display a listing of the Piece.
     */
    public function index(Request $request)
    {
        $pieces = $this->pieceRepository->paginate(10);
        return $pieces;
    }


    /**
     * Store a newly created Piece in storage.
     */
    public function store(CreatePieceRequest $request)
    {
        $input = $request->all();

        $piece = $this->pieceRepository->create($input);
        return response()->json(['message' => 'succès', 'piece' => $piece], 201);

        // return redirect(route('pieces.index'));
    }

    /**
     * Display the specified Piece.
     */
    public function show($id)
    {
        $piece = $this->pieceRepository->find($id);

        return response()->json($piece, 200);
    }

    /**
     * Show the form for editing the specified Piece.
     */
    public function edit($id)
    {
        $piece = $this->pieceRepository->find($id);

        if (empty($piece)) {

            return redirect(route('pieces.index'));
        }

        return view('pieces.edit')->with('piece', $piece);
    }

    /**
     * Update the specified Piece in storage.
     */
    public function update($id, UpdatePieceRequest $request)
    {
        $piece = $this->pieceRepository->find($id);

        if (empty($piece)) {

            return response()->json(['message' => 'not found'], 404);
        }

        $piece = $this->pieceRepository->update($request->all(), $id);

        return response()->json($piece, 201);
    }

    /**
     * Remove the specified Piece from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $piece = $this->pieceRepository->find($id);
        if (empty($piece)) {

            return response()->json(['message' => 'not found'], 404);
        }
        $this->pieceRepository->delete($id);
        return response()->json(['message' => 'succes'], 201);
    }
}
