<div class="max-w-screen-xl mx-auto p-4 font-poppins">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="<?php echo base_url() ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-warna-300 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="<?php echo base_url('elearning') ?>" class="ms-1 text-sm font-medium text-gray-700 hover:text-warna-300 md:ms-2 dark:text-gray-400 dark:hover:text-white">E-Learning</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"><?php echo $kursus->judul ?></span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="mt-4 w-full px-5 py-6  border rounded-md shadow">
        <img src="<?php echo $kursus->image_url ?>" alt="kursus_image" class="w-full h-40 md:h-60 lg:h-96 object-cover rounded-lg">
        <div>
            <h1 class=" mt-3 lg:mt-5 font-semibold text-2xl md:text-3xl"><?php echo $kursus->judul ?></h1>
            <div class=" mt-2 mb-5 lg:text-lg">
                <p><?php echo count($listMateri) ?> Materi</p>
                <p>Level Kesulitan: <?php echo $kursus->level ?></p>
            </div>
            <a href="<?php echo base_url('elearning/detail_materi/' . $kursus->id_kursus . '/' . $firstMateri->id_materi); ?>" class="block text-center w-full px-6 py-3 md:py-4 rounded-md bg-warna-300 text-white font-semibold active:scale-95 transition-all lg:text-lg">Belajar Sekarang</a>
        </div>
    </div>

    <div class="mt-10 w-full flex flex-col lg:flex-row gap-10">
        <!-- desc     -->
        <div class="px-5 py-6 w-full lg:w-[60%] border rounded-md shadow">
            <h1 class="text-warna-400 text-xl font-semibold mb-3">Tentang Kelas Ini</h1>
            <div class="text-pretty text-justify"><?php echo nl2br($kursus->description) ?></div>
        </div>

        <!-- materi -->
        <div class="px-5 py-6 w-full lg:w-[40%] border h-max rounded-md shadow">
            <h1 class="text-warna-400 text-xl font-semibold mb-3">Materi</h1>
            <?php if (!empty($listMateri)): ?>
                <div class="flex flex-col gap-3">
                    <?php $n = 1; ?>
                    <?php foreach ($listMateri as $listMateri): ?>

                        <div class="flex justify-between gap-2">
                            <a class="bg-gray-200 w-full px-4 py-2 rounded-md active:scale-95 transition-all select-none"><?php echo $n ?>. <?php echo $listMateri->judul; ?></a>
                            <?php $n++; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="bg-gray-200 px-4 py-2 rounded-md">Belum ada materi</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="mt-10 lg:mt-16 px-4 md:px-6 lg:px-32 xl:px-36 py-14 border-t-2 border-gray-200 flex flex-col md:flex-row justify-center md:justify-between lg:justify-start">
    <a href="<?php echo base_url("/"); ?>" class="h-max md:w-[40%] mb-8">
        <img src="<?php echo base_url('assets/img/SA_Logo3.png'); ?>" alt="logo" class="w-38">
    </a>
    <div class="flex flex-col items-center md:items-start md:w-44 lg:w-52">
        <h2 class="text-xl font-semibold tracking-wide">Layanan</h2>
        <div class="mt-3 flex flex-col items-center md:items-start gap-2 lg:text-lg">
            <a href="<?php echo base_url("elearning"); ?>" class="hover:text-warna-400">E-Learning</a>
            <a href="<?php echo base_url("pricing"); ?>" class="hover:text-warna-400">Paket</a>
            <a href="<?php echo base_url("contact"); ?>" class="hover:text-warna-400">FAQs</a>
        </div>
    </div>
    <div class="mt-7 md:mt-0 flex flex-col items-center md:items-start md:w-44 lg:w-52">
        <h2 class="text-xl font-semibold tracking-wide">Dukungan</h2>
        <a href="<?php echo base_url("contact"); ?>" class="mt-3 hover:text-warna-400">Tentang Syntax Academy</a>
    </div>
</div>
<p class="text-center text-xs lg:text-sm py-2 lg:py-4">&copy; 2025 Syntax Academy</p>