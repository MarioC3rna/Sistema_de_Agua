<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?= isset($titulo) ? $titulo . ' — Oficina del Agua' : 'Oficina del Agua' ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="<?= base_url('css/mdb.min.css') ?>" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" />
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="<?= base_url() ?>" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                    </a>
                    <a href="<?= site_url('tipos_servicios') ?>"
                       class="list-group-item list-group-item-action py-2<?= (isset($menu_activo) && $menu_activo === 'tipos_servicios') ? ' active' : '' ?>"
                       data-mdb-ripple-init>
                        <i class="fas fa-list fa-fw me-3"></i><span>Tipos de Servicio</span>
                    </a>
                    <a href="<?= site_url('tarifas') ?>"
                       class="list-group-item list-group-item-action py-2<?= (isset($menu_activo) && $menu_activo === 'tarifas') ? ' active' : '' ?>"
                       data-mdb-ripple-init>
                        <i class="fas fa-money-bill fa-fw me-3"></i><span>Tarifas</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-2 disabled" data-mdb-ripple-init>
                        <i class="fas fa-users fa-fw me-3"></i><span>Clientes</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-2 disabled" data-mdb-ripple-init>
                        <i class="fas fa-tint fa-fw me-3"></i><span>Contadores</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-2 disabled" data-mdb-ripple-init>
                        <i class="fas fa-file-invoice fa-fw me-3"></i><span>Lecturas y Recibos</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-2 disabled" data-mdb-ripple-init>
                        <i class="fas fa-wallet fa-fw me-3"></i><span>Pagos</span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <a class="navbar-brand text-white d-flex align-items-center" href="<?= base_url() ?>">
                    <i class="fas fa-tint me-2"></i>Oficina del Agua
                </a>
            </div>
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="container-fluid pt-4">

            <?php if ($this->session->flashdata('mensaje')): ?>
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('mensaje') ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>
