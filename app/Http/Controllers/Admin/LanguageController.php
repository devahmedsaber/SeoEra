<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLanguage;
use App\Http\Requests\UpdateLanguage;
use App\Services\LanguageService;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    private LanguageService $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    public function index(Request $request)
    {
        $languages = $this->languageService->index($request);
        return view('dashboard.languages.index', compact('languages'));
    }

    public function show($id)
    {
        return $this->languageService->show($id);
    }

    public function create(Request $request)
    {
        return $this->languageService->create($request);
    }

    public function store(CreateLanguage $request)
    {
        return $this->languageService->store($request);
    }

    public function edit(Request $request, $id)
    {
        return $this->languageService->edit($request, $id);
    }

    public function update(UpdateLanguage $request, $id)
    {
        return $this->languageService->update($request, $id);
    }

    public function delete($id)
    {
        return $this->languageService->delete($id);
    }
}
