<h1 class="text-2xl font-medium">Transaksi Saya</h1>
<!-- foreach -->
<div class="flex flex-col gap-7 mt-5">
    <?php foreach ($transaksi as $t): ?>
        <div class="w-full p-4 mx-auto border border-gray-200 rounded-lg">
            <p class="text-sm text-gray-700 mb-3">ID - <?php echo $t->order_id ?></p>
            <h1 class="text-lg font-semibold">Paket Langganan <?php echo $t->namaPaket ?></h1>
            <div class="my-3 flex flex-col gap-1">
                <p class="text-sm text-gray-500">Dibuat: <?php echo date('d-M-Y', strtotime($t->transaction_time)) ?></p>
                <?php if ($t->status_code == '201'): ?>
                    <p class="text-sm text-gray-500">Status: Pending</p>
                <?php elseif ($t->status_code == '200'): ?>
                    <p class="text-sm text-gray-500">Status: Berhasil</p>
                <?php else: ?>
                    <p class="text-sm text-gray-500">Status: Gagal</p>
                <?php endif; ?>
                <p class="text-sm text-gray-500">Metode: <?php echo $t->payment_type ?> - <?php echo $t->bank ?></p>
            </div>
            <div class="mt-5 flex justify-between items-center">
                <p class="font-semibold text-lg">Rp <?php echo number_format($t->gross_amount, 0, ',', '.') ?> </p>
                <a href="<?php echo base_url('profile/detail_transaksi/' . $t->order_id) ?>" class="bg-warna-300 hover:bg-warna-400 active:scale-95 transition-all text-white font-semibold py-2 px-4 md:px-6 rounded-md">Lihat Detail</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>