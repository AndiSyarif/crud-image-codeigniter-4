<?= $this->extend('template/main') ?>
<?= $this->section('title') ?>
Barang
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $this->renderSection('title') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="/barang/new" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add
                                    Barang</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover text-center" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Category</th>
                                        <th>Supplier</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($barang as $key => $data) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $data['name'] ?></td>
                                            <td><?= $data['category'] ?></td>
                                            <td><?= $data['supplier'] ?></td>
                                            <td><?= $data['stock'] ?></td>
                                            <td>Rp. <?= number_format($data['price'], 0) ?></td>
                                            <td>
                                                <?php if (!empty($data['image'])) : ?>
                                                    <img src="<?= base_url('img/' . $data['image']) ?>" class="img-preview img-fluid" width="150px" height="150px">
                                                <?php else : ?>
                                                    <img src="<?= base_url('assets/img/logo.png') ?>" class="img-preview img-fluid" width="150px" height="150px">
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form class="d-inline" action="/barang/<?= $data['id_barang'] ?>/edit" method="GET">
                                                    <button type="submit" class="btn btn-success btn-sm mr-1">
                                                        <i class="fa-solid fa-pen"></i> Edit
                                                    </button>
                                                </form>
                                                <form class="d-inline" action="/barang/<?= $data['id_barang'] ?>" method="POST">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm" id="btn-delete"><i class="fa-solid fa-trash-can"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
</div>

<?= $this->endSection() ?>