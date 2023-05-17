@extends('template.pageCommune')
@section('content')
    <h2 id="Titre_Acceuil">Bienvenue sur notre plateforme de maintenance informatique de 2ISA.</h2>
    <div id="container">
        <form id="login" action="logUser" method="POST"><label for="Login">Login* <span id="condition">(12
                    caractère
                    max)</span> :</label>
            <input type="text" id="Login" name="login" maxlength="12" required />
            <label for="password">Mot de passe* <span id="condition">(10 caractère max)</span> :</label>
            <input type="password" id="password" name="pwd" maxlength="10" required />
            <button type="submit">
                Envoyer
            </button>
            <button type="reset">
                Effacer
            </button>
            <p><a href="mdpoubli">Mot de pass oublié?</a></p>
            <p>Les champs avec * sont obligatoire</p>
            <p><a id="creation" href="creationCompte">Creation de compte</a></p>
    </div>
    </form>
    <a href="creationTicket">creationTicket</a>
    <a href="creationCompte">creationCompte</a>
    <a href="logUser">logUser</a>
    <a href="messageUser">messageUser</a>
    <a href="statutTicket">statutTicket</a>
    <a href="creationMessage">creationMessage</a>
    <p><a href="mdpoubli">mdpoubli</a></p>
@endsection
