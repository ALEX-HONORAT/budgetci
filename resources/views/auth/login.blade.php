<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BudgetCI - Connexion</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6; /* Gris très clair, pas de dégradé */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            display: flex;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1); /* Ombre plus douce */
            width: 900px;
            max-width: 95%;
            min-height: 500px;
        }
        
        /* Colonne gauche - Gris clair (pas bleu) */
        .left {
            background: #f9fafb; /* Gris très clair */
            color: #1f2937; /* Texte sombre */
            padding: 60px;
            width: 45%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .left .logo {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #2563eb; /* Logo bleu */
        }
        
        .left h2 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .left p {
            font-size: 14px;
            line-height: 1.6;
            color: #6b7280;
        }
        
        /* Colonne droite - Blanche */
        .right {
            padding: 60px;
            width: 55%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .right h3 {
            font-size: 24px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }
        
        .right .subtitle {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .password-wrap {
            position: relative;
        }
        
        label {
            display: block;
            color: #374151;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 6px;
        }
        
        input {
            width: 100%;
            padding: 12px 44px 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s;
        }
        
        input:focus {
            outline: none;
            border-color: #3b82f6;
        }
        
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #6b7280;
            cursor: pointer;
            padding: 4px;
            line-height: 1;
        }
        
        .toggle-password:hover {
            color: #374151;
        }
        
        .toggle-password svg {
            width: 18px;
            height: 18px;
            display: block;
        }
        
        .toggle-password .icon-eye-off {
            display: none;
        }
        
        .toggle-password.is-visible .icon-eye {
            display: none;
        }
        
        .toggle-password.is-visible .icon-eye-off {
            display: block;
        }
        
        .forgot {
            text-align: right;
            margin-bottom: 20px;
        }
        
        .forgot a {
            color: #6b7280;
            font-size: 12px;
            text-decoration: none;
        }
        
        .forgot a:hover {
            color: #3b82f6;
        }
        
        .login-submit {
            width: 100%;
            padding: 14px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        
        .login-submit:hover {
            background: #1d4ed8;
        }
        
        .signup {
            text-align: center;
            margin-top: 25px;
            color: #6b7280;
            font-size: 13px;
        }
        
        .signup a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }
        
        .error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Colonne gauche - Gris clair -->
        <div class="left">
            <div class="logo">BudgetCI</div>
            <h2>Hey, Hello!</h2>
            <p>Gérez vos revenus et dépenses en FCFA. Suivez votre épargne et atteignez vos objectifs financiers simplement.</p>
        </div>
        
        <!-- Colonne droite - Blanche -->
        <div class="right">
            <h3>ACCEDEZ A BUGET CI</h3>
            <p class="subtitle">Connectez-vous pour accéder à votre compte</p>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label>Adresse email</label>
                    <input type="email" name="email" placeholder="votre@email.com" value="{{ old('email') }}" required autofocus>
                    @error('email')<div class="error">{{ $message }}</div>@enderror
                </div>
                
                <div class="form-group">
                    <label>Mot de passe</label>
                    <div class="password-wrap">
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                        <button type="button" class="toggle-password" data-target="password" aria-label="Afficher le mot de passe">
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
                    @error('password')<div class="error">{{ $message }}</div>@enderror
                </div>
                
                <div class="forgot">
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </div>
                
                <button type="submit" class="login-submit">Login</button>
                
                <div class="signup">
                    Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach((button) => {
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
</body>
</html>
