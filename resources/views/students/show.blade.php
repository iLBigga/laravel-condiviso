@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{{ $student->name }} {{ $student->surname }}</h1>
    <div>
        <ul>
            <li>
                <span>Data di nascita:</span> {{ $student->date_of_birth }}
            </li>
            <li>
                <span>Codice fiscale:</span> {{ $student->fiscal_code }}
            </li>
            <li>
                <span>Data di iscrizione:</span> {{ $student->enrolment_date }}
            </li>
            <li>
                <span>Matricola:</span> {{ $student->registration_number }}
            </li>
            <li>
                <span>Email:</span> {{ $student->email }}
            </li>
        </ul>
    </div>
</div>
<div class="container">
    <a href="{{ route('students.edit', $student) }}">Modifica studente</a>

    <form action="{{ route('students.destroy', $student) }}" method="POST">
        @csrf
        @method('DELETE')

        <input type="submit" value="Elimina">
    </form>
</div>

<section>
    <div class="container">
        <h2>Elenco dei corsi di Laurea</h2>
    </div>
</section>
    
@endsection