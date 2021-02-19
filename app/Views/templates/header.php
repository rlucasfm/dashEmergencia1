<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= esc($title) ?></title>

    <!-- Custom fonts for this template-->
    <link href="/static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= ROOTFOLDER ?>/static/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CSS MAIN particular -->
    <link href="<?= ROOTFOLDER ?>/static/css/main.css" rel="stylesheet">

    <!-- LOAD JQUERY FIRST -->
    <script src="<?= ROOTFOLDER ?>/static/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript-->    
    <script src="<?= ROOTFOLDER ?>/static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body id="page-top" class="sidebar-toggled">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= ROOTFOLDER ?>/">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-desktop"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Emergencia1 <sup>up</sup></div>
            </a>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dash">
                <a class="nav-link" href="<?= ROOTFOLDER ?>/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Início</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Turmas
            </div>

            <!-- Nav Item - Gerenciamento de turmas -->
            <li class="nav-item" id="turmas">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Gerenciar turmas</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Turmas:</h6>
                        <a class="collapse-item" href="<?= ROOTFOLDER ?>/turmas/criarturma">Criar turma</a>
                        <a class="collapse-item" href="<?= ROOTFOLDER ?>/turmas/listarturmas">Listar turmas</a>                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Matrículas
            </div>

            <!-- Nav Item - Gerenciamento de Listas -->
            <li class="nav-item" id="matriculas">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Matrículas</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Matriculas:</h6>
                        <a class="collapse-item" href="/">Gerenciamento de Listas</a>
                        <a class="collapse-item" href="/">Relatório de Envio</a>                        
                    </div>
                </div>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">            

            <!-- Sidebar Message -->
            <div class="sidebar-card">
                <img class="sidebar-card-illustration mb-2" src="<?= ROOTFOLDER ?>/static/img/undraw_rocket.svg" alt="">
                <p class="text-center mb-2"><strong>RL</strong> oferece os melhores sistemas, quer saber mais?</p>
                <a class="btn btn-success btn-sm" href="https://richardlucas.com.br">Saiba mais!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="overflow-hidden">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 /static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h3 class="mr-auto mt-3"><?= esc($title) ?></h3>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">                        

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">1</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Novidades!
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">09 de fevereiro, 2021</div>
                                        <span class="font-weight-bold">Ínicio do desenvolvimento da nova plataforma!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todos</a>
                            </div>
                        </li>                    

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= esc($name); ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= ROOTFOLDER ?>/static/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Suporte
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

            <?php if(! empty($successMsg) ): ?>
                <!-- TOAST DE AVISO - SUCCESS FLASHDATA -->
                <!-- Then put toasts within -->
                <div class="toast" role="alert" id="toastSuccess" aria-live="assertive" aria-atomic="true" data-autohide="false" style="position: absolute; top: 15px; left:50%; z-index:15">
                    <div class="toast-header">
                        <strong class="mr-auto">Sucesso!</strong>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        <?= esc($successMsg) ?>
                    </div>
                </div>
                <script>
                    $('#toastSuccess').toast('show')
                </script>
            <?php endif ?>
            <?php if(! empty($errorMsg) ): ?>
                    <!-- TOAST DE AVISO - ERRO FLASHDATA -->
                    <!-- Then put toasts within -->
                    <div class="toast" role="alert" id="toastError" aria-live="assertive" aria-atomic="true" data-autohide="false" style="position: absolute; top: 15px; left:50%; z-index:15">
                        <div class="toast-header">
                            <strong class="mr-auto">Houve um erro...</strong>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body">
                            <?= esc($errorMsg) ?>
                        </div>
                    </div>
                <script>
                    $('#toastError').toast('show')
                </script>
            <?php endif ?>