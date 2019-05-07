<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Criteria\UsersListCriteria;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Illuminate\Http\Response;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;
    
    /**
     * @var UserValidator
     */
    protected $validator;
    
    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(
        UserRepository $repository,
        UserValidator $validator
    ) {
        $this->middleware(['auth','throttle:600']);
        $this->repository = $repository;
        $this->validator = $validator;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    
        $users = $this->repository
            ->pushCriteria(new UsersListCriteria(request()->all()))
            ->paginate();
    
        if (request()->wantsJson())
        {
            return response()->json([
                'data' => $users,
            ]);
        }
        
        return view('users.index', compact('users'));
    }
}
