@extends('layouts.app')

@section('title', 'BudgetCI - Configuration')

@section('subtitle', 'Configurez votre profil financier')

@section('content')
    <form method="POST" action="{{ route('onboarding.store') }}">
        @csrf
        
        <div class="form-group">
            <label>Activité / Métier</label>
            <input type="text" name="activity" placeholder="Ex: Moto-taxi" value="{{ old('activity') }}" required>
            @error('activity')<div class="error">{{ $message }}</div>@enderror
        </div>
        
        <div class="form-group">
            <label>Mode de revenu</label>
            <select name="income_mode" required>
                <option value="">Choisir...</option>
                <option value="fixe" {{ old('income_mode') == 'fixe' ? 'selected' : '' }}>Fixe mensuel</option>
                <option value="journalier" {{ old('income_mode') == 'journalier' ? 'selected' : '' }}>Journalier</option>
                <option value="projet" {{ old('income_mode') == 'projet' ? 'selected' : '' }}>Par projet</option>
                <option value="irregulier" {{ old('income_mode') == 'irregulier' ? 'selected' : '' }}>Irrégulier</option>
            </select>
            @error('income_mode')<div class="error">{{ $message }}</div>@enderror
        </div>
        
        <div class="form-group">
            <label>Revenu habituel (FCFA)</label>
            <input type="number" name="base_amount" placeholder="8000" value="{{ old('base_amount') }}" required>
            @error('base_amount')<div class="error">{{ $message }}</div>@enderror
        </div>
        
        <div class="form-group">
            <label>Objectif épargne (FCFA) - Optionnel</label>
            <input type="number" name="savings_goal" placeholder="30000" value="{{ old('savings_goal') }}">
            @error('savings_goal')<div class="error">{{ $message }}</div>@enderror
        </div>
        
        <button type="submit">Continuer</button>
    </form>
@endsection