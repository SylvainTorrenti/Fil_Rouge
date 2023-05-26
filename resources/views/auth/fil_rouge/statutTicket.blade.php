@extends('template.pageCommune')
@section('content')
    <div id="statut">
        <h2><strong>Ticket Numero : </strong>{{ $ticket->Id }}</h2>
        <p><strong>Le ticket concerne : </strong>{{ $ticket->Sujet }}</p>
        <p><strong>La panne est : </strong>{{ $ticket->Type_panne_id }}</p>
        <p><strong>Message :</strong>
        <ul>
            @if ($messages == null)
                <li>Il n'y a pas encore de message</li>
            @else
                @forelse ($messages as $message)
                    <li><span id="date">{{ $message->CreatedAt }} :</span> {{ $message->Content }} </li>
                @empty
                @endforelse
            @endif
            <p><button><a href="{{ route('creationMessage', ['n' => $ticket->Id]) }}">Ecrire un message</a></button></p>
        </ul>
        </p>
        <p><strong>L'auteur est : </strong>{{ $ticket->User_id }}</p>
        <p><strong>Le ticket a été créé le :</strong>{{ $ticket->CreatedAt }}</p>
        <p><strong>Statut : </strong>{{ $statut->Label }} <button><a href="">Changer le statut</a></button></p>

        <p><a href="{{ route('logUser') }}">Retour a enlever</a></p>
    @endsection
