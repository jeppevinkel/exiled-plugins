@extends('layouts.plugins')

@section('content')
    <div class="flex items-center">
        <div class="md:w-full md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <x-card title="Home">

                <div class="w-full p-6">
                    <p class="text-gray-200">
                        You are logged in!
                    </p>
                </div>
            </x-card>
        </div>
    </div>
@endsection
