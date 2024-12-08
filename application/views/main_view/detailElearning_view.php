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
            </div>
        </div>
    </div>
    <div class="mt-10 w-full flex gap-10">
        <!-- desc     -->
        <div class="px-5 py-6 w-[60%] border rounded-md shadow">
            <p>Tentang Kelas Ini</p>
        </div>

        <!-- materi -->
        <div class="px-5 py-6 w-[40%] border rounded-md shadow">
            <p>Materi</p>
            <?php foreach ($listMateri as $listMateri): ?>
                <?php $n = 1; ?>
                <div class="flex justify-between">
                    <p><?php echo $n ?>. <?php echo $listMateri->judul; ?></p>
                    <?php $n++; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>