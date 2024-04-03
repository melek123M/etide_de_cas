<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpectacleRequest;
use App\Http\Requests\UpdateSpectacleRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Spectacle;
use App\Repositories\SpectacleRepository;
use Illuminate\Http\Request;
use Flash;

class SpectacleController extends AppBaseController
{
    /** @var SpectacleRepository $spectacleRepository*/
    private $spectacleRepository;

    public function __construct(SpectacleRepository $spectacleRepo)
    {
        $this->spectacleRepository = $spectacleRepo;
    }

    /**
     * Display a listing of the Spectacle.
     */
    public function index(Request $request)
    {
        $spectacles = Spectacle::with('piece', 'salle')->paginate(10);
        return $spectacles;

    }

    /**
     * Show the form for creating a new Spectacle.
     */
    public function create()
    {
        return view('spectacles.create');
    }

    /**
     * Store a newly created Spectacle in storage.
     */
    public function store(CreateSpectacleRequest $request)
    {
        $input = $request->all();
        $spectacle = $this->spectacleRepository->create($input);
        return response()->json(['message' => 'succès', 'spectacle' => $spectacle], 201);
    }

    /**
     * Display the specified Spectacle.
     */
    public function show($id)
    {
        $spectacle = Spectacle::with(['piece', 'salle'])->find($id);
        return $spectacle;

    }

    /**
     * Show the form for editing the specified Spectacle.
     */
    public function edit($id)
    {
        $spectacle = $this->spectacleRepository->find($id);

        if (empty($spectacle)) {
            Flash::error('Spectacle not found');

            return redirect(route('spectacles.index'));
        }

        return view('spectacles.edit')->with('spectacle', $spectacle);
    }

    /**
     * Update the specified Spectacle in storage.
     */
    public function update($id, UpdateSpectacleRequest $request)
    {
        $spectacle = $this->spectacleRepository->find($id);

        if (empty($spectacle)) {

            return response()->json(['message' => 'not found'], 404);
        }

        $spectacle = $this->spectacleRepository->update($request->all(), $id);

        return response()->json($spectacle, 201);
    }

    /**
     * Remove the specified Spectacle from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $spectacle = $this->spectacleRepository->find($id);

        if (empty($spectacle)) {

            return response()->json(['message' => 'not found'], 404);
        }
        $this->spectacleRepository->delete($id);
        return response()->json(['message' => 'succes'], 201);
    }
}
