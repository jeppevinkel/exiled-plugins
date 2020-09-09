@extends('layouts.plugins')

@section('content')
    <div class="bg-foreground pb-4 rounded-md w-full flex-col text-white">
        <div class="font-semibold bg-highlight text-gray-200 py-3 px-6 mb-0 w-full">
            User index
        </div>

        <div class="mx-4">
            <div class="w-full">
                <div class="overflow-x-auto mt-6">
                    <table class="table-auto border-collapse w-full">
                        <thead>
                        <tr class="rounded-lg text-sm font-medium text-gray-200 text-left" style="font-size: 0.9674rem">
                            <th class="px-4 py-2 bg-highlight">#</th>
                            <th class="px-4 py-2 bg-highlight">Name</th>
                            <th class="px-4 py-2 bg-highlight">Email</th>
                            <th class="px-4 py-2 bg-highlight">Roles</th>
                            <th class="px-4 py-2 bg-highlight text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-700 border-b border-gray-200 py-10">
                                <td class="px-4 py-4">{{ $user->id }}</td>
                                <td class="px-4 py-4">{{ $user->getUsername() }}</td>
                                <td class="px-4 py-4">{{ $user->email }}</td>
                                <td class="px-4 py-4">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td class="px-4 py-4 flex space-x-4 justify-end">
                                    @can('edit-users')
                                        <a href="{{ route('admin.users.edit', ['user' => $user]) }}"><button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button></a>
                                    @endcan
                                    @can('delete-users')
                                        <form method="POST" action="{{ route('admin.users.destroy', ['user' => $user]) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
