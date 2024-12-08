<div class="max-w-screen-xl mx-auto p-4 font-poppins">
    <div class="flex w-full">
        <?php foreach ($kursus as $k): ?>
            <a href="<?php echo base_url('elearning/detail/' . $k->id_kursus) ?>" class="w-52 lg:w-64 aspect-[4/5] border shadow-md rounded-md active:scale-95 transition-all">
                <img src="<?php echo $k->image_url ?>" alt="kursus_image" class="h-[45%] w-full object-contain">
                <div class="h-[55%] px-4 py-6 flex flex-col justify-between">
                    <h1 class="font-roboto font-semibold"><?php $k->judul ?></h1>
                    <div class="">
                        <div class="flex justify-between text-sm ">
                            <p><?php echo $k->level ?></p>
                            <p><?php echo $k->jumlah_materi ?> Materi</p>
                        </div>
                        <button class="mt-4 text-center w-full bg-warna-300 text-white py-2 rounded-md active:scale-95 transition-all">Beli</button>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>