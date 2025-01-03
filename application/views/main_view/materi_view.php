<div class="max-w-screen-xl mx-auto p-4 font-poppins">
    <?php if (!empty($this->session->userdata("status"))): ?>
        <?php $user_status = $user->status ?>
        <?php if ($user_status == 'aktif') : ?>
            <div class="text-pretty lg:w-[80%] mx-auto text-xl leading-relaxed pb-6">
                <?php echo $materi->konten; ?>
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
                    <div class="w-full py-5 fixed left-0 right-0 bottom-0 bg-white border border-gray-300 flex justify-between items-center px-4 md:px-6 lg:px-8">
                        <?php
                        $prevMateri = null;
                        foreach ($listMateri as $index => $m) {
                            if ($m->id_materi == $materi->id_materi && isset($listMateri[$index - 1])) {
                                $prevMateri = $listMateri[$index - 1];
                                break;
                            }
                        }
                        ?>
                        <?php if ($prevMateri): ?>
                            <a href="<?php echo base_url('elearning/detail_materi/' . $kursus->id_kursus . '/' . $prevMateri->id_materi); ?>" class="flex items-center gap-2 hover:text-warna-400"><i class="fa-solid fa-angle-left text-lg"></i> <span class="hidden md:inline">Materi Sebelumnya</span></a>
                        <?php else: ?>
                            <a href="<?php echo base_url('elearning/detail/' . $kursus->id_kursus) ?>" class="flex items-center gap-2 hover:text-warna-300"><i class="fa-solid fa-angle-left text-lg "></i> <span class="hidden md:inline">Kembali</span></a>
                        <?php endif; ?>
                        <p class="text-center w-[60%]"><?php echo $materi->judul; ?></p>
                        <a href="<?php echo base_url('elearning/detail_materi/' . $kursus->id_kursus . '/' . $nextMateri->id_materi); ?>" class="flex items-center gap-2 hover:text-warna-300"><span class="hidden md:inline">Materi Selanjutnya</span> <i class="fa-solid fa-angle-right text-lg"></i></a>
                    </div>
                <?php else: ?>
                    <div class="w-full py-5 fixed left-0 right-0 bottom-0 bg-white border border-gray-300 flex justify-between items-center px-4 md:px-6 lg:px-8">
                        <?php
                        $prevMateri = null;
                        foreach ($listMateri as $index => $m) {
                            if ($m->id_materi == $materi->id_materi && isset($listMateri[$index - 1])) {
                                $prevMateri = $listMateri[$index - 1];
                                break;
                            }
                        }
                        ?>
                        <?php if ($prevMateri): ?>
                            <a href="<?php echo base_url('elearning/detail_materi/' . $kursus->id_kursus . '/' . $prevMateri->id_materi); ?>" class="flex items-center gap-2 hover:text-warna-300"><i class="fa-solid fa-angle-left text-lg "></i> <span class="hidden md:inline">Materi Sebelumnya</span></a>
                        <?php endif; ?>
                        <p class="text-center w-[60%]"><?php echo $materi->judul; ?></p>
                        <a href="<?php echo base_url('elearning/detail/' . $kursus->id_kursus) ?>" class="flex items-center gap-2 hover:text-warna-300"><span class="hidden md:inline">Selesai</span> <i class="fa-solid fa-angle-right text-lg"></i></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php elseif ($user_status == 'free'): ?>
            <div class="w-full h-full flex justify-center items-center">
                <div class="w-full h-full bg-black/50 fixed top-0 left-0 -z-10"></div>
                <div class="border bg-white rounded-md shadow px-9 md:px-12 lg:px-14 py-8 md:w-[70%] flex flex-col justify-center items-center mt-32 lg:mt-48">
                    <h1 class="text-xl lg:text-2xl font-semibold mb-4">Waktunya Level Up!</h1>
                    <p class="text-sm lg:text-lg text-center text-pretty mb-6"><span class="hidden md:inline">Masa depanmu dimulai dari sini! Dengan akun premium, kamu nggak cuma belajar, tapi juga siap untuk jadi yang terbaik. </span>Nikmati akses penuh ke semua materi, pelajari skill baru, dan gapai impianmu sekarang juga</p>
                    <a href="<?php echo base_url('pricing') ?>" class="px-5 py-3 rounded-md bg-warna-300 text-white font-semibold active:scale-95 transition-all text-sm lg:text-lg text-center">Berlangganan Sekarang</a>
                </div>
            </div>
        <?php elseif ($user_status == 'expired'): ?>
            <div class="w-full h-full flex justify-center items-center">
                <div class="w-full h-full bg-black/50 fixed top-0 left-0 -z-10"></div>
                <div class="border bg-white rounded-md shadow px-9 md:px-12 lg:px-14 py-8 md:w-[70%] flex flex-col justify-center items-center mt-32 lg:mt-48">
                    <h1 class="text-xl lg:text-2xl font-semibold mb-4">Masa Belajarmu Udah Habis</h1>
                    <p class="text-sm lg:text-lg text-center text-pretty mb-6"><span class="hidden md:inline">Lanjutkan petualanganmu dalam menggapai masa depan disni! Dengan akun premium, kamu nggak cuma belajar, tapi juga siap untuk jadi yang terbaik. </span>Nikmati akses penuh ke semua materi, pelajari skill baru, dan gapai impianmu sekarang juga</p>
                    <a href="<?php echo base_url('pricing') ?>" class="px-5 py-3 rounded-md bg-warna-300 text-white font-semibold active:scale-95 transition-all text-sm lg:text-lg text-center">Berlangganan Sekarang</a>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="w-full h-full flex justify-center items-center">
            <div class="w-full h-full bg-black/50 fixed top-0 left-0 -z-10"></div>
            <div class="border bg-white rounded-md shadow px-9 md:px-12 lg:px-14 py-8 md:w-[70%] flex flex-col justify-center items-center mt-32 lg:mt-48">
                <h1 class="text-xl lg:text-2xl font-semibold mb-4">Login Dulu Yuk!</h1>
                <p class="text-sm lg:text-lg text-center text-pretty mb-6">
                    Enggak asik kalau cuma lihat-lihat doang kan? Ayo jadi bagian dari Syntax Academy dan Unlock semua materinya.
                </p>
                <a href="<?php echo base_url("auth/login") ?>" class="px-5 py-3 rounded-md bg-warna-300 text-white font-semibold active:scale-95 transition-all text-sm lg:text-lg text-center">Login Sekarang!</a>
            </div>
        </div>
    <?php endif; ?>
</div>