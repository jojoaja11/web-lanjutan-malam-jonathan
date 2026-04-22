<html>
    
    <form class="form" action="{{ action([App\Http\Controllers\MahasiswaController::class, 'store']) }}" method="post">
        @csrf
        <table>
            <div class="form-group">
            <label>Nama Lengkap :</label>
            <input type="text" name="fullname" size="40">
            <br>
            </div>

            <div class="form-group">
            <label>Nomor Induk Mahasiswa :</label>
            <input type="text" name="NIM" size="40">
            <br>
            </div>

            <div class="form-group">
            <label>Nomor Induk Siswa Nasional :</label>
            <input type="text" name="NIDN" size="40">
            <br>
            </div>

            <div class="form-group">
            <label>Tempat Lahir :</label>
            <input type="text" name="tempat_lahir" size="40">
            <br>
            </div>

            <div class="form-group">
            <label>Tanggal Lahir :</label>
            <input type="text" name="tanggal_lahir" size="40">
            <br>
            </div>

            <div class="form-group">
            <label>Alamat :</label>
            <textarea type="text" name="alamat" size="40"></textarea>
            <br>
            </div>

            <button type="submit" class="button">Add</button>
            <button type="reset" class="button">Clear</button>
        </table>
    </form>
</html>