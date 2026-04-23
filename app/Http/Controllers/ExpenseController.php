<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Expense;
use App\Models\Profile;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    /**
     * Afficher la liste des dépenses.
     */
    public function index()
    {
        //
    }

    /**
     * Afficher le formulaire de création d'une dépense.
     */
    public function create(): View
    {
        return view('expenses.create');
    }

    /**
     * Enregistrer une nouvelle dépense dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $user = $request->user();

        Expense::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'category' => $request->category,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        return redirect()->route('dashboard')->with('success', 'Dépense ajoutée avec succès !');
    }

    /**
     * Afficher une dépense spécifique.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Afficher le formulaire de modification d'une dépense.
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Mettre à jour une dépense dans la base de données.
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Supprimer une dépense spécifique.
     */
    public function destroy(Expense $expense)
    {
        // Vérifier que l'utilisateur est bien le propriétaire
        if ($expense->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'Vous ne pouvez pas supprimer cette dépense.');
        }
        
        $expense->delete();
        
        return redirect()->route('dashboard')->with('success', 'Dépense supprimée avec succès !');
    }

    /**
     * Supprimer TOUTES les dépenses d'un mois spécifique.
     */
    public function destroyMonth(Request $request)
    {
        $user = $request->user();
        
        $moisASupprimer = $request->input('month', now()->format('Y-m'));
        
        $debutMois = Carbon::parse($moisASupprimer . '-01 00:00:00')->startOfDay();
        $finMois = Carbon::parse($moisASupprimer . '-01 00:00:00')->endOfMonth()->endOfDay();
        
        $nombreSupprime = Expense::where('user_id', $user->id)
            ->where('date', '>=', $debutMois->toDateString())
            ->where('date', '<=', $finMois->toDateString())
            ->delete();
        
        return redirect()->route('dashboard', ['month' => $moisASupprimer])
            ->with('success', "{$nombreSupprime} dépense(s) du mois " . Carbon::parse($moisASupprimer)->translatedFormat('F Y') . " supprimée(s)");
    }
}