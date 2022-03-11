<?php $this->extend('layout/template') ?>

<?php $this->section('content') ?>

  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <a href="/productos" class="btn btn-link mb-4">Regresar a la lista</a>

        <?php if (session()->getFlashdata('mensaje')): ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('mensaje') ?>
          </div>
        <?php endif ?>

        <?php if (!empty($errores)): ?>
          <div class="alert alert-danger">
          <?php foreach ($errores as $error): ?>
              <p><?= $error ?></p>
          <?php endforeach ?>
          </div>
        <?php endif ?>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Agregando nuevo libro</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <form action="/productos/agregar" method="post" style="max-width: 400px">

                  <div class="form-group">
                    <label for="nombre">Nombre del producto</label>
                    <input type="text" name="nombre" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="descripcion">Descripcion del producto</label>
                    <input type="text" name="descripcion" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="sku">SKU del producto</label>
                    <input type="text" name="sku" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="precio">Precio del producto</label>
                    <input type="text" name="precio" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="stock">Stock del producto</label>
                    <input type="text" name="stock" class="form-control">
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar libro</button>
                  </div>

                </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?php $this->endSection() ?>


