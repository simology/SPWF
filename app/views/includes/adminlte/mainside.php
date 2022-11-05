  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= HOME; ?>" class="brand-link">
      <img src="<?= asset('dist/img/AdminLTELogo.png'); ?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Portale</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= asset('dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= ucfirst($_SESSION['Auth']['username']); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                MENU RAPPORTINO
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

			<li class="nav-item">
                <a href="<?= HOME.'/insert'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuovo Rapportino</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= HOME; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista Rapportini</p>
                </a>
			  </li>

			  <li class="nav-item">
                <a href="<?= HOME; ?>/filter_date" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Filtra Rapportino</p>
                </a>
              </li>




            </ul>
		  </li>
		  
<!-- -->



      </nav>
      <!-- /.sidebar-menu -->

	        <!-- Sidebar Menu -->
			<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                MENU PRODOTTI
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

			<li class="nav-item">
                <a href="<?= URLROOT.'product/insert'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuovo Prodotto</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= URLROOT.'product/show'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista Prodotti</p>
                </a>
			  </li>





            </ul>
		  </li>
		  
<!-- -->



      </nav>
	  <!-- end navbar -->
    </div>
    <!-- /.sidebar -->
  </aside>