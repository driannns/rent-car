<x-app-layout>

    <div class="flex" style="height: 91vh;">
        <div class="w-1/2 bg-center bg-cover bg-no-repeat"
            style="height: 91vh; background-image: url('/assets/dashboard.jpeg');">
            <!-- <img src="{{ asset('assets/dashboard.jpg') }}" alt="" class="rounded-lg"> -->
        </div>
        <div class="w-1/2 text-center p-10 grid place-items-center">
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
            @for($i = 0; $i < 4; $i++) 
            <div class="card bg-base-100 shadow-xl">
                <figure><img src="{{ asset('car/yaris.png') }}" alt="Shoes" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">
                        Yaris RS
                        <div class="badge badge-secondary">NEW</div>
                    </h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end items-center">
                        <div class="">Rp. 380.000 / 12 jam</div>
                        <a href="#" class="btn bg-[#fca311] text-white">Rent!</a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        <div class="flex justify-center">
            <a href="{{ route('rent.index') }}" class="btn bg-[#fca311] text-white">See all car</a>
        </div>
    </section>

</x-app-layout>
