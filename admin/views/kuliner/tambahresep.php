<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=resep&page=save" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Nama Resep</label>
        <input type="text" name="Nama_Resep" required class="form-control" id="" value="<?=(isset($_POST['Nama_Resep']))?$_POST['Nama_Resep']:'';?>">
        <span class="text-danger"><?=(isset($err['Nama_Resep']))?$err['Nama_Resep']:'';?></span>
        <input type="hidden" name="id" class="form-control" id="" value="<?=(isset($_POST['id']))?$_POST['id']:'';?>">
        <input type="hidden" name="file_old" class="form-control" id="" value="<?=(isset($_POST['Resep']))?$_POST['Resep']:'';?>">
    </div>
    
    <div class="form-group">
        <label for="">Resep</label>
        <file src="../media/<?=$_POST['Resep']?>">
        <input type="file" name="fileToUpload" class="form-control">
        <span class="text-danger"><?=(isset($err['fileToUpload']))?$err['fileToUpload']:'';?></span>
    </div>

    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </div>

    </div>
    

</form>