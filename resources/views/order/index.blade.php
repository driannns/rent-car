<x-app-layout>
    @role ('user')
    <section id="order" class="p-10 text-black">
        <h1 class="font-bold text-xl text-center">My Order</h1>
    </section>
    <div class="p-10">
        <div class="overflow-x-auto">
            <table class="table text-black">
                <!-- head -->
                <thead>
                    <tr class="text-black">
                        <th></th>
                        <th>Name</th>
                        <th>Hours</th>
                        <th>Price</th>
                        <th>Payment</th>
                        <th>End Order</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach($orders as $key => $order)
                    <tr>
                        <th>1</th>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->hours }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->payment }}</td>
                        <td>{{ $order->endOrder }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endrole

    @role ('admin')
    <section class=" p-10">
        <h1 class="text-2xl font-bold text-center ">LIST ORDER</h1>
        
        
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
                        Jam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Payment
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Selesai Sewa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($data as $list)
                <tr class="bg-white border-b  hover:bg-gray-100 dark:hover:bg-gray-100">
                    
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{$list->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$list->hours}}
                    </td>
                    <td class="px-6 py-4">
                        {{$list->price}}
                    </td>
                    <td class="px-6 py-4">
                        {{$list->payment}}
                    </td>
                    <td class="px-6 py-4">
                        {{$list->endOrder}}
                    </td>
                    <td class="px-6 py-4">
                        {{$list->status}}
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
    @endrole
</x-app-layout>
