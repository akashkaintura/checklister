<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistGroupRequest;
use App\Models\ChecklistGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ChecklistGroupController extends Controller
{
    public function create()
    {
        return view('admin.checklist_groups.create');
    }

    public function store(StoreChecklistGroupRequest $request): RedirectResponse
    {
        ChecklistGroup::create($request->validated());
        return redirect()->route('home');
    }

    public function edit(ChecklistGroup $checklistGroup): View
    {
        return view('checklist_groups.edit', compact('ChecklistGroup'));
    }

    public function update(StoreChecklistGroupRequest $request, ChecklistGroup $checklistGroup): RedirectResponse
    {
        $checklistGroup->update($request->validated());

        return redirect()->route('home');
    }

    public function destroy(ChecklistGroup $checklistGroup): RedirectResponse
    {
        $checklistGroup->delete();

        return redirect()->route('home');
    }
}
