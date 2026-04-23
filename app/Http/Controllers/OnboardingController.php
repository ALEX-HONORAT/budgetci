<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OnboardingController extends Controller
{
    public function create(): View
    {
        return view('onboarding.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'activity' => 'required|string|max:255',
            'income_mode' => 'required|in:fixe,journalier,projet,irregulier',
            'base_amount' => 'required|integer|min:0',
            'savings_goal' => 'nullable|integer|min:0',
        ]);

        $validated['user_id'] = $request->user()->id;

        Profile::create($validated);

        return redirect()->route('dashboard');
    }
}
