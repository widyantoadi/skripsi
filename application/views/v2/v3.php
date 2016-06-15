<?//$this->load->view('header')?>
<head>
            
            <link href="<?php echo base_url('assets3/css/bootstrap.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets3/font-awesome/css/font-awesome.css');?>" rel="stylesheet">
        
            <link href="<?php echo base_url('assets3/css/plugins/morris/morris-0.4.3.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets3/css/plugins/timeline/timeline.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets3/css/datepicker.css');?>" rel="stylesheet">
        
            
            <script src="<?php echo base_url('assets3/js/jquery-1.8.3.min.js');?>"></script>
            <script src="<?php echo base_url('assets3/js/bootstrap.js');?>"></script>
            <script src="<?php echo base_url('assets3/js/tinymce/tinymce.min.js');?>"></script>
            <script>
                    tinymce.init({selector:'textarea'});
                    
                    $(function(){
                        $("#tanggal1").datepicker({
                            format:'yyyy-mm-dd'
                        });
                        
                        $("#tanggal2").datepicker({
                            format:'yyyy-mm-dd'
                        });
                        
                        $("#tanggal").datepicker({
                            format:'yyyy-mm-dd'
                        });
                    })
            </script>
        </head>
<script>
    $(function(){
        
        function loadData(args) {
            //code
            $("#tampil").load("<?php echo site_url('v2/tampil');?>");
        }
        loadData();
        
        function kosong(args) {
            //code
            $("#kode_anak_asuh").val('');
            $("#kode_calon").val('');
            $("#status").val('');
        }
        
        $("#nis").click(function(){
            var nis=$("#nis").val();
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/cariAnggota');?>",
                type:"POST",
                data:"nis="+nis,
                cache:false,
                success:function(html){
                    $("#nama").val(html);
                }
            })
        })
        
        $("#kode").keypress(function(){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            
            if(keycode == '13'){
                var kode=$("#kode").val();
            
                $.ajax({
                    url:"<?php echo site_url('v2/cariBuku');?>",
                    type:"POST",
                    data:"kode="+kode,
                    cache:false,
                    success:function(msg){
                        data=msg.split("|");
                        if (data==0) {
                            alert("data tidak ditemukan");
                            $("#judul").val('');
                            $("#pengarang").val('');
                        }else{
                            $("#judul").val(data[0]);
                            $("#pengarang").val(data[1]);
                            $("#tambah").focus();
                        }
                    }
                })
            }
        })
        
        $("#tambah").click(function(){
            var kode=$("#kode").val();
            var judul=$("#judul").val();
            var pengarang=$("#pengarang").val();
            var keperluan=$("#keperluan").val();
            var jumlah=$("#jumlah").val();
            var ref_kwitansi=$("#ref_kwitansi").val();
            var tgl_bayar=$("#tgl_bayar").val();

            
            if (kode=="") {
                //code
                alert("Kode Anak Masih Kosong");
                return false;
            }else if (judul=="") {
                //code
                alert("Data tidak ditemukan");
                return false
            }else{
                $.ajax({
                    url:"<?php echo site_url('v2/tambah');?>",
                    type:"POST",
                    data:"kode="+kode+"&judul="+judul+"&keperluan="+keperluan+"&jumlah="+jumlah+"&ref_kwitansi="+ref_kwitansi+"&pengarang="+pengarang,
                    cache:false,
                    success:function(html){
                        loadData();
                        kosong();
                    }
                })    
            }
            
        })
        
        
        $("#simpan").click(function(){
            var nomer=$("#no").val();
            var pinjam=$("#pinjam").val();
            var kembali=$("#kembali").val();
            var nis=$("#nis").val();
            var jumlah=parseInt($("#jumlahTmp").val(),10);
            
            if (nis=="") {
                alert("Pilih Nis Siswa");
                return false;
            }else if (jumlah==0) {
                alert("pilih buku yang akan dipinjam");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('v2/sukses');?>",
                    type:"POST",
                    data:"nomer="+nomer+"&pinjam="+pinjam+"&kembali="+kembali+"&nis="+nis+"&jumlah="+jumlah,
                    cache:false,
                    success:function(html){
                        alert("Transaksi Peminjaman berhasil");
                        location.reload();
                    }
                })
            }
            
        })
        
        $(".hapus").live("click",function(){
            var kode=$(this).attr("kode");
            
            $.ajax({
                url:"<?php echo site_url('v2/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    loadData();
                }
            });
        });
        
        $("#cari").click(function(){
            $("#myModal2").modal("show");
        })
        
        $("#caribuku").keyup(function(){
            var caribuku=$("#caribuku").val();
            
            $.ajax({
                url:"<?php echo site_url('v2/pencarianbuku');?>",
                type:"POST",
                data:"caribuku="+caribuku,
                cache:false,
                success:function(html){
                    $("#tampilbuku").html(html);
                }
            })
        })
        
        $(".tambah").live("click",function(){
            var kode=$(this).attr("kode");
            var judul=$(this).attr("judul");
            var pengarang=$(this).attr("pengarang");
            
            $("#kode").val(kode);
            $("#judul").val(judul);
            $("#pengarang").val(pengarang);
            
            $("#myModal2").modal("hide");
        })
        
    })
</script>
<?php $tgl=date("Y-m-d");?>

<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="<?php echo site_url('peminjaman/simpan');?>" method="post">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">No. Transaksi</label>
                    <div class="col-lg-7">
                        <input type="text" id="no" name="no" class="form-control" value="<?php echo $kode_calon;?>" readonly="readonly">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tgl Pinjam</label>
                    <div class="col-lg-7">
                        <input type="text" id="pinjam" name="pinjam" class="form-control" value="<?php echo $tgl;?>" readonly="readonly">
                    </div>
                </div>
                
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Nis</label>
                    <div class="col-lg-7">
                        <!--select name="nis" class="form-control" id="nis">
                            <option></option>

                            
                        </select-->
                        <input type="text" name="nis" id="nis" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Nama Siswa</label>
                    <div class="col-lg-7">
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        Data Buku
    </div>
    
    <div class="panel-body">
        <div class="form-inline">
            <div class="form-group">
                
                <input type="text" class="form-control" placeholder="Kode Anak" id="kode">
            </div>
            <div class="form-group">
             
                <input type="text" class="form-control" placeholder="Nama Anak" id="judul" readonly="readonly">
            </div>
            <div class="form-group">
              
                <input type="text" class="form-control" placeholder="Kategori" id="pengarang" >
            </div>
             <div class="form-group">
                
                <input type="text" class="form-control" placeholder="Keperluan" id="keperluan" >
            </div>
             <div class="form-group">
               
                <input type="text" class="form-control" placeholder="jumlah" id="jumlah" >
            </div>
             <div class="form-group">
                
                <input type="text" class="form-control" placeholder="ref kwitansi" id="ref_kwitansi" readonly="readonly">
            </div>
            <div class="form-group">
            
                <input type="date" class="form-control" placeholder="tgl bayar" id="tgl_bayar" readonly="readonly">
            </div>
            <div class="form-group">
                
                <button id="tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <div class="form-group">
                
                <button id="cari" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </div>
    
    <div id="tampil"></div>
    
    <div class="panel-footer">
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
    </div>
</div>




 <!-- Modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cari Buku</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-horizontal">
                            <label class="col-lg-3 control-label">Cari Nama Buku</label>
                            <div class="col-lg-5">
                                <input type="text" name="caribuku" id="caribuku" class="form-control">
                            </div>
                        </div>
                        
                        <div id="tampilbuku"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
 <script src="<?php echo base_url('assets3/js/holder.js');?>"></script>
        <script src="<?php echo base_url('assets3/js/bootstrap-datepicker.js');?>"></script>
        <script src="<?php echo base_url('assets3/js/application.js');?>"></script>
        <script src="<?php echo base_url('assets3/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets3/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
        <script src="<?php echo base_url('assets3/js/plugins/morris/raphael-2.1.0.min.js');?>"></script>
        <script src="<?php echo base_url('assets3/js/plugins/morris/morris.js');?>"></script>
        <script src="<?php echo base_url('assets3/js/sb-admin.js');?>"></script>
        <script src="<?php echo base_url('assets3/js/demo/dashboard-demo.js');?>"></script>    