<div class=" flex flex-col justify-center items-center max-w-screen-xl mx-auto">
    <div class="mt-10 md:mt-16 mb-14 md:mb-20">
        <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-4xl">Harga yang Pas, Ilmu yang Berkelas</h2>
        <p class="text-center text-lg md:w-[80%] mx-auto mt-4">Pilih paket yang paling cocok untukmu dan nikmati akses penuh ke materi berkualitas.</p>
    </div>
    <div class="w-full flex flex-col md:flex-row justify-center md:pt-0 flex-wrap gap-10 md:gap-3 mb-20">
        <?php foreach ($subscriptions as $s): ?>
            <div class=" py-7 px-4 bg-white w-full md:w-[30%] h-96 md:h-[28rem] border shadow rounded-md hover:ring hover:ring-warna-300 hover:ring-opacity-50 transition-all">
                <form class="w-full h-full" id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
                    <input type="hidden" name="result_type" id="result-type" value="">
                    <input type="hidden" name="result_data" id="result-data" value="">

                    <input type="hidden" name="id_user" id="id_user" value="<?= $this->session->userdata('id_user') ?>">
                    <input type="hidden" name="nama" id="nama" value="<?= $this->session->userdata('nama') ?>">
                    <input type="hidden" name="email" id="email" value="<?= $this->session->userdata('email') ?>">
                    <input type="hidden" name="status" id="status" value="<?= $this->session->userdata('status') ?>">

                    <input type="hidden" name="id_langganan" id="id_langganan" value="<?= $s->id_langganan ?>">
                    <input type="hidden" name="namaPaket" id="namaPaket" value="<?= $s->namaPaket ?>">
                    <input type="hidden" name="harga" id="harga" value="<?= $s->harga ?>">
                    <input type="hidden" name="durasi" id="durasi" value="<?= $s->durasi ?>">

                    <div class="flex flex-col items-center justify-between h-full">
                        <div class="flex flex-col items-center">
                            <h2 class="text-lg font-medium"><?= $s->namaPaket ?></h2>
                            <h3><?= $s->durasi ?> Bulan</h3>
                            <h1 class="mt-4 text-3xl md:text-4xl font-semibold">Rp <?= number_format($s->harga, 0, ',', '.') ?></h1>
                        </div>

                        <div class="">
                            <ul>
                                <li class="flex items-center gap-2">
                                    <div class="w-5 aspect-square bg-warna-300 text-white text-[.7rem] flex items-center justify-center"><i class="fa-solid fa-check"></i></div>
                                    Akses Semua Materi
                                </li>
                                <li class="flex items-center gap-2 mt-2">
                                    <div class="w-5 aspect-square bg-warna-300 text-white text-[.7rem] flex items-center justify-center"><i class="fa-solid fa-check"></i></div>
                                    Bisa diakses di semua perangkat
                                </li>
                                <?php if ($s->durasi != "1 bulan"): ?>
                                    <li class="flex items-center gap-2 mt-2">
                                        <div class="w-5 aspect-square bg-warna-300 text-white text-[.7rem] flex items-center justify-center"><i class="fa-solid fa-check"></i></div>
                                        Diskon untuk Subscription selanjutnya
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <?php if (!$this->session->userdata('role')): ?>
                            <a href="<?= base_url('auth/login') ?>" class="pay-button px-5 py-3 rounded-md bg-warna-300 hover:bg-transparent hover:text-warna-300 hover:border hover:border-warna-300 text-white font-semibold active:scale-95 transition-all">Login untuk Berlangganan</a>
                        <?php else: ?>
                            <a href="<?= site_url('pricing/checkout' . '/' . $s->id_langganan) ?>" class=" px-5 py-3 rounded-md bg-warna-300 hover:bg-transparent hover:text-warna-300 hover:border hover:border-warna-300 text-white font-semibold active:scale-95 transition-all">Mulai Berlangganan!</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<div class="mt-10 lg:mt-16 px-4 md:px-6 lg:px-32 xl:px-36 py-14 border-t-2 border-gray-200 flex flex-col md:flex-row justify-center md:justify-between lg:justify-start items-center md:items-start">
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