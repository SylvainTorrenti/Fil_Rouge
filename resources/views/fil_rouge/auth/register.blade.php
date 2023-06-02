@extends('template.pageCommune')
@section('content')
    <div id="containerCreat">
        <form id="creationCompte" action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name">Nom*</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus />
            </div>
            @error('name')
                {{ $message }}
            @enderror
            <label for="Prenom">Prenom*</label>
            <input type="text" id="Prenom" name="Prenom" value="{{ old('Prenom') }}" />
            @error('Prenom')
                {{ $message }}
            @enderror
            <div>
                <label for="password">Mot de passe*</label>
                <input type="password" name="password" required />
            </div>
            @error('password')
                {{ $message }}
            @enderror
            <div>
                <label for="password_confirmation">Confirmer le mot de passe*</label>
                <input type="password" name="password_confirmation" required />
            </div>
            @error('password_confirmation')
                {{ $message }}
            @enderror

            <div>
                <label for="email">Email*</label>
                <input type="email" name="email" value="{{ old('email') }}" required />
            </div>
            @error('email')
                {{ $message }}
            @enderror
            <label for="Telephone">Telephone</label>
            <input type="tel" id="Telephone" name="Telephone" value="{{ old('Telephone') }}" />
            @error('Telephone')
                {{ $message }}
            @enderror
            <button type="submit">
                Envoyer
            </button>
            <button type="reset">
                Effacer
            </button>
            <p>Les champs avec * sont obligatoire</p>
    </div>
    <a href="{{ route('login') }}">Déjà enregistré ?</a>
    </form>
    <p><a href="acceuil">Retour a enlever</a></p>
@endsection
