@extends('template.pageCommune')
@section('content')
    <div>

        @if (auth()->user()->isAdmin())
            <h2>Tous les tickets :</h2>
            <ul id="ulTicket">
                @forelse ($tickets as $ticket)
                    <ul>
                        <li>
                            <span id="titreTicket">Ticket {{ $ticket->Id }} : </span>
                        </li>
                        <ul>
                            <li><strong>Sujet : </strong>{{ $ticket->Materiel }} </li>
                            <li><strong>Auteur : </strong>{{ $ticket->prenom }} {{ $ticket->name_autor }}</li>
                            <li><strong>Date de creations : </strong>{{ $ticket->CreatedAt }}</li>
                            @if ($ticket->UpdatedAt != null)
                                <li><strong>Derniére mise à jour faite le : </strong>{{ $ticket->UpdatedAt }}</li>
                            @endif
                            <li><strong>Status : </strong>{{ $ticket->label_status }}</li>
                            <li><button><a href="{{ route('statutTicket', ['ticketId' => $ticket->Id]) }}">Info</a></button>
                            </li>

                        </ul>

                    </ul>

                @empty
                @endforelse
            @elseif ($tickets != null)
                <h2>Vos tickets :</h2>
                <ul id="ulTicket">
                    @forelse ($tickets as $ticket)
                        <ul>
                            <li>
                                <span id="titreTicket">Ticket {{ $ticket->Id }} : </span>
                            </li>
                            <ul>
                                <li><strong>Sujet : </strong>{{ $ticket->Sujet }} </li>
                                <li><strong>Date de creations : </strong>{{ $ticket->CreatedAt }}</li>
                                @if ($ticket->UpdatedAt != null)
                                    <li><strong>Derniére mise à jour faite le : </strong>{{ $ticket->UpdatedAt }}</li>
                                @endif
                                <li><strong>Status : </strong>{{ $ticket->label_status }}</li>
                                <li><button><a
                                            href="{{ route('statutTicket', ['ticketId' => $ticket->Id]) }}">Info</a></button>
                                </li>

                            </ul>

                        </ul>
                    @empty
                    @endforelse
                    <div><button><a href="{{ route('creationTicket') }}">créer un ticket</a></button></div>
                @else
                    <div>Vous n'avez pas de tickets</div>
                    <div><button><a href="{{ route('creationTicket') }}">créer un ticket</a></button></div>
        @endif
        </ul>


    </div>

@endsection
