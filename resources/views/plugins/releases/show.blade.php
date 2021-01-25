@extends('layouts.plugins')

@section('title', $plugin->name)

@section('content')
    {{--    <div class="bg-foreground pb-4 px-4 rounded-md w-full text-white">--}}
    <x-card :title="$plugin->name" class="">

        <x-slot name="contextButtons">
{{--            <a href="{{ route('plugins.edit', ['plugin' => $plugin]) }}"><i class="fas fa-pencil-alt"></i></a>--}}
{{--            <a href="{{ route('plugins.edit', ['plugin' => $plugin]) }}"><i class="far fa-edit"></i></a>--}}
            @if(Auth::user() == $plugin->user)
                <a href="{{ route('plugins.edit', ['plugin' => $plugin]) }}"><i class="fas fa-edit"></i></a>
            @endif
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

        <div class="w-full flex px-2 mt-2">
            <x-releases-table :plugin="$plugin"/>
        </div>
        <div class="w-full mt-6 mb-3">
            @if(Auth::user() == $plugin->user)
                <a class="rounded bg-green-600 p-3 hover:bg-green-500" href="{{ route('plugin-releases.create', ['plugin' => $plugin]) }}">New</a>
            @endif
        </div>
    </x-card>
    {{--    </div>--}}
@endsection
