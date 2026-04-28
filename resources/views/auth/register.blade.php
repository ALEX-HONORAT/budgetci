<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BudgetCI - Inscription</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Carte d'inscription */
        .register-container {
            max-width: 450px;
            width: 100%;
        }

        .register-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Logo */
        .logo {
            text-align: center;
            margin-bottom: 32px;
        }

        .logo h1 {
            font-size: 28px;
            font-weight: 700;
            color: #7c3aed;
        }

        .logo p {
            color: #6b7280;
            font-size: 14px;
            margin-top: 8px;
        }

        /* Titre du formulaire */
        .form-title {
            font-size: 22px;
            font-weight: 700;
            color: #1f2937;
            text-align: center;
            margin-bottom: 24px;
        }

        /* Groupes de formulaire */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.2s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 2px rgba(124, 58, 237, 0.1);
        }

        .form-input.error {
            border-color: #ef4444;
        }

        /* Messages d'erreur */
        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 6px;
        }

        /* Bouton d'inscription */
        .btn-register {
            width: 100%;
            background: #7c3aed;
            color: white;
            border: none;
            padding: 14px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 8px;
        }

        .btn-register:hover {
            background: #6d28d9;
            transform: translateY(-1px);
        }

        /* Lien vers connexion */
        .login-link {
            text-align: center;
            margin-top: 24px;
            font-size: 14px;
            color: #6b7280;
        }

        .login-link a {
            color: #7c3aed;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Séparateur */
        .separator {
            margin: 24px 0;
            text-align: center;
            position: relative;
        }

        .separator::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e5e7eb;
        }

        .separator span {
            background: white;
            padding: 0 12px;
            position: relative;
            color: #9ca3af;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <!-- Logo -->
            <div class="logo">
                <h1>BudgetCI</h1>
                <p>Gérez vos finances simplement</p>
            </div>

            <!-- Titre -->
            <div class="form-title">
                Créer un compte
            </div>

            <!-- Formulaire d'inscription -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nom complet -->
                <div class="form-group">
                    <label class="form-label" for="name">Nom complet</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="form-input @error('name') error @enderror" 
                           value="{{ old('name') }}" 
                           required 
                           autofocus 
                           autocomplete="name"
                           placeholder="Jean Dupont">
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Adresse email -->
                <div class="form-group">
                    <label class="form-label" for="email">Adresse email</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="form-input @error('email') error @enderror" 
                           value="{{ old('email') }}" 
                           required 
                           autocomplete="username"
                           placeholder="jean@exemple.com">
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mot de passe -->
                <div class="form-group">
                    <label class="form-label" for="password">Mot de passe</label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="form-input @error('password') error @enderror" 
                           required 
                           autocomplete="new-password"
                           placeholder="••••••••">
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmation du mot de passe -->
                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" 
                           id="password_confirmation" 
                           name="password_confirmation" 
                           class="form-input @error('password_confirmation') error @enderror" 
                           required 
                           autocomplete="new-password"
                           placeholder="••••••••">
                    @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bouton d'inscription -->
                <button type="submit" class="btn-register">
                    S'inscrire
                </button>

                <!-- Séparateur -->
                <div class="separator">
                    <span>ou</span>
                </div>

                <!-- Lien vers connexion -->
                <div class="login-link">
                    Déjà un compte ? 
                    <a href="{{ route('login') }}">Se connecter</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>