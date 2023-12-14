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
                        <a href="{{ route('car.edit', $list->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form href="{{ route('car.destroy', $list->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <label for="my_modalDelete{{ $list->id }}" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</label>
                        </form>
                    </td>
                </tr>
                <input type="checkbox" id="my_modalDelete{{ $list->id }}" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box bg-white">
                        <h3 class="font-bold text-lg">Hello!</h3>
                        <p class="py-4">Are you sure you want to delete {{ $list->name }}</p>
                        <div class="modal-action">
                            <form action="{{ route('car.destroy', $list->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-error text-white">
                                    Delete!
                                </button>
                            </form>
                            <label for="my_modalDelete{{ $list->id }}" class="btn">Close!</label>
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