<x-app-layout>
@include ('alert')
@role ('user')
    <div class="flex text-black" style="height: 91vh;">
        <div class="w-1/2 bg-center bg-cover bg-no-repeat"
            style="height: 91vh; background-image: url('/assets/dashboard.jpeg');">
            <!-- <img src="{{ asset('assets/dashboard.jpg') }}" alt="" class="rounded-lg"> -->
        </div>
        <div class="w-1/2 text-center p-10 grid place-items-center">
            <img class="rounded-full object-cover" width="180" height="180" src="assets/logo.jpg" alt="Logo">
            <p class="font-semibold">
                Di rentcar yang modern dan terpercaya ini, Anda dapat menemukan berbagai pilihan mobil yang siap
                menyempurnakan perjalanan Anda. Salah satu opsi yang menarik adalah mobil GR Supra, sebuah kendaraan
                sport yang memukau dengan desain elegan dan performa yang luar biasa. Dengan menyewa mobil GR Supra di
                sini, Anda tidak hanya akan merasakan kenyamanan berkendara yang optimal, tetapi juga menikmati sensasi
                mengemudi yang memikat dan prestasi mesin yang memukau. Jangan lewatkan kesempatan untuk menjadikan
                perjalanan Anda lebih istimewa dengan mobil GR Supra di rentcar kami!
            </p>
        </div>
    </div>
    <section id="order" class="h-screen p-10 text-black">
        <h1 class="text-2xl font-bold text-center">RENT CAR</h1>
        <div class="grid grid-cols-4 gap-x-5 p-10">
            @if (is_countable($data) && count($data) > 0)
            @foreach ($data as $data)
            <div class="card bg-white border-2 shadow-xl">
                <div style="overflow: hidden; ">
                    <div class="bg-cover bg-center bg-no-repeat w-full h-full"
                        style="background-image: url('{{ asset('storage/'.$data->picture) }}')">
                        <img class="invisible overflow-hidden" style="object-fit: cover;"
                            src="{{ asset('car/yaris.png') }}" alt="Gambar Mobil" />
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="card-title">
                        {{$data->name}}
                        <div class="text-sm">Rp. {{ number_format($data->harga, 0, ',', '.') }} / 12 jam</div>
                    </h2>
                    <p>{{substr($data->deskripsi, 0, 70) . '   ...'}}</p>
                    <div class="card-actions justify-end items-center">
                        <div class="">Rp. {{ number_format($data->harga, 0, ',', '.') }} / 12 jam</div>
                        <a href="#" class="btn bg-[#fca311] text-white border-none">Rent!</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="flex justify-center">
            <a href="{{ route('rent.index') }}" class="btn bg-[#fca311] text-white border-none">See all car</a>
        </div>
    </section>
@endrole

@role ('admin')
<div class="grid grid-cols-1 gap-4 px-4 mt-8 sm:grid-cols-4 sm:px-8">
    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-green-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                </path>
            </svg></div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total Users</h3>
            <p class="text-3xl">{{count($user)}}</p>
        </div>
    </div>
    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-blue-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                </path>
            </svg></div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total Cars</h3>
            <p class="text-3xl">{{count($data)}}</p>
        </div>
    </div>
    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-indigo-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                </path>
            </svg></div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Active Orders</h3>
            <p class="text-3xl">{{count($order)}}</p>
        </div>
    </div>
    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-red-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4">
                </path>
            </svg></div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total Orders</h3>
            <p class="text-3xl">{{count($order2)}}</p>
        </div>
    </div>
</div>
<section class="p-10 ms-30">
<h1 class="text-2xl font-bold text-center p-10">ACTIVE ORDERS</h1>


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
                        
                    </tr>
                </thead>
                <tbody>

                    @foreach ($order as $list)
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


                        
                    </tr>
                    
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>
@endrole
</x-app-layout>
