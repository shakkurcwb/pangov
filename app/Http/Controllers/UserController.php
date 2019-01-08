<?php

namespace App\Http\Controllers;

use \Auth;
use Illuminate\Http\Request;

use App\User as Model;
use App\Repositories\Repository;

class UserController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->model = new Repository($model);
    }

    public function index()
    {
        $user_id = Auth::id();

        $model = $this->model->getModel();
        $users = $model->orderBy('created_at', 'ASC')->paginate(10);

        return view('users.index', [ 'users' => $users ]);
    }

    public function search(Request $request)
    {
        $user_id = Auth::id();

        if (empty($request->search))
        {
            return redirect('/events');
        }

        $model = $this->model->getModel();
        $users = $model->search($request->search)->orderBy('created_at', 'ASC')->paginate(10);

        return view('sers.index', [ 'users' => $users ]);
    }
}