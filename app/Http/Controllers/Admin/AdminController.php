<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdmin;
use App\Http\Requests\UpdateAdmin;
use App\Services\AdminService;
use App\Services\LanguageService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private AdminService $adminService;
    private LanguageService $languageService;

    public function __construct(AdminService $adminService, LanguageService $languageService)
    {
        $this->adminService = $adminService;
        $this->languageService = $languageService;
    }

    public function index(Request $request)
    {
        $admins = $this->adminService->index($request);
        return view('dashboard.admins.index', compact('admins'));
    }

    public function show($id)
    {
        return $this->adminService->show($id);
    }

    public function create(Request $request)
    {
        $languages = $this->languageService->index($request);
        return view('dashboard.admins.create', compact('languages'));
    }

    public function store(CreateAdmin $request)
    {
        return $this->adminService->store($request);
    }

    public function edit(Request $request, $id)
    {
        $admin = $this->adminService->show($id);
        $languages = $this->languageService->index($request);
        return view('dashboard.admins.edit', compact('admin', 'languages'));
    }

    public function update(UpdateAdmin $request, $id)
    {
        return $this->adminService->update($request, $id);
    }

    public function delete($id)
    {
        return $this->adminService->delete($id);
    }
}
