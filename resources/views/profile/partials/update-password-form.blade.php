<section>
    <style>
        /* Style BudgetCI pour la mise à jour du mot de passe */
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
            position: relative;
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
            padding: 10px 46px 10px 12px;
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
        .budgetci-toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #6b7280;
            font-size: 18px;
            cursor: pointer;
            line-height: 1;
            padding: 4px;
        }
        .budgetci-toggle-password svg {
            width: 18px;
            height: 18px;
            display: block;
        }
        .budgetci-toggle-password:hover {
            color: #374151;
        }
        .budgetci-toggle-password .icon-eye-off {
            display: none;
        }
        .budgetci-toggle-password.is-visible .icon-eye {
            display: none;
        }
        .budgetci-toggle-password.is-visible .icon-eye-off {
            display: block;
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
    </style>

    <div class="budgetci-section">
        <div class="budgetci-section-header">
            <h2>🔒 Modifier mon mot de passe</h2>
            <p>Utilisez un mot de passe long et sécurisé pour protéger votre compte.</p>
        </div>

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <!-- Mot de passe actuel -->
            <div class="budgetci-form-group">
                <label class="budgetci-label" for="current_password">Mot de passe actuel</label>
                <div class="budgetci-input-wrap">
                    <input type="password" 
                           id="current_password" 
                           name="current_password" 
                           class="budgetci-input js-password-input" 
                           required>
                    <button type="button" class="budgetci-toggle-password" data-target="current_password" aria-label="Afficher le mot de passe">
                        <svg class="icon-eye" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1 1 0 010-.644C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178a1 1 0 010 .644C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0Z" />
                        </svg>
                        <svg class="icon-eye-off" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.585 10.587A2 2 0 0012 14a2 2 0 001.414-.586" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.88 5.09A10.958 10.958 0 0112 4.5c4.638 0 8.573 3.007 9.963 7.178a1 1 0 010 .644 11.054 11.054 0 01-4.043 5.145" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.61 6.61a11.053 11.053 0 00-4.573 5.068 1 1 0 000 .644C3.423 16.49 7.36 19.5 12 19.5a10.96 10.96 0 005.39-1.39" />
                        </svg>
                    </button>
                </div>
                @error('current_password', 'updatePassword')
                    <div class="budgetci-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nouveau mot de passe -->
            <div class="budgetci-form-group">
                <label class="budgetci-label" for="password">Nouveau mot de passe</label>
                <div class="budgetci-input-wrap">
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="budgetci-input js-password-input" 
                           required>
                    <button type="button" class="budgetci-toggle-password" data-target="password" aria-label="Afficher le mot de passe">
                        <svg class="icon-eye" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1 1 0 010-.644C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178a1 1 0 010 .644C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0Z" />
                        </svg>
                        <svg class="icon-eye-off" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.585 10.587A2 2 0 0012 14a2 2 0 001.414-.586" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.88 5.09A10.958 10.958 0 0112 4.5c4.638 0 8.573 3.007 9.963 7.178a1 1 0 010 .644 11.054 11.054 0 01-4.043 5.145" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.61 6.61a11.053 11.053 0 00-4.573 5.068 1 1 0 000 .644C3.423 16.49 7.36 19.5 12 19.5a10.96 10.96 0 005.39-1.39" />
                        </svg>
                    </button>
                </div>
                @error('password', 'updatePassword')
                    <div class="budgetci-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirmation -->
            <div class="budgetci-form-group">
                <label class="budgetci-label" for="password_confirmation">Confirmer le mot de passe</label>
                <div class="budgetci-input-wrap">
                    <input type="password" 
                           id="password_confirmation" 
                           name="password_confirmation" 
                           class="budgetci-input js-password-input" 
                           required>
                    <button type="button" class="budgetci-toggle-password" data-target="password_confirmation" aria-label="Afficher le mot de passe">
                        <svg class="icon-eye" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1 1 0 010-.644C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178a1 1 0 010 .644C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0Z" />
                        </svg>
                        <svg class="icon-eye-off" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.585 10.587A2 2 0 0012 14a2 2 0 001.414-.586" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.88 5.09A10.958 10.958 0 0112 4.5c4.638 0 8.573 3.007 9.963 7.178a1 1 0 010 .644 11.054 11.054 0 01-4.043 5.145" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.61 6.61a11.053 11.053 0 00-4.573 5.068 1 1 0 000 .644C3.423 16.49 7.36 19.5 12 19.5a10.96 10.96 0 005.39-1.39" />
                        </svg>
                    </button>
                </div>
                @error('password_confirmation', 'updatePassword')
                    <div class="budgetci-error">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: flex; align-items: center; gap: 16px;">
                <button type="submit" class="budgetci-btn-primary">
                    💾 Enregistrer
                </button>

                @if (session('status') === 'password-updated')
                    <span class="budgetci-success">✓ Mot de passe mis à jour !</span>
                @endif
            </div>
        </form>
    </div>

    <script>
        document.querySelectorAll('.budgetci-toggle-password').forEach((button) => {
            button.addEventListener('click', () => {
                const input = document.getElementById(button.dataset.target);

                if (!input) {
                    return;
                }

                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                button.classList.toggle('is-visible', isHidden);
                button.setAttribute('aria-label', isHidden ? 'Masquer le mot de passe' : 'Afficher le mot de passe');
            });
        });
    </script>
</section>
