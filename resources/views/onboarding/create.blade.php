<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Configuration de votre profil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('onboarding.store') }}">
                        @csrf

                        <!-- Activité -->
                        <div class="mb-4">
                            <label for="activity" class="block text-sm font-medium text-gray-700">
                                Votre activité / métier
                            </label>
                            <input type="text" name="activity" id="activity" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   placeholder="Ex: Moto-taxi, Commerçante, Dev freelance"
                                   value="{{ old('activity') }}" required>
                            @error('activity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Mode de revenu -->
                        <div class="mb-4">
                            <label for="income_mode" class="block text-sm font-medium text-gray-700">
                                Mode de revenu
                            </label>
                            <select name="income_mode" id="income_mode" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="">-- Choisir --</option>
                                <option value="fixe" {{ old('income_mode') == 'fixe' ? 'selected' : '' }}>Fixe mensuel</option>
                                <option value="journalier" {{ old('income_mode') == 'journalier' ? 'selected' : '' }}>Journalier</option>
                                <option value="projet" {{ old('income_mode') == 'projet' ? 'selected' : '' }}>Par projet</option>
                                <option value="irregulier" {{ old('income_mode') == 'irregulier' ? 'selected' : '' }}>Irrégulier</option>
                            </select>
                            @error('income_mode')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Montant de base -->
                        <div class="mb-4">
                            <label for="base_amount" class="block text-sm font-medium text-gray-700">
                                Revenu habituel (FCFA)
                            </label>
                            <input type="number" name="base_amount" id="base_amount" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   placeholder="Ex: 8000"
                                   value="{{ old('base_amount') }}" required min="0">
                            @error('base_amount')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Objectif épargne -->
                        <div class="mb-4">
                            <label for="savings_goal" class="block text-sm font-medium text-gray-700">
                                Objectif d'épargne mensuel (FCFA) - Optionnel
                            </label>
                            <input type="number" name="savings_goal" id="savings_goal" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   placeholder="Ex: 30000"
                                   value="{{ old('savings_goal') }}" min="0">
                            @error('savings_goal')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Bouton -->
                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Enregistrer mon profil
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
