<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Income;
use App\Models\Profile;
use Carbon\Carbon;

class IncomeController extends Controller
{
    /**
     * Afficher la liste des revenus.
     */
    public function index()
    {
        //
    }

    /**
     * Afficher le formulaire de création d'un revenu.
     */
    public function create(): View
    {
        return view('incomes.create');
    }

    /**
     * Enregistrer un nouveau revenu dans la base de données.
     */
    public function store(Request $request)
    {
        // Vérifier que les données sont valides
        $request->validate([
            'amount' => 'required|numeric|min:0',      // Montant obligatoire et positif
            'source' => 'required|string|max:255',     // Source du revenu obligatoire
            'date' => 'required|date',                 // Date obligatoire
        ]);

        $user = $request->user();

        // Créer le revenu
        Income::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'source' => $request->source,
            'date' => $request->date,
        ]);

        // Rediriger vers le tableau de bord avec un message de succès
        return redirect()->route('dashboard')->with('success', 'Revenu ajouté avec succès !');
    }

    /**
     * Afficher un revenu spécifique.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Afficher le formulaire de modification d'un revenu.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Mettre à jour un revenu dans la base de données.
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Supprimer un revenu spécifique.
     */
    public function destroy(Income $income)
    {
        // Vérifier que l'utilisateur a le droit de supprimer ce revenu
        $this->authorize('delete', $income);
        
        // Supprimer le revenu
        $income->delete();
        
        // Rediriger vers le tableau de bord
        return redirect()->route('dashboard')->with('success', 'Revenu supprimé avec succès !');
    }

    /**
     * Supprimer TOUS les revenus d'un mois spécifique.
     */
    public function destroyMonth(Request $request)
    {
        $user = $request->user();
        
        // Récupérer le mois à supprimer depuis le formulaire (ex: "2026-03")
        // Si aucun mois n'est envoyé, on prend le mois actuel
        $moisASupprimer = $request->input('month', now()->format('Y-m'));
        
        // Calculer le début EXACT du mois (ex: 2026-03-01 00:00:00)
        $debutMois = Carbon::parse($moisASupprimer . '-01 00:00:00')->startOfDay();
        
        // Calculer la fin EXACTE du mois (ex: 2026-03-31 23:59:59)
        $finMois = Carbon::parse($moisASupprimer . '-01 00:00:00')->endOfMonth()->endOfDay();
        
        // Supprimer UNIQUEMENT les revenus de CE mois précis
        $nombreSupprime = Income::where('user_id', $user->id)
            ->where('date', '>=', $debutMois->toDateString())  // Date supérieure ou égale au début du mois
            ->where('date', '<=', $finMois->toDateString())    // Date inférieure ou égale à la fin du mois
            ->delete();
        
        // Rediriger vers le même mois (qui est maintenant vide ou avec moins de données)
        return redirect()->route('dashboard', ['month' => $moisASupprimer])
            ->with('success', "{$nombreSupprime} revenu(s) du mois " . Carbon::parse($moisASupprimer)->translatedFormat('F Y') . " supprimé(s)");
    }
}