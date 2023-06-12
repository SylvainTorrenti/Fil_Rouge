@extends('template.pageCommune')
@section('content')
    <div>
        @if (auth()->user()->isAdmin())
            <h2 class="titre">Tous les tickets :</h2>

            @forelse ($tickets as $ticket)
                <div class="titreTicket">Ticket {{ $ticket->Id }} : </div>

                <div class="listeTicket">
                    <p><strong>Matériel : </strong>{{ $ticket->Materiel }}</p>
                    <p><strong>Le probléme rencontré est :</strong>{{ $ticket->Sujet }}</p>
                    <p><strong>Auteur : </strong>{{ $ticket->prenom }} {{ $ticket->name_autor }}</p>
                    <p><strong>Date de creation : </strong>{{ $ticket->CreatedAt }}</p>
                    @if ($ticket->label_status == 'Résolu')
                        <p><strong>Le ticket a été fermé le :
                            </strong>{{ $ticket->UpdatedAt }}</p>
                    @endif
                    @if ($ticket->UpdatedAt != null && $ticket->label_status == 'En cours')
                        <p><strong>Derniére mise à jour faite le :
                            </strong>{{ $ticket->UpdatedAt }}</p>
                    @endif
                    <p><strong>Statut : </strong>{{ $ticket->label_status }}</p>
                    <p class="info"><button class="bouttonInfo"><a class="link"
                                href="{{ route('statutTicket', ['ticketId' => $ticket->Id]) }}">Info</a></button></p>
                </div>


            @empty
            @endforelse
        @elseif ($tickets != null)
            <div class="divButonCreateTicket"><button class="butonCreateTicket"><a href="{{ route('creationTicket') }}">Créer
                        un
                        ticket</a></button></div>
            <h2 class="titre">Vos tickets :</h2>
            @forelse ($tickets as $ticket)
                <div class="titreTicket">Ticket {{ $ticket->Id }} : </div>

                <div class="listeTicket">
                    <p><strong>Matériel : </strong>{{ $ticket->Materiel }}</p>
                    <p><strong>Le probléme rencontré est : </strong>{{ $ticket->Sujet }}</p>
                    <p><strong>Date de creation : </strong>{{ $ticket->CreatedAt }}</p>
                    @if ($ticket->label_Status == 'Résolu')
                        <p><strong>Le ticket a été fermé le :
                            </strong>{{ $ticket->UpdatedAt }}</p>
                    @endif
                    @if ($ticket->UpdatedAt != null && $ticket->label_status == 'En cours')
                        <p><strong>Derniére mise à jour faite le :
                            </strong>{{ $ticket->UpdatedAt }}</p>
                    @endif
                    <p><strong>Statut : </strong>{{ $ticket->label_status }}</p>
                    <p class="info"><button class="bouttonInfo"><a class="link"
                                href="{{ route('statutTicket', ['ticketId' => $ticket->Id]) }}">Info</a></button></p>

                </div>

            @empty
            @endforelse
        @else
            <div class="divButonCreateTicket"><button class="butonCreateTicket"><a
                        href="{{ route('creationTicket') }}">Créer un
                        ticket</a></button></div>
            <div>Vous n'avez pas de tickets</div>
        @endif
        </ul>
    </div>
@endsection
