<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalleRequest;
use App\Http\Requests\UpdateSalleRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SalleRepository;
use Illuminate\Http\Request;
use Flash;

class SalleController extends AppBaseController
{
    /** @var SalleRepository $salleRepository*/
    private $salleRepository;

    public function __construct(SalleRepository $salleRepo)
    {
        $this->salleRepository = $salleRepo;
    }

    /**
     * Display a listing of the Salle.
     */
    public function index(Request $request)
    {
        $salles = $this->salleRepository->paginate(10);
        return $salles;
    }

    /**
     * Show the form for creating a new Salle.
     */
    public function create()
    {
        return view('salles.create');
    }

    /**
     * Store a newly created Salle in storage.
     */
    public function store(CreateSalleRequest $request)
    {
        $input = $request->all();

        $salle = $this->salleRepository->create($input);
        return response()->json(['message' => 'succès', 'salle' => $salle], 201);

    }

    /**
     * Display the specified Salle.
     */
    public function show($id)
    {
        $salle = $this->salleRepository->find($id);
        return response()->json($salle, 200);
    }

    /**
     * Show the form for editing the specified Salle.
     */
    public function edit($id)
    {
        $salle = $this->salleRepository->find($id);

        if (empty($salle)) {
            Flash::error('Salle not found');

            return redirect(route('salles.index'));
        }

        return view('salles.edit')->with('salle', $salle);
    }

    /**
     * Update the specified Salle in storage.
     */
    public function update($id, UpdateSalleRequest $request)
    {
        $salle = $this->salleRepository->find($id);

        if (empty($salle)) {

            return response()->json(['message' => 'not found'], 404);
        }

        $salle = $this->salleRepository->update($request->all(), $id);

        return response()->json($salle, 201);
    }

    /**
     * Remove the specified Salle from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $salle = $this->salleRepository->find($id);

        if (empty($salle)) {

            return response()->json(['message' => 'not found'], 404);
        }
        $this->salleRepository->delete($id);
        return response()->json(['message' => 'succes'], 201);
    }
}
