<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository extends Repository
{
    public function __construct(Admin $admin)
    {
        $this->setModel($admin);
    }
}
