<table class="table table-striped">
        <thead>
            <tr>
                <td>Kode Buku</td>
                <td>Judul Buku</td>
                <td>Pengarang</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($tmp as $tmp):?>
        <tr>
            <td><?php echo $tmp->kode_anak_asuh;?></td>
            <td><?php echo $tmp->kategori;?></td>
            <td><?php echo $tmp->keperluan;?></td>
            <td><?php echo $tmp->jumlah;?></td>
            <td><?php echo $tmp->tgl_bayar;?></td>
            <td><?php echo $tmp->ref_kwitansi;?></td>
            <td><a href="#" class="hapus" kode="<?php echo $tmp->kode_anak_asuh;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="2">Total Buku</td>
            <td colspan="2"><input type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTmp;?>" class="form-control"></td>
        </tr>
    </table>