<!DOCTYPE html>
<html lang="en">

<head>
    <title>invoice_<?= $transaksi->order_id; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('/assets/css/output.css?v=') . time(); ?>">
</head>

<body>
    <div class="container mx-auto py-10 font-poppins">
        <img src="<?= base_url('/assets/img/SA_Logo2.png') ?>" alt="logo" class="w-52 mx-auto mb-4">
        <div class="pt-5 border-t-2 border-warna-300 flex justify-between mb-6">
            <div>
                <h2 class="text-lg font-medium">Tagihan untuk</h2>
                <p class=""><?= $transaksi->nama; ?> <?= $transaksi->nama_belakang; ?></p>
            </div>
            <div>
                <h2 class="text-lg font-medium">Dibayar Ke</h2>
                <p class="">Syntax Academy</p>
            </div>
        </div>
        <div class="pt-5 border-t-2 border-gray-500 border-b-2 pb-10">
            <p>Invoice ID : <?php echo $transaksi->order_id ?></p>
            <p>Waktu Transaksi : <?php echo $transaksi->transaction_time ?></p>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-7">
            <thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Produk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Qty
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga Satuan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Harga
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        1
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        E-Learning (Paket <?php echo $transaksi->namaPaket ?>)
                    </th>
                    <td class="px-6 py-4">
                        1
                    </td>
                    <td class="px-6 py-4">
                        <?php echo 'Rp. ' . number_format($transaksi->gross_amount, 0, ',', '.') . ''; ?>
                    </td>
                    <td class="px-6 py-4 font-bold">
                        <?php echo 'Rp. ' . number_format($transaksi->gross_amount, 0, ',', '.') . ''; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-7">
            <thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Gateway
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Metode Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        VA Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Pembayaran
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        Midtrans
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $transaksi->payment_type ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $transaksi->va_number ?>
                    </td>
                    <td class="px-6 py-4 font-bold">
                        <?php echo 'Rp. ' . number_format($transaksi->gross_amount, 0, ',', '.') . ''; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>