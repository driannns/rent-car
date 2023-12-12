<x-app-layout>

    <div class="flex" style="height: 91vh;">
        <div class="w-1/2 bg-center bg-cover bg-no-repeat"
            style="height: 91vh; background-image: url('/assets/dashboard.jpeg');">
            <!-- <img src="{{ asset('assets/dashboard.jpg') }}" alt="" class="rounded-lg"> -->
        </div>
        <div class="w-1/2 text-center p-10 grid place-items-center">
            <img class="rounded-full object-cover" width="180" height="180" src="assets/logo.jpg" alt="Logo">
            <p class="font-semibold text-[#e5e5e5]">
                Di rentcar yang modern dan terpercaya ini, Anda dapat menemukan berbagai pilihan mobil yang siap
                menyempurnakan perjalanan Anda. Salah satu opsi yang menarik adalah mobil GR Supra, sebuah kendaraan
                sport yang memukau dengan desain elegan dan performa yang luar biasa. Dengan menyewa mobil GR Supra di
                sini, Anda tidak hanya akan merasakan kenyamanan berkendara yang optimal, tetapi juga menikmati sensasi
                mengemudi yang memikat dan prestasi mesin yang memukau. Jangan lewatkan kesempatan untuk menjadikan
                perjalanan Anda lebih istimewa dengan mobil GR Supra di rentcar kami!
            </p>
        </div>
    </div>
    <section id="order" class="h-screen p-10">
        <h1 class="text-2xl font-bold text-center text-[#e5e5e5]">RENT CAR</h1>
        <div class="grid grid-cols-4 gap-x-5 p-10">
            @if (is_countable($data) && count($data) > 0)
            @foreach ($data as $data)
            <div class="card bg-base-100 shadow-xl">
                <figure><img src="{{ asset('storage/'.$data->picture) }}" alt="Shoes" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">
                        {{$data->name}}
                        <div class="badge badge-secondary">NEW</div>
                    </h2>
                    <p>{{substr($data->deskripsi, 0, 70) . '   ...'}}</p>
                    <div class="card-actions justify-end items-center">
                        <div class="">Rp. {{ number_format($data->harga, 0, ',', '.') }} / 12 jam</div>
                        <a href="#" class="btn bg-[#fca311] text-white">Rent!</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="flex justify-center">
            <a href="{{ route('rent.index') }}" class="btn bg-[#fca311] text-white">See all car</a>
        </div>
    </section>

</x-app-layout>
