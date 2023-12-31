<x-app-layout>
    @role ('user')

    <section id="order" class="p-10 text-black">
        <h1 class="font-bold text-xl text-center">My Order</h1>
    </section>
    @if (is_countable($orders) && count($orders) == 0)
    <div class="flex justify-center">
        <img class="gambar" src="{{ asset('assets/kosong.png') }}" alt="">
    </div>
    
    @else
    <div class="p-10">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="bg-white border-b  hover:bg-gray-100 dark:hover:bg-gray-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap "></th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Unit</th>
                        <th scope="col" class="px-6 py-3">Hours</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Payment</th>
                        <th scope="col" class="px-6 py-3">Start Order</th>
                        <th scope="col" class="px-6 py-3">End Order</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach($orders as $key => $order)
                    <tr>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">{{ $key+1 }}</th>
                        <td class="px-6 py-4">{{ $order->name }}</td>
                        <td class="px-6 py-4">{{ $order->car_name }}</td>
                        <td class="px-6 py-4">{{ $order->hours }}</td>
                        <td class="px-6 py-4">{{ $order->price }}</td>
                        <td class="px-6 py-4">{{ $order->payment }}</td>
                        <td class="px-6 py-4">{{ $order->startDate }}</td>
                        <td class="px-6 py-4">{{ $order->endDate }}</td>
                        <td class="px-6 py-4">
                            @if($order->status == "Processing")
                            <p class="text-orange-400 font-semibold">
                                {{ $order->status }}
                            </p>
                            @elseif($order->status == "Done")
                            <p class="text-green-600 font-semibold">
                                {{ $order->status }}
                            </p>
                            @elseif($order->status == "Delayed") 
                            <p class="text-red-600 font-semibold">
                                {{ $order->status }}
                            </p>
                            @endif   
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    @endrole

    @role ('admin')
    <section class=" p-10">
        <h1 class="text-2xl font-bold text-center p-10">LIST ORDER</h1>

        @if (is_countable($data) && count($data) == 0)
        <div class="flex justify-center">
            <img class="gambar" src="{{ asset('assets/kosong.png') }}" alt="">
        </div>
        
        @else
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
                            {{$list->endDate}}
                        </td>
                        <td class="px-6 py-4">
                            {{$list->status}}
                        </td>


                        <td class="flex items-center px-6 py-4">
                            @if ($list->status == 'Processing')
                            <a href="{{ route('order.update', $list->id) }}"
                                class="font-medium text-green-600 dark:text-green-500 hover:underline">Done</a>
                            @else
                            <a
                                class="font-medium text-gray-600 dark:text-gray-500">Returned</a>
                            @endif
                            <form href="{{ route('order.destroy', $list->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <label for="my_modalDelete{{ $list->id }}"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</label>
                            </form>
                        </td>
                    </tr>
                    <input type="checkbox" id="my_modalDelete{{ $list->id }}" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box bg-white">
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Are you sure you want to delete {{ $list->name }}</p>
                            <div class="modal-action">
                                <form action="{{ route('order.destroy', $list->id) }}" method="post">
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

        @endif
    </section>
    @endrole
</x-app-layout>
