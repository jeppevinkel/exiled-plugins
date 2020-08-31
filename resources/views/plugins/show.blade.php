@extends('layouts.plugins')

@section('title', $plugin->name)

@section('content')
    <div class="bg-foreground pb-4 px-4 rounded-md w-full text-white">
        <div class="">
            <x-plugin-header :plugin="$plugin"/>
        </div>

        <div class="pt-2 pb-2">
            <x-plugin-nav-bar :plugin="$plugin"/>
        </div>

        <div class="w-full flex justify-end px-2 mt-2">
        </div>
        <p>Test</p>
        <div class="overflow-x-auto mt-6">
            <p>Test</p>
        </div>
    </div>
@endsection