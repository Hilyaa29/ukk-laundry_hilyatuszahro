
 <div class="row">
     <div class="col-lg-12">
         <div class="card card-primary card-outline">
             <div class="card-body">
                 <h5 class="card-title"></h5>

                 <p class="card-text">
                     Selamat Datang di Aplikasi Laundry
                 </p>


             </div>
         </div>
     </div>
 </div>

 

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary text-drak">
            <div class="inner">
                <h3><?= $this->db->get('tb_transaksi')->num_rows(); ?></h3>
                <p>Data Transaksi</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?= base_url('transaksi') ?>" class="small-box-footer">info lebih<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success text-drak">
            <div class="inner">
                <h3><?= $this->db->get('tb_member')->num_rows(); ?></h3>

                <p>Data Member</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('member') ?>" class="small-box-footer">info lebih<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info ">
            <div class="inner">
                <h3><?= $this->db->get('tb_paket')->num_rows();  ?></h3>

                <p>Data Paket</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= base_url('paket') ?>" class="small-box-footer">info lebih<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger text-drak">
            <div class="inner">
                <h3><?= $this->db->get('tb_outlet')->num_rows();  ?></h3>

                <p>Data Outlet</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= base_url('outlet') ?>" class="small-box-footer">info lebih <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

 <!-- /.row -->