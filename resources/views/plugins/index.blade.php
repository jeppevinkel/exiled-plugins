@extends('layouts.plugins')

@section('content')
{{--        <div class="bg-foreground pb-4 px-4 rounded-md w-full flex text-white">--}}
            <x-card title="Plugins" class="flex">
            <div id="categories" class="w-1/6">
                <div class="flex flex-col w-full pt-6">
                    <p class="ml-3 font-bold">Categories</p>
                    <div class="flex flex-col m-4 mt-1">
                        <div class="flex justify-between">
                            <a class="@if(Route::currentRouteName() == 'plugins.index') font-semibold @endif" href="{{route('plugins.index')}}">All</a>
                            <p class="font-hairline text-gray-400">({{ \App\Plugin::all()->count() }})</p>
                        </div>
                        @foreach(\App\Category::all() as $category)
                            <div class="flex justify-between">
                                <a class="@if(Route::current()->parameter('category') == $category->id) font-semibold @endif" href="{{route('plugins.index.category.show', ['category' => $category])}}">{{$category->name}}</a>
                                <p class="font-hairline text-gray-400">({{ $category->plugins()->count() }})</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="plugin-index" class="w-5/6">
                {{--        <div class="w-full flex justify-end px-2 mt-2">--}}
                {{--            <div class="w-full sm:w-64 inline-block relative ">--}}
                {{--                <input type="" name="" class="leading-snug border border-gray-300 block w-full appearance-none bg-gray-100 text-sm text-gray-600 py-1 px-4 pl-8 rounded-lg" placeholder="Search" />--}}

                {{--                <div class="pointer-events-none absolute pl-3 inset-y-0 left-0 flex items-center px-2 text-gray-300">--}}

                {{--                    <svg class="fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">--}}
                {{--                        <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />--}}
                {{--                    </svg>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--        </div>--}}
                @if(isset($plugins))
                    <div class="overflow-x-auto mt-6">
                        <table class="table-auto border-collapse w-full">
                            <thead>
                            <tr class="rounded-lg text-sm font-medium text-gray-200 text-left" style="font-size: 0.9674rem">
                                <th class="px-4 py-2 bg-highlight ">Name</th>
                                <th class="px-4 py-2 bg-highlight ">Author</th>
                                <th class="px-4 py-2 w-56 bg-highlight">Info</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plugins as $plugin)
                                <tr class="hover:bg-gray-700 border-b border-gray-200 py-10">
                                    <td class="flex flex-col px-4 py-4">
                                        <a class=" hover:underline" href="{{ route('plugins.show', ['plugin' => $plugin->url_string]) }}">{{ $plugin->name }}</a>
                                        <div class="flex mt-2">
                                            <p class="text-xs font-hairline text-gray-400">{{ $plugin->created_at->format('M d, Y') }}</p>
                                            <p class="text-xs font-hairline mr-1">,</p>
                                            <a class="text-xs font-hairline text-gray-400 hover:underline" href="{{route('plugins.index.category.show', ['category' => $plugin->category])}}">{{ $plugin->category->name }}</a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">{{ $plugin->user->getUsername() }}</td>
                                    <td class="flex flex-col px-4 py-4">
                                        <div class="flex justify-between text-xs">
                                            <p>Downloads:</p>
                                            <p>{{ array_sum(array_column($plugin->releases->toArray(), 'downloads')) }}</p>
                                        </div>
                                        <div class="flex justify-between text-xs mt-1">
                                            <p>Updated:</p>
                                            <p>{{ $plugin->updated_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="flex justify-between text-xs mt-1">
                                            <p>EXILED Version:</p>
                                            @if(count($plugin->releases))
                                                <p>{{ $plugin->releases->sortByDesc('created_at')->first()->exiled_version }}</p>
                                            @else
                                                <p>null</p>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="pagination" class="w-full flex justify-center border-t border-gray-100 pt-4 items-center">
                        {{ $plugins->links() }}
                    </div>
                @endif
{{--            </div>--}}
            </x-card>
        </div>
@endsection
