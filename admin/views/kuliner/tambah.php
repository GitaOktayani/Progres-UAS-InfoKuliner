<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=kuliner&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-lg-md-6">
    <div class="form-group">
    <label for="">Jenis Kuliner</label>
       <select name="Jenis_Kuliner" class="form-control" id="" required>
       <option value="pilih">Pilih Salah Satu</option>
           <option value="minuman">Minuman</option>
           <option value="makanan">Makanan</option>
       </select>
       <span class="text-danger"><?=(isset($err['Jenis_Kuliner']))?$err['Jenis_Kuliner']:'';?></span>
    </div>
    <div class="form-group">
        <label for="">Nama Kuliner</label>
        <input type="text" name="Nama_Kuliner" required class="form-control" id="" value="<?=(isset($_POST['Nama_Kuliner']))?$_POST['Nama_Kuliner']:'';?>">
        <span class="text-danger"><?=(isset($err['Nama_Kuliner']))?$err['Nama_Kuliner']:'';?></span>
    </div>
    

    </div>

    <div class="col-lg-md-6">
    <div class="form-group">
    <label for="">Keterangan</label>
        <input type="text" name="Keterangan" required class="form-control" id="" value="<?=(isset($_POST['Keterangan']))?$_POST['Keterangan']:'';?>">
        <input type="hidden" name="id" class="form-control" id="" value="<?=(isset($_POST['id']))?$_POST['id']:'';?>">
        <input type="hidden" name="photo_old" class="form-control" id="" value="<?=(isset($_POST['photo']))?$_POST['photo']:'';?>">
    </div>
    <div class="form-group">
        <label for="">Photo</label>
        <img src="../media/<?=$_POST['photo']?>" width="50">
        <input type="file" name="fileToUpload" class="form-control">
        <span class="text-danger"><?=(isset($err['fileToUpload']))?$err['fileToUpload']:'';?></span>
    </div>

    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </div>

    </div>
    

</form>