<div class="max-w-screen-xl h-screen mx-auto pt-20 px-4 flex items-center justify-center">
    <div class="w-full flex flex-col md:flex-row justify-center pt-[35rem] md:pt-0 flex-wrap">
        <?php foreach ($subscriptions as $s): ?>
            <div class=" py-7 px-4 bg-white w-full md:w-[33%] h-96 md:h-[25rem] border shadow rounded-md">
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
                            <h2><?= $s->namaPaket ?></h2>
                            <h3><?= $s->durasi ?> Bulan</h3>
                            <h1 class="text-3xl font-semibold">Rp <?= number_format($s->harga, 0, ',', '.') ?></h1>
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