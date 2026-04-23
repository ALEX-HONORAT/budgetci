<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ========================================== -->
    <!-- META TAGS POUR ÉVITER LE CACHE DU NAVIGATEUR -->
    <!-- ========================================== -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    
    <title>BudgetCI - Tableau de bord</title>
    
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
        .header .nav {
            display: flex;
            align-items: center;
            gap: 24px;
        }
        .header .nav a {
            color: #6b7280;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }
        .header .nav a:hover {
            color: #7c3aed;
        }
        .header .nav span {
            color: #9ca3af;
            font-size: 14px;
        }
        .header .nav button {
            background: #7c3aed;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 32px;
        }
        .alert-success {
            background: #22c55e;
            color: white;
            padding: 16px 24px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .balance-card {
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
            color: white;
            padding: 32px;
            border-radius: 20px;
            margin-bottom: 24px;
        }
        .balance-card h2 {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 8px;
            font-weight: 500;
        }
        .balance-card .amount {
            font-size: 40px;
            font-weight: 700;
        }
        .actions {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #7c3aed;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
        }
        .btn:hover {
            background: #6d28d9;
            transform: translateY(-1px);
        }
        .btn-outline {
            background: white;
            color: #7c3aed;
            border: 2px solid #7c3aed;
        }
        .btn-outline:hover {
            background: #7c3aed;
            color: white;
        }
        .btn-danger {
            background: #ef4444;
        }
        .btn-danger:hover {
            background: #dc2626;
        }
        .btn-small {
            padding: 8px 14px;
            font-size: 12px;
            border-radius: 8px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }
        .card {
            background: white;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .card h3 {
            font-size: 13px;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 12px;
            font-weight: 500;
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 12px;
        }
        .card-header h3 {
            margin-bottom: 0;
        }
        .card .value {
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
        }
        .card .positive {
            color: #22c55e;
        }
        .card .negative {
            color: #ef4444;
        }
        .advice {
            font-size: 13px;
            margin-top: 8px;
            font-weight: 500;
        }
        .advice.green {
            color: #22c55e;
        }
        .advice.orange {
            color: #f59e0b;
        }
        .advice.red {
            color: #ef4444;
        }
        .table-container {
            background: white;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .table-container h3 {
            font-size: 18px;
            color: #1f2937;
            margin-bottom: 16px;
        }
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }
        .table-header h3 {
            margin-bottom: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            text-align: left;
            color: #6b7280;
            font-size: 13px;
            font-weight: 500;
            padding: 12px;
            border-bottom: 2px solid #e5e7eb;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
        }
        td.amount {
            text-align: right;
            font-weight: 600;
        }
        td.actions-cell {
            text-align: right;
            white-space: nowrap;
        }
        .inline-form {
            display: inline;
        }
        .empty {
            color: #6b7280;
            text-align: center;
            padding: 24px;
        }
        .refresh-btn {
            background: #6b7280;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            color: white;
            text-decoration: none;
        }
        .refresh-btn:hover {
            background: #4b5563;
        }
        .delete-month-btn {
            background: #ef4444;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 11px;
            color: white;
            border: none;
            cursor: pointer;
        }
        .delete-month-btn:hover {
            background: #dc2626;
        }
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }
            .header {
                padding: 16px;
            }
            .container {
                padding: 16px;
            }
            .table-header,
            .card-header,
            .actions {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>
<body>

    <!-- ========================================== -->
    <!-- EN-TÊTE (HEADER) -->
    <!-- ========================================== -->
    <div class="header">
        <div class="logo">BudgetCI</div>
        <div class="nav">
            <a href="{{ route('dashboard') }}">Tableau de bord</a>
            <a href="{{ route('profile.edit') }}">Mon profil</a>
            <span>{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit">Déconnexion</button>
            </form>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- CONTENEUR PRINCIPAL -->
    <!-- ========================================== -->
    <div class="container">

        <!-- ========================================== -->
        <!-- MESSAGES DE SUCCÈS -->
        <!-- ========================================== -->
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- ========================================== -->
        <!-- SÉLECTEUR DE MOIS -->
        <!-- ========================================== -->
        <div class="card" style="margin-bottom: 24px; background: white;">
            <form method="GET" action="{{ route('dashboard') }}" style="display: flex; justify-content: space-between; align-items: center; padding: 20px; flex-wrap: wrap; gap: 16px;">
                <div>
                    <h3 style="margin: 0;">📅 Mois affiché</h3>
                    <p style="margin: 5px 0 0 0; font-size: 13px; color: #6b7280;">
                        {{ \Carbon\Carbon::parse($selectedMonth ?? date('Y-m'))->translatedFormat('F Y') }}
                    </p>
                </div>
                <div style="display: flex; gap: 12px;">
                    <input type="month" name="month" value="{{ $selectedMonth ?? date('Y-m') }}" style="padding: 10px; border-radius: 8px; border: 1px solid #ccc; font-size: 14px;">
                    <button type="submit" class="btn btn-small">Voir ce mois</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-small" style="background: #6b7280;">🔄 Mois actuel</a>
                </div>
            </form>
        </div>

        <!-- ========================================== -->
        <!-- SOLDE PRINCIPAL -->
        <!-- ========================================== -->
        <div class="balance-card">
            <h2>Solde disponible</h2>
            <div class="amount">{{ number_format($balance, 0, ',', ' ') }} FCFA</div>
        </div>

        <!-- ========================================== -->
        <!-- BOUTONS D'ACTIONS RAPIDES -->
        <!-- ========================================== -->
        <div class="actions">
            <a href="{{ route('incomes.create') }}" class="btn">+ Ajouter un revenu</a>
            <a href="{{ route('expenses.create') }}" class="btn btn-outline">+ Ajouter une dépense</a>
        </div>

        <!-- ========================================== -->
        <!-- STATISTIQUES DU MOIS -->
        <!-- ========================================== -->
        <div class="grid">
            
            <!-- Carte des REVENUS -->
            <div class="card">
                <div class="card-header">
                    <h3>Revenus ce mois</h3>
                    @if($totalIncomes > 0)
                        <form method="POST" action="{{ route('incomes.destroyMonth') }}" class="inline-form" onsubmit="return confirm('Supprimer tous les revenus du mois ' + '{{ \Carbon\Carbon::parse($selectedMonth ?? date('Y-m'))->translatedFormat('F Y') }}' + ' ?');">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="month" value="{{ $selectedMonth ?? date('Y-m') }}">
                            <button type="submit" class="btn btn-danger btn-small">Supprimer</button>
                        </form>
                    @endif
                </div>
                <div class="value positive">+ {{ number_format($totalIncomes, 0, ',', ' ') }} FCFA</div>
            </div>
            
            <!-- Carte des DÉPENSES -->
            <div class="card">
                <div class="card-header">
                    <h3>Dépenses ce mois</h3>
                    @if($totalExpenses > 0)
                        <form method="POST" action="{{ route('expenses.destroyMonth') }}" class="inline-form" onsubmit="return confirm('Supprimer toutes les dépenses du mois ' + '{{ \Carbon\Carbon::parse($selectedMonth ?? date('Y-m'))->translatedFormat('F Y') }}' + ' ?');">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="month" value="{{ $selectedMonth ?? date('Y-m') }}">
                            <button type="submit" class="btn btn-danger btn-small">Supprimer</button>
                        </form>
                    @endif
                </div>
                <div class="value negative">- {{ number_format($totalExpenses, 0, ',', ' ') }} FCFA</div>
            </div>
            
            <!-- Carte OBJECTIF D'ÉPARGNE -->
            <div class="card">
                <h3>Objectif d'épargne</h3>
                <div class="value">{{ number_format($savingsGoalAmount, 0, ',', ' ') }} FCFA</div>
                <p style="font-size: 12px; color: #6b7280; margin-top: 4px;">Soit {{ $savingsGoalPercent }}% du revenu</p>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- ÉPARGNE RÉELLE ET TAUX -->
        <!-- ========================================== -->
        <div class="grid">
            
            <!-- Carte ÉPARGNE RÉELLE -->
            <div class="card">
                <h3>Épargne réelle</h3>
                <div class="value" style="color: {{ $savingsDifference >= 0 ? '#22c55e' : '#ef4444' }}">
                    {{ number_format($savingsActual, 0, ',', ' ') }} FCFA
                </div>
                <p class="advice {{ $adviceColor }}">
                    {{ $advice }}
                </p>
                @if($savingsDifference >= 0)
                    <p style="font-size: 12px; color: #22c55e; margin-top: 4px;">
                        +{{ number_format($savingsDifference, 0, ',', ' ') }} FCFA au-dessus de l'objectif
                    </p>
                @else
                    <p style="font-size: 12px; color: #ef4444; margin-top: 4px;">
                        {{ number_format(abs($savingsDifference), 0, ',', ' ') }} FCFA manquants
                    </p>
                @endif
            </div>
            
            <!-- Carte TAUX D'ÉPARGNE -->
            <div class="card">
                <h3>Taux d'épargne</h3>
                <div class="value">{{ $savingsRate }}%</div>
                <p style="font-size: 12px; color: #6b7280; margin-top: 4px;">De ton revenu total</p>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HISTORIQUE DES MOIS (AVEC BOUTONS SUPPRESSION) -->
        <!-- ========================================== -->
        @if(isset($availableMonths) && $availableMonths->count() > 0)
        <div class="table-container" style="margin-bottom: 24px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 12px;">
                <h3 style="margin: 0;">📆 Historique par mois</h3>
                <div style="display: flex; gap: 10px;">
                    <a href="{{ route('dashboard') }}" class="refresh-btn">🔄 Rafraîchir</a>
                    
                    <!-- Bouton pour TOUT SUPPRIMER -->
                    <form method="POST" action="{{ route('dashboard.month.delete') }}" class="inline-form" 
                          onsubmit="return confirm('⚠️ ATTENTION : Supprimer TOUS les mois avec toutes leurs données ? Cette action est IRRÉVERSIBLE !');">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="month" value="all">
                        <button type="submit" class="btn btn-danger btn-small" style="background: #dc2626;">🗑️ Tout supprimer</button>
                    </form>
                </div>
            </div>
            
            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                @foreach($availableMonths as $month)
                    @php
                        $moisObj = \Carbon\Carbon::parse($month . '-01');
                        // Compter le nombre de dépenses pour ce mois
                        $nbDepenses = \App\Models\Expense::where('user_id', auth()->id())
                            ->whereYear('date', $moisObj->year)
                            ->whereMonth('date', $moisObj->month)
                            ->count();
                        // Compter le nombre de revenus pour ce mois
                        $nbRevenus = \App\Models\Income::where('user_id', auth()->id())
                            ->whereYear('date', $moisObj->year)
                            ->whereMonth('date', $moisObj->month)
                            ->count();
                        $totalElements = $nbDepenses + $nbRevenus;
                    @endphp
                    
                    @if($totalElements > 0)
                        <div style="display: flex; align-items: center; gap: 5px;">
                            <!-- Lien vers le mois -->
                            <a href="{{ route('dashboard', ['month' => $month]) }}" 
                               style="text-decoration: none; background: {{ ($selectedMonth ?? date('Y-m')) == $month ? '#7c3aed' : '#f3f4f6' }}; padding: 8px 15px; border-radius: 25px; font-size: 13px; color: {{ ($selectedMonth ?? date('Y-m')) == $month ? 'white' : '#1f2937' }};">
                                {{ $moisObj->translatedFormat('F Y') }}
                                <span style="background: {{ ($selectedMonth ?? date('Y-m')) == $month ? 'rgba(255,255,255,0.2)' : '#e5e7eb' }}; padding: 2px 8px; border-radius: 20px; margin-left: 6px; font-size: 11px;">
                                    {{ $totalElements }}
                                </span>
                            </a>
                            
                            <!-- Bouton pour supprimer CE SEUL mois -->
                            <form method="POST" action="{{ route('dashboard.month.delete') }}" class="inline-form" 
                                  onsubmit="return confirm('Supprimer TOUTES les données du mois {{ $moisObj->translatedFormat('F Y') }} ? Action IRRÉVERSIBLE !');">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="month" value="{{ $month }}">
                                <button type="submit" class="delete-month-btn" title="Supprimer ce mois">❌</button>
                            </form>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        @else
            <div class="table-container" style="margin-bottom: 24px;">
                <h3>📆 Historique par mois</h3>
                <p class="empty">Aucun historique disponible. Ajoute des revenus ou dépenses pour commencer.</p>
            </div>
        @endif

        <!-- ========================================== -->
        <!-- LISTE DES DÉPENSES DU MOIS -->
        <!-- ========================================== -->
        <div class="table-container">
            <div class="table-header">
                <h3>Dépenses récentes</h3>
                @if(isset($recentExpenses) && $recentExpenses->count() > 0)
                    <form method="POST" action="{{ route('expenses.destroyMonth') }}" class="inline-form" onsubmit="return confirm('Supprimer toutes les dépenses du mois ' + '{{ \Carbon\Carbon::parse($selectedMonth ?? date('Y-m'))->translatedFormat('F Y') }}' + ' ?');">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="month" value="{{ $selectedMonth ?? date('Y-m') }}">
                        <button type="submit" class="btn btn-danger btn-small">Supprimer la liste</button>
                    </form>
                @endif
            </div>
            
            @if(isset($recentExpenses) && $recentExpenses->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Catégorie</th>
                            <th>Description</th>
                            <th class="amount">Montant</th>
                            <th class="amount">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentExpenses as $expense)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($expense->date)->format('d/m/Y') }}</td>
                            <td>{{ $expense->category }}</td>
                            <td>{{ $expense->description ?? '-' }}</td>
                            <td class="amount">{{ number_format($expense->amount, 0, ',', ' ') }} FCFA</td>
                            <td class="actions-cell">
                                <form method="POST" action="{{ route('expenses.destroy', $expense) }}" class="inline-form" onsubmit="return confirm('Supprimer cette dépense ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-small">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="empty">Aucune dépense pour ce mois</p>
            @endif
        </div>
        
    </div>
</body>
</html>