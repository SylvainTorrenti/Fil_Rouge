@extends('template.pageCommune')
@section('content')
    <div id="containerCreat">
        <form id="creationCompte" action="" method="POST"><label for="Login">Login* <span id="condition">(12
                    caractère
                    max)</span> :</label>
            <input type="text" id="Login" name="login" maxlength="12" required />
            <label for="password">Mot de passe* <span id="condition">(10 caractère max)</span> :</label>
            <input type="password" id="password" name="pwd" maxlength="10" required />
            <label for="password repeat">Repeter le mot de pass* <span id="condition">(10 caractère max)</span>
                :</label>
            <input type="password" id="password repeat" name="rpwd" maxlength="10" required />
            <label for="email">Email*:</label>
            <input type="email" id="Email" name="Email" required />
            <label for="Nom">Nom:</label>
            <input type="text" id="Nom" name="Nom" />
            <label for="Prenom">Prenom:</label>
            <input type="text" id="Prenom" name="Prenom" />
            <label for="Telephone">Telephone:</label>
            <input type="tel" id="Telephone" name="Telephone" />
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
