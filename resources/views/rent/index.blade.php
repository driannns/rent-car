<x-app-layout>
    @include('alert')
    <section id="order" class="p-10 text-black">
        <h1 class="text-2xl font-bold text-center">RENT CAR</h1>
        @role('admin')
        <div class="grid grid-cols-8 gap-x-5 p-10">
            <a href="{{ route('car.create') }}" class="btn bg-[#fca311] text-white mt-4">Add Car</a>
            <a href="{{ route('car.create_category') }}" class="btn bg-[#fca311] text-white mt-4">Add Category</a>
        </div>
        @endrole
        <div class="flex gap-x-3 p-10">

            <div class="w-3/4 grid grid-cols-3 gap-x-5 gap-y-5">
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
                            <label for="my_modal_7" class="btn bg-[#fca311] text-white border-0">Rent!</label>
                        </div>
                    </div>
                </div>

                <input type="checkbox" id="my_modal_7" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box bg-white w-11/12 max-w-5xl">
                        <h3 class="text-lg font-bold text-center">Rent {{ $data->name }}</h3>
                        <div class="flex p-3">
                            <div class="w-1/2">
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
                                        <div class="text-sm">Rp. {{ number_format($data->harga, 0, ',', '.') }} / 12 jam
                                        </div>
                                    </h2>
                                    <p>{{substr($data->deskripsi, 0, 70) . '   ...'}}</p>
                                </div>
                            </div>
                            <form action="" class="w-1/2 flex flex-col gap-y-2" method="post">
                                @csrf
                                <input type="text" name="name" value="{{ auth()->user()->name }}"
                                    placeholder="Type here" class="input input-bordered w-full bg-white" readonly />
                                <div class="grid grid-cols-2 gap-x-2">
                                    <div class="flex items-center gap-x-1">
                                        <input type="number" name="day" placeholder="Type here"
                                            class="input input-bordered w-full bg-white" />
                                        <label for="day">Day</label>
                                    </div>
                                    <div class="flex items-center gap-x-1">
                                        <input type="number" name="hour" placeholder="Type here"
                                            class="input input-bordered w-full bg-white" max="23" min="0" />
                                        <label for="day">Hour</label>
                                    </div>
                                </div>
                                <label for="pembayaran">Metode Pembayaran</label>
                                <select name="pembayaran" class="select select-bordered w-full bg-white">
                                    <option value="">Pilih Metode Pembayaran</option>
                                    <option value="Dana">Dana</option>
                                    <option value="Gopay">Gopay</option>
                                    <option value="Shopee Pay">Shopee Pay</option>
                                    <option value="Virtual BCA">Virtual BCA</option>
                                    <option value="Transfer Bank">Transfer Bank</option>
                                </select>
                                <button type="submit" class="btn w-full">Rent!</button>
                            </form>
                        </div>
                    </div>
                    <label class="modal-backdrop" for="my_modal_7">Close</label>
                </div>
                @endforeach
                @endif
            </div>
            <div id="filter" class="card bg-white border-2 shadow-xl w-1/4 p-5 h-fit flex flex-col gap-y-2">
                <h1 class="font-semibold text-xl text-center">Filter</h1>
                <form>
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search car..." required>
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-[#fca311] transition-colors hover:bg-[#c7974a] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                </form>
                <div id="status">
                    <h1>Status</h1>
                    <div class="flex items-center gap-x-2 mt-2">
                        <input type="checkbox" name="status" value="Available"
                            class="checkbox checkbox-warning checkbox-sm" />
                        <label for="">Available</label>
                    </div>
                    <div class="flex items-center gap-x-2 mt-2">
                        <input type="checkbox" name="status" value="Unavailable"
                            class="checkbox checkbox-warning checkbox-sm" />
                        <label for="">Unavailable</label>
                    </div>
                </div>
                <div id="category">
                    <h1>Category</h1>
                    <div class="grid grid-cols-2 gap-2 mt-2">
                        @foreach($category as $data)
                        <div class="flex items-center gap-x-2">
                            <input type="checkbox" name="status" value="{{ $data->category }}"
                                class="checkbox checkbox-warning checkbox-sm" />
                            <label for="">{{ $data->category }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="btn bg-[#fca311] hover:bg-[#c7974a] w-full mt-4 text-white border-0">Filter</button>
                </div>
            </div>

        </div>
    </section>
</x-app-layout>
