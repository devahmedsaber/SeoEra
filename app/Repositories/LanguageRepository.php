<?php

namespace App\Repositories;

use App\Models\Admin\Language;

class LanguageRepository extends Repository
{
    public function __construct(Language $language)
    {
        $this->setModel($language);
    }
}
