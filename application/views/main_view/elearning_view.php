<div class="w-full bg-warna-300 py-24 lg:h-96 flex flex-col justify-center items-center text-white pt-20">
    <p class="font-medium text-2xl">Katalog Kelas</p>
    <h1 class="text-center font-roboto text-3xl lg:text-4xl font-semibold mt-3 mb-5">Mulai Belajar Di Syntax Academy</h1>
    <p class=" text-center px-4 md:w-[70%] lg:w-[40%] lg:text-lg">Syntax Academy menyediakan berbagai kelas bahasa pemrograman untuk meningkatkan kemampuan ngodingmu.</p>
</div>

<div class="px-4 md:w-[70%] lg:w-[55%] xl:w-[40%] mx-auto flex flex-col justify-center items-center mt-10">
    <div class="relative mt-2 w-full h-max rounded-md focus:outline-none focus:ring-2 focus:border-warna-400">
        <input name="cariKelas" type="text" class="w-full relative rounded-md border border-gray-400 text-lg" placeholder="Cari Nama Kelas">
        <button><i class="fa-solid fa-magnifying-glass absolute right-0 top-0 text-gray-400 text-lg block text-center py-3 px-4 hover:text-warna-400 active:scale-95 transition-all"></i></button>
    </div>
</div>

<div class="max-w-screen-xl mx-auto px-4 flex gap-5 mt-3 lg:mt-5">
    <div class="hidden lg:block lg:w-[30%] h-max p-4">
        <h2 class="font-medium text-2xl">Filter</h2>
    </div>
    <div class="w-full lg:w-[70%] lg:p-4">
        <div class="flex flex-col">
            <h2 class="font-medium text-2xl">Semua Kelas</h2>
            <div class="grid xs:grid-cols-2 md:grid-cols-3 max-w-screen-xl mx-auto mt-4 gap-3 lg:gap-4">
                <?php foreach ($kursus as $k): ?>
                    <a href="<?php echo base_url('elearning/detail/' . $k->id_kursus) ?>" class="w-full max-w-72 aspect-[5/4] xs:aspect-[5/6] border shadow-md rounded-lg active:scale-95 transition-all overflow-hidden hover:ring hover:ring-warna-300">
                        <img src="<?php echo $k->image_url ?>" alt="kursus_image" class="h-[55%] md:h-[45%] w-full object-cover bg-gray-300">
                        <div class="h-[45%] md:h-[55%] p-3 md:p-4 flex flex-col justify-between">
                            <h2 class="font-roboto font-medium"><?php echo $k->judul ?></h2>
                            <div class="">
                                <div class="flex justify-between text-sm ">
                                    <p><?php echo $k->level ?></p>
                                    <p><?php echo $k->jumlah_materi ?> Materi</p>
                                </div>
                                <button class="hidden md:block mt-4 text-center w-full bg-warna-300 text-white py-2 rounded-md active:scale-95 transition-all">
                                    Mulai Belajar
                                </button>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>