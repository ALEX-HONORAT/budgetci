<section class="space-y-6">
    <style>
        /* Style BudgetCI pour la suppression de compte */
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
        .budgetci-btn-danger {
            background: #ef4444;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        .budgetci-btn-danger:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }
        .budgetci-btn-secondary {
            background: #f3f4f6;
            color: #374151;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        .budgetci-btn-secondary:hover {
            background: #e5e7eb;
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
        .budgetci-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .budgetci-modal-content {
            background: white;
            border-radius: 20px;
            max-width: 500px;
            width: 90%;
            padding: 24px;
        }
        .budgetci-error {
            color: #ef4444;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>

    <div class="budgetci-section">
        <div class="budgetci-section-header">
            <h2>🗑️ Supprimer mon compte</h2>
            <p>
                Une fois votre compte supprimé, toutes vos données (revenus, dépenses, profil) seront définitivement effacées.
                Avant de supprimer votre compte, assurez-vous d'avoir sauvegardé les informations importantes.
            </p>
        </div>

        <button class="budgetci-btn-danger" id="openDeleteModal">
            Supprimer mon compte
        </button>
    </div>

    <!-- Modal de confirmation -->
    <div id="deleteModal" class="budgetci-modal" style="display: none;">
        <div class="budgetci-modal-content">
            <h2 style="font-size: 18px; font-weight: 700; margin-bottom: 12px; color: #1f2937;">
                Êtes-vous sûr de vouloir supprimer votre compte ?
            </h2>
            <p style="font-size: 14px; color: #6b7280; margin-bottom: 20px;">
                Cette action est irréversible. Toutes vos données seront perdues.
                Veuillez entrer votre mot de passe pour confirmer.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div style="margin-bottom: 20px;">
                    <input type="password" 
                           name="password" 
                           class="budgetci-input" 
                           placeholder="Votre mot de passe"
                           required>
                    @if ($errors->userDeletion->has('password'))
                        <div class="budgetci-error">{{ $errors->userDeletion->first('password') }}</div>
                    @endif
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 12px;">
                    <button type="button" class="budgetci-btn-secondary" id="closeDeleteModal">
                        Annuler
                    </button>
                    <button type="submit" class="budgetci-btn-danger">
                        Supprimer définitivement
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Gestion de l'ouverture/fermeture du modal
        const openBtn = document.getElementById('openDeleteModal');
        const modal = document.getElementById('deleteModal');
        const closeBtn = document.getElementById('closeDeleteModal');

        openBtn.onclick = () => modal.style.display = 'flex';
        closeBtn.onclick = () => modal.style.display = 'none';
        window.onclick = (e) => { if (e.target === modal) modal.style.display = 'none'; }
    </script>
</section>