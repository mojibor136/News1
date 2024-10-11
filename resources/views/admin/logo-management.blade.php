@extends('admin.layout.layout')
@section('title', 'Logo-management')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <style>
        .btn-g {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        @media (max-width: 768px) {
            .file-w {
                width: 100px;
            }
        }
    </style>

    <body>
        @livewire('logo-manage')
    </body>

    </html>
@endsection
