<h1 class="text-2xl font-medium">Detail Profil</h1>
<div>
    <?php echo $user->email; ?>
</div>
<form action="<?php echo base_url("profile/editProfile") ?>" method="POST">
    <div class="mt-5">
        <h2>Foto Profil <span class="text-red-500">*</span></h2>
    </div>
    <div class="mt-5">
        <h2>Nama Depan <span class="text-red-500">*</span></h2>
        <input name="nama" type="text" class="mt-2 border border-gray-300 rounded-md w-full py-1 focus:outline-none focus:ring-2 focus:border-warna-400" value="<?php echo $user->nama ?>">
    </div>
    <div class="mt-5">
        <h2>Nama Belakang <span class="text-red-500">*</span></h2>
        <input name="nama_belakang" type="text" class="mt-2 border border-gray-300 rounded-md w-full py-1 focus:outline-none focus:ring-2 focus:border-warna-400" value="<?php echo $user->nama_belakang ?>">
    </div>
    <div class="mt-5">
        <h2>Alamat Email <span class="text-red-500">*</span></h2>
        <input name="email" type="text" class="mt-2 border border-gray-300 rounded-md w-full py-1 focus:outline-none focus:ring-2 focus:border-warna-400" value="<?php echo $user->email ?>">
    </div>
    <div class="mt-5">
        <h2>Nomor WhatsApp</h2>
        <input name="nomor_whatsapp" type="text" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="mt-2 border border-gray-300 rounded-md w-full py-1 focus:outline-none focus:ring-2 focus:border-warna-400" value="<?php echo $user->nomor_whatsapp ?>">
    </div>
    <div class="mt-5 w-full lg:flex lg:gap-10 items-center">
        <div class="w-full lg:w-1/2">
            <h2>Tanggal Lahir</h2>
            <input name="tanggal_lahir" type="date" class="mt-2 border border-gray-300 rounded-md w-full py-1 focus:outline-none focus:ring-2 focus:border-warna-400" value="<?php echo $user->tanggal_lahir ?>">
        </div>
        <div class="w-full lg:w-1/2">
            <?php $jenis_kelamin = $user->jenis_kelamin ?>
            <h2>Jenis Kelamin</h2>
            <div class="mt-2 flex gap-6">
                <div>
                    <input type="radio" name="jenis_kelamin" id="laki" value="laki-laki" <?php echo ($jenis_kelamin == 'laki-laki') ? 'checked' : ''; ?>>
                    <label for="laki">Laki - Laki</label>
                </div>
                <div>
                    <input type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" <?php echo ($jenis_kelamin == 'perempuan') ? 'checked' : ''; ?>>
                    <label for="perempuan">Perempuan</label>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-9 flex md:justify-end">
        <button type="submit" class="text-center cursor-pointer w-full md:w-[30%] bg-warna-300 hover:bg-warna-400 active:scale-95 transition-all text-white font-roboto font-semibold rounded-md p-2 md:p-3 disabled:opacity-50">Simpan Perubahan</button>
    </div>
</form>