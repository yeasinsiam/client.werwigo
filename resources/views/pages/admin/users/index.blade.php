@extends('layouts.admin.index')

@section('metaTitle', 'Users')

@section('content')

    <div class="max-w-[86rem] mx-auto border shadow-md p-5 mt-5 rounded-lg">
        <div class="flex justify-between">
            {{-- <h4 class="text-lg">Users list</h4> --}}
            {{-- <a href="{{ route('admin.users.create') }}"
                class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                Create User
            </a> --}}
        </div>
        <!-- List -->
        @if (session()->has('success-message'))
            <div class="max-w-[86rem] mt-5 mx-auto px-5 py-3 rounded-lg bg-green-200 text-green-900">
                {{ session()->get('success-message') }}
            </div>
        @endif
        <div class="bg-white mt-5 ">


            <div class="overflow-x-auto border-x border-t">
                <table class="table-auto w-full">
                    <thead class="border-b">
                        <tr class="bg-gray-100">
                            <th class="text-left p-4 font-medium">
                                ID
                            </th>
                            <th class="text-left p-4 font-medium">
                                Full Name
                            </th>
                            <th class="text-left p-4 font-medium">
                                Email
                            </th>
                            <th class="text-left p-4 font-medium">
                                Mobile
                            </th>
                            <th class="text-left p-4 font-medium">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-4 flex items-center gap-2">
                                    @if ($user->avatar)
                                        <img src="@if ($user->avatar) {{ $user->avatar->getUrl() }} @else /demo/avatar.jpg @endif"
                                            alt="{{ $user->title }}" class="w-20 h-20 rounded-lg object-cover">
                                    @endif
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="hover:underline">{{ $user->name }}</a>
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->mobile_number }}
                                </td>
                                <td class="p-4">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf @method('DELETE')
                                        <button type='submit'
                                            onclick="return confirm('Are you sure going to delete this ?')"
                                            class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                                            Delete
                                        </button>

                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-2">
            {{ $users->links() }}
        </div>
    </div>
@endsection
