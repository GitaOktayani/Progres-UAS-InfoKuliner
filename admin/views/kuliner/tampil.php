<div class="row">
    <div class="pull-left">
        <h4>Daftar Kuliner</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=kuliner&page=add">
            <button class="btn btn-primary">add</button>
    </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
            <td>#</td>
            <td>NamaKuliner</td><td>Jenis Kuliner</td><td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($kuliner != NULL){
                $no=1;
                foreach($kuliner as $row) {?>
                <tr>
                    <td></td><td><?= $row['Jenis_kuliner'] ?></td><td><?=$row['Nama_Kuliner'];?></td>
                    <td>
                        <a href="index.php?mod=dokter&page=edit&id=<?=md5($row['id'])?>"><i class="fa fa-pencil"></i></a>
                        <a href="index.php?mod=dokter&page=delete&id=<?=md5($row['id'])?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
           <?php $no++; }
            }?>
        </tbody>
    </table>
</div>
