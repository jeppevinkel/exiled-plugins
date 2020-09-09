@extends('layouts.plugins')

@section('content')
    <div class="bg-foreground pb-4 rounded-md w-full flex-col text-white">
        <div class="font-semibold bg-highlight text-gray-200 py-3 px-6 mb-0 w-full">
            Edit user {{ $user->getUsername() }}
        </div>

        <div class="mx-4">
            <div class="w-full flex justify-around px-2 mt-2">
                <form class="w-full max-w-3xl" method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
                    @csrf
                    @method('put')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        {{--                        <div class="w-full px-3 mb-6 md:mb-0">--}}
                        {{--                            <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="plugin-name">--}}
                        {{--                                Plugin Name--}}
                        {{--                            </label>--}}
                        {{--                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('plugin-name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="plugin-name" name="plugin-name" type="text" maxlength="128" placeholder="My Plugin" value="{{ old('plugin-name', $plugin->name) }}">--}}
                        {{--                            @error('plugin-name')--}}
                        {{--                            <p class="text-red-500 text-xs italic">{{ $message }}</p>--}}
                        {{--                            @enderror--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        {{--                        <div class="w-full md:w-1/2 px-3">--}}
                        {{--                            <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="plugin-description">--}}
                        {{--                                Description (markdown)--}}
                        {{--                            </label>--}}
                        {{--                            <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 @error('plugin-description') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="plugin-description" name="plugin-description" placeholder="# My Plugin&#10;Awesome description.">{{ old('plugin-description', $plugin->description) }}</textarea>--}}
                        {{--                            @error('plugin-description')--}}
                        {{--                            <p class="text-red-500 text-xs italic">{{ $message }}</p>--}}
                        {{--                            @enderror--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <div class="relative">
                                @foreach($roles as $role)
                                    <label class="inline-flex items-center mt-3">
                                        <input class="form-checkbox h-5 w-5 text-green-600" type="checkbox" name="roles[]" value="{{ $role->id }}" @if($user->hasRole($role->name)) checked @endif>
                                        <span class="ml-2 text-gray-200">{{ $role->name }}</span>
                                    </label>
                                @endforeach
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <button class="w-full bg-red-800 hover:bg-red-900 text-gray-200 font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
