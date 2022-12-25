<?php

namespace App\Services;

use App\Http\Requests\CreateLanguage;
use App\Http\Requests\UpdateLanguage;
use App\Models\Admin\Language;
use App\Repositories\LanguageRepository;
use Illuminate\Http\Request;

class LanguageService
{
    private LanguageRepository $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function index(Request $request)
    {
        return $this->languageRepository->all();
    }

    public function show($id)
    {
        return $this->languageRepository->find($id);
    }

    public function create(Request $request)
    {
        return view('dashboard.languages.create');
    }

    public function store(CreateLanguage $request)
    {
        if (isset($request['img']) && !is_null($request['img']) && $request->hasFile('img')){
            $image = uploadImage($request['img'], 'languages_images');
        }

        $language = Language::create([
            'title'  => $request['title'],
            'img'    => $image['image_path'] ?? null,
            'slogan' => $request['slogan'],
        ]);

        return redirect()->route('admin.languages.index');
    }

    public function edit(Request $request, $id)
    {
        $language = $this->languageRepository->find($id);
        return view('dashboard.languages.edit', compact('language'));
    }

    public function update(UpdateLanguage $request, int $id)
    {
        $language = Language::find($id);

        if (!$language){
            return redirect()->back()->with('error', 'Language Not Found');
        }

        if (isset($request['img']) && !is_null($request['img']) && $request->hasFile('img')){
            if (!is_null($language->img) && file_exists(public_path($language->img))){
                unlink($language->img);
            }
            $image = uploadImage($request['img'], 'languages_images');
        }

        $language->update([
            'title'  => $request['title'] ?? $language->title,
            'img'    => $image['image_path'] ?? $language->img,
            'slogan' => $request['slogan'] ?? $language->slogan,
        ]);

        return redirect()->route('admin.languages.index');
    }

    public function delete(int $id)
    {
        $language = Language::find($id);

        if (!$language){
            return redirect()->back()->with('error', 'Language Not Found');
        }

        $language->delete();

        return redirect()->back()->with('success', 'Language Deleted');
    }
}
