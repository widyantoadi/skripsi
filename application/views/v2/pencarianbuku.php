<table class="table table-striped">
        <thead>
            <tr>
                <td>Kode Buku</td>
                <td>Judul Buku</td>
                <td>Pengarang</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($buku as $tmp):?>
        <tr>
            <td><?php echo $tmp->kode_anak_asuh;?></td>
            <td><?php echo $tmp->nama_calon;?></td>
            <td><?php //echo $tmp->status;?></td>
            <td><a href="#" class="tambah" kode="<?php echo $tmp->kode_anak_asuh;?>"
            judul="<?php echo $tmp->nama_calon;?>"
            pengarang="<?php echo //$tmp->status;?>"><i class="glyphicon glyphicon-plus"></i></a></td>
        </tr>
        <?php endforeach;?>
    </table>