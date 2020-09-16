@extends('layouts.plugins')

@section('title', $plugin->name)

@section('content')
    {{--    <div class="bg-foreground pb-4 px-4 rounded-md w-full text-white">--}}
    <x-card :title="$plugin->name" class="">

        <x-slot name="contextButtons">
            <a href="{{ route('plugins.edit', ['plugin' => $plugin]) }}"><i class="fas fa-pencil-alt"></i></a>
            <a href="{{ route('plugins.edit', ['plugin' => $plugin]) }}"><i class="far fa-edit"></i></a>
            <a href="{{ route('plugins.edit', ['plugin' => $plugin]) }}"><i class="fas fa-edit"></i></a>
            @if(count($plugin->releases))
                <a href="{{ route('plugin-releases.show', ['pluginRelease' => $plugin->getLatestRelease()]) }}"><i class="fa fa-download" aria-hidden="true"></i></a>
            @endif
        </x-slot>

        {{--        <div class="">--}}
        {{--            <x-plugin-header :plugin="$plugin"/>--}}
        {{--        </div>--}}

        <div class="pt-2 pb-2">
            <x-plugin-nav-bar :plugin="$plugin"/>
        </div>

        <div class="w-full px-2 mt-2 markdown">
            {{ Illuminate\Mail\Markdown::parse($plugin->description) }}
        </div>
        <div class="overflow-x-auto mt-6">

        </div>
    </x-card>
    {{--    </div>--}}
@endsection
