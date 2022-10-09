@extends('emails.layout')
@section('content')
    <h2 style="font-weight: normal;color: #000000;font-size: 24px;">Bedankt voor uw inschrijving</h2>
    <p>Beste {{ $name }}</p>
    <p>
        Met deze link kan uw inschrijving worden aangepast, bewaar hem goed.
        <a
            href="{{ $link }}"
            style="color: #19a4d4;text-decoration: none;word-wrap: break-word;">{{ $link }}</a>
    </p>
@endsection
