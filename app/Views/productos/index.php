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

        <a href="/productos/agregar" class="btn btn-success mb-4">Nuevo producto</a>

        <?php if (session()->getFlashdata('mensaje')): ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('mensaje') ?>
          </div>
        <?php endif ?>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla de productos</h3>

                <div class="card-tools">

                  <form action="/productos">

                    <div class="input-group input-group-sm" style="width: 400px;">
                      filtrar por: &nbsp;
                      <select name="buscar_por" id="" class="form-control">
                        <option value="nombre">Nombre</option>
                        <option value="sku">SKU</option>
                      </select>
                      <input type="text" name="buscar" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>

                  </form>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>SKU</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($productos as $p): ?>
                      <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= $p['nombre'] ?></td>
                        <td><?= $p['sku'] ?></td>
                        <td>$<?= $p['precio'] ?></td>
                        <td><?= $p['stock'] ?></td>
                        <td>
                          <a href="/productos/editar/<?= $p['id'] ?>">Editar</a> |
                          <a href="/productos/eliminar/<?= $p['id'] ?>">Eliminar</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <?= $pager->links('default', 'paginador_personalizado') ?>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?php $this->endSection() ?>


