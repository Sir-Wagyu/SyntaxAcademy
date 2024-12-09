<div class="max-w-screen-xl mx-auto p-4 font-poppins">
    <div class="w-full h-96  flex items-center border rounded-md shadow-md">
        <div class="h-full flex items-center justify-center">
            <img src="<?php echo $kursus->image_url ?>" alt="" class="h-[60%] aspect-video">
        </div>
        <div>
            <h1>judul</h1>
            <div class="flex justify-between text-sm ">
                <p>level</p>
                <p>jumlah_materi Materi</p>
                <a href="<?php echo base_url('elearning/detail_materi/' . $kursus->id_kursus . '/' . $firstMateri->id_materi); ?>" class="px-6 py-3 rounded-md bg-warna-300 text-white font-semibold active:scale-95 transition-all select-none">Belajar Sekarang</a>
            </div>
        </div>
    </div>
    <div class="mt-10 w-full flex gap-10">
        <!-- desc     -->
        <div class="px-5 py-6 w-[60%] border rounded-md shadow">
            <h1 class="text-warna-400 text-xl font-semibold mb-3">Tentang Kelas Ini</h1>
            <div class="text-pretty text-justify"><?php echo nl2br($kursus->description) ?></div>
        </div>

        <!-- materi -->
        <div class="px-5 py-6 w-[40%] border h-max rounded-md shadow">
            <h1 class="text-warna-400 text-xl font-semibold mb-3">Materi</h1>
            <?php if (!empty($listMateri)): ?>
                <?php foreach ($listMateri as $listMateri): ?>
                    <?php $n = 1; ?>
                    <div class="flex justify-between">
                        <a class="bg-gray-200 w-full px-4 py-2 rounded-md active:scale-95 transition-all select-none"><?php echo $n ?>. <?php echo $listMateri->judul; ?></a>
                        <?php $n++; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="bg-gray-200 px-4 py-2 rounded-md">Belum ada materi</p>
            <?php endif; ?>
        </div>
    </div>
</div>