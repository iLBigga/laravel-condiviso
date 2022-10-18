@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <a href="{{ route('students.create') }}">Aggiungi studente</a>
    </div>
</section>

<table>
    <thead>
        <tr>
            <th>Alunno</th>
            <th>Data di nascita</th>
            <th>Codice fiscale</th>
            <th>Data iscrizione</th>
            <th>Numero matricola</th>
            <th>email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $s)
            <tr>
                <td>
                    <a href="{{ route('students.show', $s) }}">
                        {{ $s->name }} {{ $s->surname }}
                    </a>
                </td>
                <td> {{ $s->date_of_birth }}</td>
                <td>{{ $s->fiscal_code }}</td>
                <td>{{ $s->enrolment_date }}</td>
                <td>{{ $s->registration_number }}</td>
                <td>{{ $s->email }}</td>
                <td>
                    <a href="{{ route('students.edit', $s) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('students.destroy', $s) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="Elimina">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection