<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BudgetCI - Ajouter un revenu</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
        }
        
        .header {
            background: white;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .header .logo {
            font-size: 24px;
            font-weight: 700;
            color: #7c3aed;
        }
        
        .header a {
            color: #6b7280;
            text-decoration: none;
            font-size: 14px;
        }
        
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 0 16px;
        }
        
        .card {
            background: white;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        h1 {
            font-size: 24px;
            color: #1f2937;
            margin-bottom: 24px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            color: #374151;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
        }
        
        input, select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 15px;
        }
        
        input:focus, select:focus {
            outline: none;
            border-color: #7c3aed;
        }
        
        button {
            width: 100%;
            padding: 14px;
            background: #7c3aed;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }
        
        button:hover {
            background: #6d28d9;
        }
        
        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">BudgetCI</div>
        <a href="{{ route('dashboard') }}">← Retour au tableau de bord</a>
    </div>
    
    <div class="container">
        <div class="card">
            <h1>Ajouter un revenu</h1>
            
            <form method="POST" action="{{ route('incomes.store') }}">
                @csrf
                
                <div class="form-group">
                    <label>Montant (FCFA)</label>
                    <input type="number" name="amount" placeholder="Ex: 50000" required>
                    @error('amount')<div class="error">{{ $message }}</div>@enderror
                </div>
                
                <div class="form-group">
                    <label>Source (optionnel)</label>
                    <input type="text" name="source" placeholder="Ex: Salaire, Course moto...">
                    @error('source')<div class="error">{{ $message }}</div>@enderror
                </div>
                
                <div class="form-group">
                    <label>Fréquence</label>
                    <select name="frequency" required>
                        <option value="">Choisir...</option>
                        <option value="mensuel">Mensuel</option>
                        <option value="journalier">Journalier</option>
                        <option value="projet">Par projet</option>
                        <option value="irregulier">Irrégulier</option>
                    </select>
                    @error('frequency')<div class="error">{{ $message }}</div>@enderror
                </div>
                
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" required>
                    @error('date')<div class="error">{{ $message }}</div>@enderror
                </div>
                
                <button type="submit">Enregistrer le revenu</button>
            </form>
        </div>
    </div>
</body>
</html>