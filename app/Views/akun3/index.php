<?=$this->extend('layout/backend');?>

<?=$this->section('content');?>
<title>SIA &mdash; Akun3</title>
<?=$this->endSection();?>

<?=$this->section('content');?>
<section class="section">
    <div class="section-header">
    <!-- <h1>Blank Page</h1> -->
    <a href="<?=site_url('akun3/new') ?>" class="btn btn-primary">Add New</a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alser-body">
                <button class="close" data-dismiss="alert"> x</button>
                <?=session()->getFlashdata('success');?>
            </div>
        </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alser-body">
                <button class="close" data-dismiss="alert"> x</button>
                <?=session()->getFlashdata('error');?>
            </div>
        </div>
        <?php endif; ?>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Akun 3</h4>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-striped table-md" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Akun 1</th>
                                    <th>Nama Akun 2</th>
                                    <th>Kode Akun 3</th>
                                    <th>Nama Akun 3</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($dtakun3 as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value->nama_akun1  ?></td>
                                    <td><?= $value->nama_akun2  ?></td>
                                    <td><?= $value->kode_akun3 ?></td>
                                    <td><?= $value->nama_akun3  ?></td>
                                    <td class="text-center" style="width:15%">
                                        <a href="<?= site_url('akun3/'.$value->id_akun3) .'/edit' ?>" class="btn btn-warning"><i class="fas fa-pencil-alt btn-small"></i> Edit</a>
                                        <!-- <a href="" class="btn btn-danger"><i class="fas fa-trash btn-small"></i> Del</a> -->
                                        <form action="<?=site_url('akun3/'.$value->id_akun3)?>" method="post" id="del-<?=$value->id_akun3?>" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-small" data-confirm="Anda yakin Menghapus data ini..!" data-confirm-yes="hapus(<?=$value->id_akun3?>)"><i class="fas fa-trash"></i> Del</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--  -->
            </div>
            
        </div>
</section>
<?=$this->endSection();?>

