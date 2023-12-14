<x-app-layout>
    @include ('alert')
    <section class=" p-10">
        <h1 class="text-2xl font-bold text-center ">LIST KATEGORI</h1>
        <div class="flex justify-between items-left w-2/3">
            <div class="py-5 px-5 w-1/2 grid grid-columns-2">
                <div class="py-5">
                    <a href="{{ route('car.create_category') }}" class="btn bg-[#fca311] text-white mt-4 transition-colors hover:bg-[#c7974a] border-none">Add New Category</a>
                </div>
                
                <form action="/search_category" method="POST">
                    @csrf
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search" name="search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search car..." required>
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-[#fca311] transition-colors hover:bg-[#c7974a] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                </form>
            </div>
        </div>
        
        
        
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategory
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
                        {{$list->category}}
                    </td>
                    
                    
                    <td class="flex items-center px-6 py-4">
                        <a href="{{ route('edit_category', $list->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form href="{{ route('delete_category', $list->id) }}" method="post">
                            @csrf
                            
                            <label for="my_modalDelete{{ $list->id }}" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</label>
                        </form>
                    </td>
                </tr>
                <input type="checkbox" id="my_modalDelete{{ $list->id }}" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box bg-white">
                        <h3 class="font-bold text-lg">Hello!</h3>
                        <p class="py-4">Are you sure you want to delete {{ $list->category }}</p>
                        <div class="modal-action">
                            <form action="{{ route('delete_category', $list->id) }}" method="post">
                                @csrf
                                
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