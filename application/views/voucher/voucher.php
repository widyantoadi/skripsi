<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<? $this->load->view('header')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cetak Voucher Pengeluaran Kas</title>

    <link rel="stylesheet" href="<? echo base_url();?>lib/bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="<? echo base_url();?>lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<? echo base_url();?>lib/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<? echo base_url();?>lib/select2/css/select2.min.css">
    <link rel="stylesheet" href="<? echo base_url();?>lib/bootstrap/css/custom.css">
    

    <script src="<? echo base_url();?>lib/bootstrap/js/jquery.min.js"></script>
    <script src="<? echo base_url();?>lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="<? echo base_url();?>lib/select2/js/select2.min.js"></script>
    <script src="<? echo base_url();?>lib/bootstrap/js/plugin.js"></script>

    
</head>


<body>
    <div class="container">
        <!-- Static navbar -->
        
        <!-- Main component for a primary marketing message or call to action -->
        

        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors();?>
                <?php echo $message;?>
                <?php 
                $attributes = array('name' => 'form_voucher');
                echo form_open_multipart('voucher/store',$attributes); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>
                                Form Voucher Pengeluaran Kas
                            </strong>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label">No. Voucher </label>
                                <input type="text" name="no_voucher" class="form-control" readonly value="<?php echo $no_voucher;?>"></input>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal Voucher</label>
                                <input type="text" name="tgl_voucher" class="form-control" value="<?php echo date("Y-m-d");?>" readonly></input>
                            </div>
                            <div class="form-group">
                                <label class="control-label">kode pengurus</label>
                                <input type="text" name="kode_pengurus" class="form-control" readonly value="<?php echo $kode_pengurus;?>"></input>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Pengurus</label>
                                <input type="text" name="nama_pengurus" class="form-control" readonly value="<?php echo $nama_pengurus;?>"></input>
                            </div>
                             
                            
                            <div class="form-group">
                                <label class="control-label">Detail</label>
                                <table class="table table-bordered" id="table-address"> 
                                    <thead> 
                                        <tr> 
                                            <th width="150">Nama Anak</th> 
                                          <th>Kategori</th>
                                            <th>Keperluan</th>
                                            <th>Jumlah</th>
                                            <th>Ref. Kwitansi</th> 
                                            <th>Tgl. Bayar</th> 
                                            
                                            <th class="text-center" width="50">Remove</th> 
                                        </tr>         
                                    </thead>     

                                    <tbody>
                                        <tr>
                                            
                                            <td><select class="form-control select2" name="kode_anak_asuh[]" required></select></td> 
                                          
                                          <td> 
                                          <select name="kategori[]" required="requreid" class="form-control">
                                           <option value="">--Pilih--</option>
                                           <option value="Akademis">Akademis</option>
                                           <option value="Kesehatan" >Kesehatan</option>
                                           <option value="Lain-lain">Lain-lain</option>
                                          </select></td>
                                            <td><input type="text" class="form-control" name="keperluan[]" required></input></td> 
                                            <td><input type="text" class="form-control" name="jumlah[]" required></input></td> 
                                            <td><input type="text" class="form-control" name="ref_kwitansi[]" ></input></td> 
                                            <td><input type="date" class="form-control"  name="tgl_bayar[]"  placeholder="yyyy-mm-dd"></input></td> 
                                            
                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger btn-sm btn-delete-address"><i class="fa fa-trash-o"></i></button>
                                            </td> 
                                        </tr>       
                                    </tbody>

                                    <tfoot>
                                        <!--tr>
                                            <td colspan="4"></td>
                                            
                                            <td colspan="2" class="text-center">
                                                <label>GRAND TOTAL</label><input type="text" class="form-control" name="grandtotal" ></input>
                                            </td>
                                        </tr-->
                                        <tr>

                                            <td colspan="7" class="text-center">
                                                <button type="button" class="btn btn-success btn-sm" id="add-address"><i class="fa fa-plus"></i> Tambah</button>
                                            </td>
                                        </tr>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" value="save">Submit</button>
                            <button type="reset" onclick="goBack()" class="btn btn-default">Keluar</button>
                        </div>
                    </div>
                </form>

               

            </div>
        </div>
    </div> 
</body>
</html>
<script>
function goBack() {
    window.history.back();
}
</script>
