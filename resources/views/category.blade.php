<x-app-layout>
    <section class=" p-10">
        <h1 class="text-2xl font-bold text-center ">LIST KATEGORI</h1>
        <div class=" p-10">
            <a href="{{ route('car.create_category') }}" class="btn bg-[#fca311] text-white mt-4">Add New Category</a>
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
                <tr class="bg-white border-b  hover:bg-gray-50 dark:hover:bg-gray-600">
                    
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{$list->category}}
                    </td>
                    
                    
                    <td class="flex items-center px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                    </td>
                </tr>
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