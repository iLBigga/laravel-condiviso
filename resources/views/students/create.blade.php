@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <h2>
            Aggiungi uno studente
        </h2>
    </div>

    <div class="container">
        <form action="{{ route('students.store') }}" method="POST">

            @csrf

            <p>
                <label for="name">Nome</label>
                <input type="text" style="@error('name') border-color: red @enderror" name="name" id="name" placeholder="Nome Studente">
                @error('name')
                    <div style="color:red; font-size: 12px" class="alert alert-danger">{{ $message }}</div>
                @enderror
            </p>

            <p>
                <label for="surname">Cognome</label>
                <input type="text" name="surname" id="surname" placeholder="Cognome">
            </p>

            <p>
                <label for="date_of_birth">Data di nascita</label>
                <input type="date" name="date_of_birth" id="date_of_birth">
            </p>

            <p>
                <label for="fiscal_code">Codice fiscale</label>
                <input type="text" name="fiscal_code" id="fiscal_code" placeholder="Codice fiscale">
            </p>

            <p>
                <label for="enrolment_date">Data di iscrizione</label>
                <input type="date" name="enrolment_date" id="enrolment_date">
            </p>

            <p>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Email">
            </p>

            <p>
                <input type="submit" value="salva">
            </p>

        </form>
        
        @if ($errors->any())
            <div class="alert alert-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif    
    </div>
</section>

@endsection