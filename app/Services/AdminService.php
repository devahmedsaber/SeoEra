<?php

namespace App\Services;

use App\Http\Requests\CreateAdmin;
use App\Http\Requests\UpdateAdmin;
use App\Models\Admin;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function index(Request $request)
    {
        $data = DB::table('admins')
            ->leftJoin('languages', 'admins.language_id', '=', 'languages.id')
            ->selectRaw('
                admins.id as id,
                admins.name as name,
                admins.name as email,
                languages.title as lang_title
            ')
            ->get();
        return $data;
    }

    public function show($id)
    {
        return $this->adminRepository->find($id);
    }

    public function store(CreateAdmin $request)
    {
        $admin = Admin::create([
            'name'        => $request['name'],
            'email'       => $request['email'],
            'password'    => Hash::make($request['password']),
            'language_id' => $request['language_id'],
        ]);

        return redirect()->route('admin.admins.index');
    }

    public function update(UpdateAdmin $request, int $id)
    {
        $admin = Admin::find($id);

        if (!$admin){
            return redirect()->back()->with('error', 'Admin Not Found');
        }

        $admin->update([
            'name'        => $request['name'] ?? $admin->name,
            'email'       => $request['email'] ?? $admin->email,
            'password'    => (isset($request['password']) && !is_null($request['password'])) ? Hash::make($request['password']) : $admin->password,
            'language_id' => $request['language_id'] ?? $admin->language_id,
        ]);

        return redirect()->route('admin.admins.index');
    }

    public function delete(int $id)
    {
        $admin = Admin::find($id);

        if (!$admin){
            return redirect()->back()->with('error', 'Admin Not Found');
        }

        $admin->delete();

        return redirect()->back()->with('success', 'Admin Deleted');
    }
}
