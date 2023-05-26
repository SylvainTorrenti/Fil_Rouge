@extends('template.pageCommune')
@section('content')
    <div id="containerCreat">
        <form id="creationCompte" action="{{ route('storeAccount') }}" method="get">
            @csrf
            <label for="Login">Login* <span id="condition">(12
                    caractère
                    max)</span> :</label>
            <input type="text" id="Login" name="login" maxlength="12" required />
            @error('login')
                {{ $message }}
            @enderror
            <label for="password">Mot de passe* <span id="condition">(10 caractère max)</span> :</label>
            <input type="password" id="password" name="pwd" required />
            @error('pwd')
                {{ $message }}
            @enderror
            <label for="password repeat">Repeter le mot de pass* <span id="condition">(10 caractère max)</span>
                :</label>
            <input type="password" id="password repeat" name="rpwd" required />
            @error('rpwd')
                {{ $message }}
            @enderror
            <label for="email">Email*:</label>
            <input type="email" id="Email" name="Email" required />
            @error('Email')
                {{ $message }}
            @enderror
            <label for="Nom">Nom:</label>
            <input type="text" id="Nom" name="Nom" />
            @error('Nom')
                {{ $message }}
            @enderror
            <label for="Prenom">Prenom:</label>
            <input type="text" id="Prenom" name="Prenom" />
            @error('Prenom')
                {{ $message }}
            @enderror
            <label for="Telephone">Telephone:</label>
            <input type="tel" id="Telephone" name="Telephone" />
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
    </form>
    <p><a href="acceuil">Retour a enlever</a></p>
@endsection
