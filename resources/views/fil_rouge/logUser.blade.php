@extends('template.pageCommune')
@section('content')
    <div>

        <h2>Vos tickets :</h2>
        <ul id="ulTicket">
            @if (
                $tickets != null ||
                    auth()->user()->isAdmin())
                @forelse ($tickets as $ticket)
                    <ul>
                        <li>
                            <span id="titreTicket">Ticket {{ $ticket->Id }} : </span>
                        </li>
                        <ul>
                            <li><strong>Sujet : </strong>{{ $ticket->Sujet }} </li>
                            <li><strong>Panne : </strong>{{ $ticket->Type_panne_id }}</li>
                            {{-- Relier idTypePanne avec le nom de la panne --}}
                            <li><strong>Auteur : </strong>{{ $ticket->name_autor }}</li>
                            <li><strong>Date de creations : </strong>{{ $ticket->CreatedAt }}</li>
                            <li><strong>Date de mise a jour : </strong>{{ $ticket->UpdatedAt }}</li>
                            <li><strong>Status : </strong>{{ $ticket->label_status }}</li>
                            <li><button><a href="{{ route('statutTicket', ['n' => $ticket->Id]) }}">Info</a></button></li>
                            </li>
                            <li></li>
                        </ul>

                    </ul>
                @empty
                @endforelse
            @else
                <div>Vous n'avez pas de tickets</div>
            @endif
        </ul>


    </div>
    <div><button><a href="{{ route('creationTicket') }}">créer un ticket</a></button></div>
    <p><a href="{{ route('acceuil') }}">Retour a enlever</a></p>
@endsection
