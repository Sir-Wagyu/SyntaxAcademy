<div class="max-w-screen-xl mx-auto p-4 font-poppins ">
    <form class="w-full h-full" id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
        <input type="hidden" name="result_type" id="result-type" value="">
        <input type="hidden" name="result_data" id="result-data" value="">

        <input type="hidden" name="id_user" id="id_user" value="<?= $this->session->userdata('id_user') ?>">

        <div class="bg-white shadow-md border px-5 md:px-8 py-4 md:py-7 rounded-md mt-32 lg:mt-40 ">
            <h1 class="font-roboto font-medium pb-2 border-b border-black text-xl">Detail Pembayaran</h1>
            <div class="text-sm">

                <div class="flex justify-between items-center mt-4">
                    <p class="">Nama User</p>
                    <p><?php echo $this->session->userdata('nama') ?></p>
                    <input type="hidden" name="nama" id="nama" value="<?= $this->session->userdata('nama') ?>">
                </div>
                <div class="flex justify-between items-center">
                    <p>Email</p>
                    <p><?php echo $this->session->userdata('email') ?></p>
                    <input type="hidden" name="email" id="email" value="<?= $this->session->userdata('email') ?>">
                </div>


                <div class="flex justify-between items-center mt-3">
                    <p>Nama Subscription</p>
                    <p><?php echo $subscription->namaPaket ?></p>
                    <input type="hidden" name="namaPaket" id="namaPaket" value="<?= $subscription->namaPaket ?>">
                </div>
                <div class="flex justify-between items-center">
                    <p>Durasi</p>
                    <p><?php echo $subscription->durasi ?></p>
                    <input type="hidden" name="durasi" id="durasi" value="<?= $subscription->durasi ?>">
                </div>

                <div class="flex justify-between items-center">
                    <p>Jumlah</p>
                    <p>1 (Paket)</p>
                </div>
            </div>

            <div class="font-semibold text-sm border-t border-black pt-3 flex justify-between items-center mt-6">
                <p>Total Pembayaran</p>
                <p>Rp <?php echo number_format($subscription->harga, 0, ',', '.') ?></p>
                <input type="hidden" name="harga" id="harga" value="<?= $subscription->harga ?>">
            </div>
            <button id="pay-button" class="pay-button px-5 py-3 rounded-md bg-warna-300 hover:bg-transparent hover:text-warna-300 hover:border hover:border-warna-300 text-white font-semibold active:scale-95 transition-all">Checkout</button>
        </div>
    </form>
</div>