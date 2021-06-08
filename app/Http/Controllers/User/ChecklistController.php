<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function show(Checklist $checklist): View
    {
        // Sync checklist from admin
        (new ChecklistService())->sync_checklist($checklist, auth()->id());

        return view('users.checklists.show', compact('checklist'));
    }
}
