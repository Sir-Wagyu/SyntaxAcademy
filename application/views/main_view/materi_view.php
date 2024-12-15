<div class="max-w-screen-xl mx-auto p-4 font-poppins">

    <?php $user_status = $this->session->userdata('status'); ?>
    <?php if ($user_status == 'aktif') : ?>
        <div>
            <h1><?php echo $materi->judul; ?></h1>
            <p><?php echo $materi->konten; ?></p>
        </div>
        <div class="mt-4">
            <?php
            $nextMateri = null;
            foreach ($listMateri as $index => $m) {
                if ($m->id_materi == $materi->id_materi && isset($listMateri[$index + 1])) {
                    $nextMateri = $listMateri[$index + 1];
                    break;
                }
            }
            ?>
            <?php if ($nextMateri): ?>
                <a href="<?php echo base_url('elearning/detail_materi/' . $kursus->id_kursus . '/' . $nextMateri->id_materi); ?>" class="px-6 py-3 rounded-md bg-warna-300 text-white font-semibold active:scale-95 transition-all select-none">Materi Selanjutnya</a>
            <?php endif; ?>
        </div>
    <?php elseif ($user_status == 'free' || $user_status == 'expired'): ?>
        <div class="w-full h-full flex justify-center items-center">
            <div class="w-full h-full bg-black/50 fixed top-0 left-0 -z-10"></div>
            <div class="border bg-white rounded-md shadow px-9 md:px-12 lg:px-14 py-8 md:w-[70%] flex flex-col justify-center items-center mt-32 lg:mt-48">
                <h1 class="text-xl lg:text-2xl font-semibold mb-4">Waktunya Level Up!</h1>
                <p class="text-sm lg:text-lg text-center text-pretty mb-6"><span class="hidden md:inline">Masa depanmu dimulai dari sini! Dengan akun premium, kamu nggak cuma belajar, tapi juga siap untuk jadi yang terbaik. </span>Nikmati akses penuh ke semua materi, pelajari skill baru, dan gapai impianmu sekarang juga</p>
                <a href="" class="px-5 py-3 rounded-md bg-warna-300 text-white font-semibold active:scale-95 transition-all text-sm lg:text-lg text-center">Berlangganan Sekarang</a>
            </div>
        </div>
    <?php else: ?>
        <div class="w-full h-full flex justify-center items-center">
            <div class="w-full h-full bg-black/50 fixed top-0 left-0 -z-10"></div>
            <div class="border bg-white rounded-md shadow px-9 md:px-12 lg:px-14 py-8 md:w-[70%] flex flex-col justify-center items-center mt-32 lg:mt-48">
                <h1 class="text-xl lg:text-2xl font-semibold mb-4">Login Dulu Yuk!</h1>
                <p class="text-sm lg:text-lg text-center text-pretty mb-6">
                    Enggak asik kalau cuma lihat-lihat doang kan? Ayo jadi bagian dari Syntax Academy dan Unlock semua materinya.
                </p>
                <a href="<?php echo base_url("auth/login") ?>" class="px-5 py-3 rounded-md bg-warna-300 text-white font-semibold active:scale-95 transition-all text-sm lg:text-lg text-center">Login Sekarang!</a>
            </div
                <?php endif; ?>

                </div>