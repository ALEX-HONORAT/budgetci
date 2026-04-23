<section>
    <style>
        /* Style BudgetCI pour les informations du profil */
        .budgetci-section {
            background: white;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 24px;
        }
        .budgetci-section-header h2 {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }
        .budgetci-section-header p {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 20px;
        }
        .budgetci-form-group {
            margin-bottom: 20px;
        }
        .budgetci-input-wrap {
            max-width: 420px;
        }
        .budgetci-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
        }
        .budgetci-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.2s;
        }
        .budgetci-input:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 2px rgba(124, 58, 237, 0.1);
        }
        .budgetci-btn-primary {
            background: #7c3aed;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        .budgetci-btn-primary:hover {
            background: #6d28d9;
            transform: translateY(-1px);
        }
        .budgetci-error {
            color: #ef4444;
            font-size: 12px;
            margin-top: 5px;
        }
        .budgetci-success {
            color: #22c55e;
            font-size: 13px;
            margin-left: 12px;
        }
        .budgetci-warning {
            background: #fef3c7;
            padding: 12px;
            border-radius: 10px;
            margin-top: 15px;
            font-size: 13px;
            color: #d97706;
        }
        .budgetci-link {
            color: #7c3aed;
            text-decoration: none;
            font-size: 13px;
        }
        .budgetci-link:hover {
            text-decoration: underline;
        }
    </style>

    <div class="budgetci-section">
        <div class="budgetci-section-header">
            <h2>👤 Informations du profil</h2>
            <p>Modifiez vos informations personnelles et votre adresse email.</p>
        </div>

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <!-- Nom -->
            <div class="budgetci-form-group">
                <label class="budgetci-label" for="name">Nom complet</label>
                <div class="budgetci-input-wrap">
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="budgetci-input" 
                           value="{{ old('name', $user->name) }}" 
                           required>
                </div>
                @error('name')
                    <div class="budgetci-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="budgetci-form-group">
                <label class="budgetci-label" for="email">Adresse email</label>
                <div class="budgetci-input-wrap">
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="budgetci-input" 
                           value="{{ old('email', $user->email) }}" 
                           required>
                </div>
                @error('email')
                    <div class="budgetci-error">{{ $message }}</div>
                @enderror

                <!-- Vérification email -->
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="budgetci-warning">
                        ⚠️ Votre adresse email n'est pas vérifiée.
                        <form id="send-verification" method="post" action="{{ route('verification.send') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="budgetci-link" style="background: none; border: none; cursor: pointer;">
                                Cliquez ici pour renvoyer le lien de vérification
                            </button>
                        </form>
                    </div>
                @endif

                @if (session('status') === 'verification-link-sent')
                    <div class="budgetci-success" style="margin-top: 10px;">
                        ✓ Un nouveau lien de vérification a été envoyé à votre email.
                    </div>
                @endif
            </div>

            <div style="display: flex; align-items: center; gap: 16px;">
                <button type="submit" class="budgetci-btn-primary">
                    💾 Enregistrer
                </button>

                @if (session('status') === 'profile-updated')
                    <span class="budgetci-success">✓ Profil mis à jour !</span>
                @endif
            </div>
        </form>
    </div>
</section>
