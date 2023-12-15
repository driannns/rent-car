<x-app-layout>
    @include ('alert')
    <section class=" p-10">
        <h1 class="text-2xl font-bold text-center ">LIST USER</h1>
        <div class=" p-10">
            <a href="{{ route('add_user') }}" class="btn bg-[#fca311] text-white mt-4 border-none">Add New User</a>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipe Akun
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (is_countable($data) && count($data) > 0)
                    @foreach ($data as $list)
                    <tr class="bg-white border-b  hover:bg-gray-100 dark:hover:bg-gray-100">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{$list->name}}
                        </td>

                        <td class="px-6 py-4">
                            {{$list->email}}
                        </td>
                        <td class="px-6 py-4">
                            @foreach($list->roles as $role)
                            {{ $role->name }}
                            @endforeach
                        </td>


                        <td class="flex items-center px-6 py-4">
                            <label for="edit_modal_{{ $list->id }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</label>
                            <label for="delete_modal_{{ $list->id }}"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</label>
                            <form href="{{ route('car.destroy', $list->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                    <!-- The button to open modal -->
                    <input type="checkbox" id="edit_modal_{{ $list->id }}" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box bg-white">
                            <h3 class="font-bold text-lg">Edit User!</h3>
                            <p class="py-4">This modal works with a hidden checkbox!</p>
                            <form method="POST" action="{{ route('edit_user', $list->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        value="{{ $list->name }}" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        value="{{ $list->email }}" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                          
                                <div class="mt-4">
                                    <x-input-label for="role" :value="__('Tipe Akses')" />
                                    <select id="role" class="select select-bordered bg-white border-gray-200 mt-1 w-full" type="role" name="role"
                                        :value="old('role')" required autocomplete="username">
                                        <option value="" disabled selected>Pilih Tipe Akses</option>
                                        <option value="admin" 
                                        @foreach($list->roles as $role)
                                            {{ $role->name == 'admin' ? 'selected' : ''}}
                                        @endforeach
                                        >Admin</option>
                                        <option value="user" 
                                        @foreach($list->roles as $role)
                                            {{ $role->name == 'user' ? 'selected' : ''}}
                                        @endforeach
                                        >User</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-center mt-4">


                                    <x-primary-button class="ms-4">
                                        {{ __('Edit') }}
                                    </x-primary-button>
                                </div>
                            </form>
                            <div class="modal-action">
                                <label for="edit_modal_{{ $list->id }}" class="btn">Close!</label>
                            </div>
                        </div>
                    </div>
                    <!-- Delete -->
                    <input type="checkbox" id="delete_modal_{{ $list->id }}" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box bg-white text-black">
                            <h3 class="font-bold text-lg text-center">Are you sure you want to delete {{ $list->name }} Account!</h3>
                            <div class="modal-action flex items-center">
                                <form action="{{ route('delete_user', $list->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-error" type="submit">
                                        Delete
                                    </button>
                                </form>
                                <label for="delete_modal_{{ $list->id }}" class="btn">Close!</label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-4 p-5">
            {{ $data->links() }}
        </div>

        <div class="flex justify-center mt-4">
            <p class="text-gray-500">
                Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} results
            </p>
        </div>


    </section>
</x-app-layout>
