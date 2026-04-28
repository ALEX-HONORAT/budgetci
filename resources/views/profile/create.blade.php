<!DOCTYPE html>
<html>
<head>
    <title>BudgetCI - Onboarding</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; }
        label { display: block; margin-top: 15px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 20px; padding: 10px 20px; background: #2563eb; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Configuration de votre profil</h1>
    
    <form method="POST" action="{{ route('onboarding.store') }}">
        @csrf
        
        <label>Votre activité / métier</label>
        <input type="text" name="activity" placeholder="Ex: Moto-taxi, Commerçante" required>
        
        <label>Mode de revenu</label>
        <select name="income_mode" required>
            <option value="">-- Choisir --</option>
            <option value="fixe">Fixe mensuel</option>
            <option value="journalier">Journalier</option>
            <option value="projet">Par projet</option>
            <option value="irregulier">Irrégulier</option>
        </select>
        
        <label>Revenu habituel (FCFA)</label>
        <input type="number" name="base_amount" placeholder="Ex: 8000" required>
        
        <label>Objectif d'épargne mensuel (FCFA) - Optionnel</label>
        <input type="number" name="savings_goal" placeholder="Ex: 30000">
        
        <button type="submit">Enregistrer mon profil</button>
    </form>
</body>
</html>