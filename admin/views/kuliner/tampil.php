<script src="https://kit.fontawesome.com/c333d3440e.js" crossorigin="anonymous"></script>


<style>
    .all{
        padding-top: 10px;
        padding-left: 50px;
        padding-right: 50px;
    }
   
</style>
<div class="all">
<div class="row">
    <div class="pull-left">
        <br>
        <h4 class="daftar">Daftar Kuliner</h4>
    </div>
    <br>
    <div class="pull-right">
        <a href="index.php?mod=kuliner&page=add">
        <button class="btn btn-primary" >add</button>
    </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
            <td>No</td>
            <td>Jenis Kuliner</td><td>Nama Kuliner</td><td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($kuliner != NULL){
                $no=1;
                foreach($kuliner as $row){?>
                <tr>
                    <td><?=$no;?></td><td><?=$row['Jenis_Kuliner'] ?></td><td><?=$row['Nama_Kuliner'];?></td>
                    <td>
                        <a href="index.php?mod=kuliner&page=edit&id=<?=($row["id"])?>"><i class="fa fa-pencil"></i></a>
                        <a href="index.php?mod=kuliner&page=delete&id=<?=($row["id"])?>" onclick="return confirm('Apakah Anda yakin menghapus data ini?')"><i class="fa fa-trash"></i></a>
                   <!--untuk menggunakan font awesome maka run file harus online  -->
                   
                    </td>
                </tr>
           <?php $no++; }
            }?>
        </tbody>
    </table>
</div>
</div>
