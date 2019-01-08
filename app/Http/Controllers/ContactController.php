<?php

namespace App\Http\Controllers;

use \Auth;
use Illuminate\Http\Request;

use App\Contact as Model;
use App\Repositories\Repository;

class ContactController extends Controller
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
        $contacts = $model->where('created_by', $user_id)
            ->orderBy('name', 'ASC')
            ->paginate(4);

        return view('contacts.index', [ 'contacts' => $contacts ]);
    }

    public function search(Request $request)
    {
        $user_id = Auth::id();

        if (empty($request->search))
        {
            return redirect('/contacts');
        }

        $model = $this->model->getModel();
        $contacts = $model->where('created_by', $user_id)
            ->search($request->search)
            ->orderBy('name', 'ASC')
            ->paginate(4);

        return view('contacts.index', [ 'contacts' => $contacts ]);
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();

        $this->validate($request, [
            'name' => 'required|string|max:100|min:5',
            'phone' => 'nullable|string|max:20|min:5',
            'email' => 'nullable|email|max:100|min:5',

            'position' => 'nullable|string|max:100|min:2',
            'company' => 'nullable|string|max:100|min:2',
            'whatsapp' => 'nullable|string|max:20|min:2',
            'facebook' => 'nullable|string|max:20|min:2',
            'instagram' => 'nullable|string|max:20|min:2',
            'twitter' => 'nullable|string|max:20|min:2',
            'linkedin' => 'nullable|string|max:20|min:2',
        ]);
        
        $model = $this->model->getModel();

        $data = $request->only(
            $model->fillable
        );

        $data['created_by'] = $user_id;
        $this->model->create($data);

        return redirect('/contacts')->with('status', 'Contato criado!');
    }

    public function show(int $id)
    {
        $contact = $this->model->find($id);

        // Do not exist
        if (empty($contact))
        {
            return redirect('/contacts');
        }

        return view('contacts.show', [ 'contact' => $contact ]);
    }

    public function edit(int $id)
    {
        $user_id = Auth::id();

        $contact = $this->model->find($id);

        // Do not exist
        if (empty($contact))
        {
            return redirect('/contacts');
        }

        // Is not the owner
        if ($contact->created_by != $user_id)
        {
            return redirect('/contacts');
        }

        return view('contacts.edit', [ 'contact' => $contact ]);
    }

    public function update(Request $request, int $id)
    {
        $user_id = Auth::id();
        
        $contact = $this->model->find($id);

        // Do not exist
        if (empty($contact))
        {
            return redirect('/contacts');
        }

        // Is not the owner
        if ($contact->created_by != $user_id)
        {
            return redirect('/contacts');
        }

        $this->validate($request, [
            'name' => 'required|string|max:100|min:5',
            'phone' => 'nullable|string|max:20|min:5',
            'email' => 'nullable|email|max:100|min:5',
            
            'position' => 'nullable|string|max:100|min:2',
            'company' => 'nullable|string|max:100|min:2',
            'whatsapp' => 'nullable|string|max:20|min:2',
            'facebook' => 'nullable|string|max:20|min:2',
            'instagram' => 'nullable|string|max:20|min:2',
            'twitter' => 'nullable|string|max:20|min:2',
            'linkedin' => 'nullable|string|max:20|min:2',

            'is_favorite' => 'sometimes|boolean',
            'is_private' => 'sometimes|boolean',
        ]);

        $model = $this->model->getModel();

        $data = $request->only(
            $model->fillable
        );

        $data['updated_by'] = $user_id;
        $this->model->update($data, $id);

        return redirect('/contacts')->with('status', 'Contato atualizado!');
    }

    public function destroy(int $id)
    {
        $user_id = Auth::id();
        
        $contact = $this->model->find($id);

        // Do not exist
        if (empty($contact))
        {
            return redirect('/contacts');
        }

        // Is not the owner
        if ($contact->created_by != $user_id)
        {
            return redirect('/contacts');
        }

        $this->model->update([ 'deleted_by', $user_id ], $id);
        $this->model->delete($id);

        return redirect('/contacts')->with('status', 'Contato excluído!');
    }

    public function clone(int $id)
    {
        $user_id = Auth::id();

        $contact = $this->model->find($id);

        // Do not exist
        if (empty($contact))
        {
            return redirect('/contacts');
        }

        // Is the owner
        if ($contact->created_by == $user_id)
        {
            return redirect('/contacts');
        }

        $clone = $contact->replicate();

        $clone->created_by = $user_id;
        $clone->updated_by = $user_id;
        $clone->save();

        return redirect('/contacts')->with('status', 'Contato clonado!');
    }

    public function favorite(int $id)
    {
        $user_id = Auth::id();

        $contact = $this->model->find($id);

        // Do not exist
        if (empty($contact))
        {
            return redirect('/contacts');
        }

        // Is not the owner
        if ($contact->created_by != $user_id)
        {
            return redirect('/contacts');
        }

        $data = [];
        $data['is_favorite'] = !$contact->is_favorite;
        $this->model->update($data, $id);

        return redirect('/contacts')->with('status', 'Contato favoritado!');
    }
}