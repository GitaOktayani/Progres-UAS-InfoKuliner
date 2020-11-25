<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=tempatmakan&page=save" method="POST">
    <div class="col-lg-md-6">
    
    <div class="form-group">
        <label for="">Nama Tempat</label>
        <input type="text" name="Nama_Tempat" required class="form-control" id="" value="<?=(isset($_POST['Nama_Tempat']))?$_POST['Nama_Tempat']:'';?>">
        <span class="text-danger"><?=(isset($err['Nama_Tempat']))?$err['Nama_Tempat']:'';?></span>
    </div>
    

    </div>

    <div class="col-lg-md-6">
    <div class="form-group">
    <label for="">Alamat</label>
        <input type="text" name="Alamat" required class="form-control" id="" value="<?=(isset($_POST['Alamat']))?$_POST['Alamat']:'';?>">
        <span class="text-danger"><?=(isset($err['Alamat']))?$err['Alamat']:'';?></span>
        <input type="hidden" name="id" class="form-control" id="" value="<?=(isset($_POST['id']))?$_POST['id']:'';?>">
    </div>

    <div class="form-group">
        <label for="">Maps</label>
        <input type="text" name="Maps" placeholder="Masukan Link Maps Tempat Makan" required class="form-control" id="" value="<?=(isset($_POST['Maps']))?$_POST['Maps']:'';?>">
        <span class="text-danger"><?=(isset($err['Maps']))?$err['Maps']:'';?></span>
    </div>
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </div>

    </div>
    

</form>