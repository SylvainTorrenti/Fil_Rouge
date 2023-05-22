@extends('template.pageCommune')
@section('content')
    <div id="statut">
        <table>
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Materiel</th>
                    <th>Panne</th>
                    <th>Message</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ddddddddddddddddddddddddddddd</td>
                    <td>ddddddddddddddddddddddddddddd</td>
                    <td>ddddddddddddddddddddddddddddd</td>
                    <td>{{ Request::get('message') }}</td>
                    <td>dddddddddddddddddddddddddddddggggggggggggggggggggggggggggggggggggggggggggggggggggg sddddddddddd
                        ddddddddddddd</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p><a href="acceuil">Retour a enlever</a></p>
@endsection
