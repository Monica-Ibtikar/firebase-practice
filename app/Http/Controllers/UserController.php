<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function store(Request $request)
    {
        $this->userRepo->store($request->only(['name', 'phone', 'email']));
        return redirect(route('users.index'));
    }

    public function index()
    {
        $users = $this->userRepo->all();
        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function edit($id)
    {
        $user = $this->userRepo->findById($id);
        return view('user.edit', ['user' => $user]);
    }

    public function update($id, Request $request)
    {
        $this->userRepo->update($id, $request->only(['name', 'phone', 'email']));
        return redirect(route('users.index'));
    }

    public function show($id)
    {
        $user = $this->userRepo->findById($id);
        return view('user.show', ['user' => $user]);
    }

    public function destroy($id)
    {
        $this->userRepo->delete($id);
    }
}
