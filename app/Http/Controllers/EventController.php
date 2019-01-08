<?php

namespace App\Http\Controllers;

use \Auth;
use Illuminate\Http\Request;

use App\Event as Model;
use App\Repositories\Repository;

class EventController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->middleware('auth');
        $this->model = new Repository($model);
    }

    public function index()
    {
        $user_id = Auth::id();

        $model = $this->model->getModel();
        $events = $model->mineOrJoined($user_id)
            ->get();

        $next_events = $model->mineOrJoined($user_id)
            ->recents()
            ->limit(5)
            ->get();

        return view('events.index', [ 'events' => $events, 'next_events' => $next_events ]);
    }

    public function search(Request $request)
    {
        $user_id = Auth::id();

        if (empty($request->search))
        {
            return redirect('/events');
        }

        $model = $this->model->getModel();
        $events = $model->where('created_by', $user_id)
            ->orWhereHas('members', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })
            ->search($request->search)
            ->orderBy('start', 'DESC')
            ->get();

        return view('events.index', [ 'events' => $events, 'next_events' => $events ]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();

        $this->validate($request, [
            'title' => 'required|string|max:100|min:5',

            'description' => 'nullable|string|max:2500|min:2',
            'location' => 'nullable|string|max:100|min:2',
            'website' => 'nullable|string|max:255|min:2',

            'is_private' => 'sometimes|boolean',

            'start' => 'required|date_format:Y-m-d H:i:s',
            'end' => 'required|date_format:Y-m-d H:i:s',

            'color' => 'nullable|string|max:255|min:2',
            'keywords' => 'nullable|string|max:255|min:2',
        ]);
        
        $model = $this->model->getModel();

        $data = $request->only(
            $model->fillable
        );

        $data['created_by'] = $user_id;
        $this->model->create($data);

        return redirect('/events')->with('status', 'Evento criado!');
    }

    public function show(int $id)
    {
        $event = $this->model->find($id);

        // Do not exist
        if (empty($event))
        {
            return redirect('/events');
        }

        $keywords = explode(',', $event->keywords);

        return view('events.show', [ 'event' => $event, 'keywords' => $keywords ]);
    }

    public function edit(int $id)
    {
        $user_id = Auth::id();

        $event = $this->model->find($id);

        // Do not exist
        if (empty($event))
        {
            return redirect('/events');
        }

        // Is not the owner
        if ($event->created_by != $user_id)
        {
            return redirect('/events');
        }

        return view('events.edit', [ 'event' => $event ]);
    }

    public function update(Request $request, int $id)
    {
        $user_id = Auth::id();
        
        $event = $this->model->find($id);

        // Do not exist
        if (empty($event))
        {
            return redirect('/events');
        }

        // Is not the owner
        if ($event->created_by != $user_id)
        {
            return redirect('/events');
        }

        $this->validate($request, [
            'title' => 'required|string|max:100|min:5',

            'description' => 'nullable|string|max:2500|min:2',
            'location' => 'nullable|string|max:100|min:2',
            'website' => 'nullable|string|max:255|min:2',

            'is_private' => 'sometimes|boolean',

            'start' => 'required|date_format:Y-m-d H:i:s',
            'end' => 'required|date_format:Y-m-d H:i:s',

            'color' => 'nullable|string|max:255|min:2',
            'keywords' => 'nullable|string|max:255|min:2',
        ]);

        $model = $this->model->getModel();

        $data = $request->only(
            $model->fillable
        );

        $data['updated_by'] = $user_id;
        $this->model->update($data, $id);

        return redirect('/events')->with('status', 'Evento atualizado!');
    }

    public function destroy(int $id)
    {
        $user_id = Auth::id();
        
        $event = $this->model->find($id);

        // Do not exist
        if (empty($event))
        {
            return redirect('/events');
        }

        // Is not the owner
        if ($event->created_by != $user_id)
        {
            return redirect('/events');
        }

        $this->model->update([ 'deleted_by', $user_id ], $id);
        $this->model->delete($id);

        return redirect('/events')->with('status', 'Evento excluído!');
    }

    public function join(int $id)
    {
        $user_id = Auth::id();

        $event = $this->model->find($id);
        
        // Do not exist
        if (empty($event))
        {
            return redirect('/events');
        }

        // Is the owner
        if ($event->created_by == $user_id)
        {
            return redirect('/events');
        }

        $is_participating = $event->whereHas('members', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->count();

        if ($is_participating == 0)
        {
            $event->members()->attach($user_id, [ 'is_organizer' => false ]);    
        }
        else
        {
            $event->members()->detach($user_id);
        }
        
        $event->save();

        return redirect('/events')->with('status', 'Participando do evento!');
    }
}