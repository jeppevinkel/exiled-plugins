@extends('layouts.plugins')

@section('title', 'Create Release')

@section('content')
{{--    <div class="bg-foreground pb-4 px-4 rounded-md w-full text-white">--}}
        <x-card title="Create Release">
        <div class="">

        </div>

        <div class="pt-2 pb-2">

        </div>

        <div class="w-full flex justify-around px-2 mt-2">
            <form class="w-full max-w-3xl" method="post" action="{{ route('plugin-releases.store', ['plugin' => $plugin]) }}">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="download-url">
                            Download URL
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('download-url') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="download-url" name="download-url" type="url" placeholder="https://github.com/user/repo/releases/tag/v1.0.0" value="{{ old('download-url') }}">
                        @error('download-url')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="exiled-version">
                            EXILED Version
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('exiled-version') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="exiled-version" name="exiled-version" type="text" placeholder="2.0.0" value="{{ old('exiled-version') }}">
                        @error('exiled-version')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="plugin-version">
                            Plugin Version
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('plugin-version') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="plugin-version" name="plugin-version" type="text" placeholder="1.0.0" value="{{ old('plugin-version') }}">
                        @error('plugin-version')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <button class="w-full bg-red-800 hover:bg-red-900 text-gray-200 font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="overflow-x-auto mt-6">

        </div>
        </x-card>
{{--    </div>--}}
@endsection
