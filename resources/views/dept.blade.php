@extends('template.pageCommune')
@section('content')
    <table>
        <thead>
            <tr>
                <th>Dept No</th>
                <th>Dept name</th>
                <th>Dept loc</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($depts as $dept)
                <tr>
                    <td>{{ $dept->DEPTNO }}</td>
                    <td>{{ $dept->DNAME }}</td>
                    <td>{{ $dept->LOC }}</td>
                    <td><a href="{{ route('deptdetail', ['n' => $dept->DEPTNO]) }}">Détail</a></td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
@endsection
