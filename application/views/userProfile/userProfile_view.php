<h1 class="text-2xl font-medium">Detail Profil</h1>
<form action="<?php echo base_url("profile/editProfile") ?>" method="POST" enctype="multipart/form-data">
    <div class="mt-5">
        <h2>Foto Profil</h2>
        <div class="flex flex-col items-center justify-center">
            <div class="w-28 lg:w-36 h-28 lg:h-36 bg-gray-300 border-2 border-gray-300 flex items-center justify-center rounded-full mt-2">
                <?php if (!empty($user->foto_profile)): ?>
                    <img src="<?php echo base_url('uploads/profile_pictures/' . $user->foto_profile) ?>" alt="Foto Profil" class="w-full h-full object-cover rounded-full">
                <?php else: ?>
                    <img src="<?php echo base_url('assets/img/default_userProfile.jpg') ?>" alt="">
                <?php endif; ?>
            </div>
            <div class="w-full lg:w-[60%] flex flex-col lg:flex-row items-center mt-4 gap-2 lg:gap-3">
                <label for="foto_profil" class="text-center cursor-pointer w-full lg:w-[50%] py-2 bg-warna-300 hover:bg-warna-400 transition-all text-white rounded-md">Upload Foto</label>
                <input type="file" name="foto_profil" id="foto_profil" class="hidden" accept="image/png, image/gif, image/jpeg">
                <a href="<?php echo base_url("profile/deleteFotoProfile") ?>" class="lg:mt-0 w-full lg:w-[50%] text-center font-medium py-2 rounded-md cursor-pointer border border-warna-300 hover:border-warna-400 text-warna-300 hover:text-warna-400 transition-all">Hapus Foto</a>
            </div>
        </div>
        <p class="text-pretty text-sm mt-3 text-gray-500"><span class="text-red-500">*</span>Disarankan menggunakan rasio 1:1 dan berukuran tidak lebih dari 2MB</p>
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