<x-app-layout>
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
</x-app-layout>
