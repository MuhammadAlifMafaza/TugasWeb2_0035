  <!--end::Header--> <!--begin::Sidebar-->
  <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand"> <!--begin::Brand Link--> 
                <a href="<?= base_url('/'); ?>" class="brand-link"> MUHAMMAD ALIF MAFAZA <span class="brand-text fw-light">23.230.0035</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
            <nav class="mt-2"> <!--begin::Sidebar Menu-->
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <?php
                // Mendapatkan nilai `action` dari URL untuk menentukan halaman aktif
                $action = isset($_GET['action']) ? $_GET['action'] : 'home';
                ?>
                    <li class="na   v-item"> 
                        <a href="<?= base_url('/'); ?>" class="nav-link <?= $action === 'home' ? 'active' : '' ?>"> 
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a> 
                    </li>
                
                    <li class="nav-header">MASTER</li>
                    <li class="nav-item"> 
                        <a href="index.php?action=barang" class="nav-link <?= $action === 'barang' || $action === 'addBarang' || $action === 'editBarang'? 'active' : '' ?>"> 
                            <i class="nav-icon bi bi-box"></i>
                            <p>Barang</p>
                        </a> 
                    </li>
                    <li class="nav-item"> 
                        <a href="index.php?action=pelanggan" class="nav-link <?= $action === 'pelanggan' || $action === 'addPelanggan' ? 'active' : '' ?>"> 
                            <i class="nav-icon bi bi-people"></i>
                            <p>Pelanggan</p>
                        </a> 
                    </li>
                    <li class="nav-header">TRANSAKSI</li>
                    <li class="nav-item"> 
                        <a href="index.php?action=transaksi" class="nav-link <?= $action === 'transaksi' || $action === 'addTransaksi' ? 'active' : '' ?>"> 
                            <i class="nav-icon bi bi-currency-exchange"></i>
                            <p>Transaksi Barang</p>
                        </a> 
                    </li>
                </ul> <!--end::Sidebar Menu-->
            </nav>

            </div> <!--end::Sidebar Wrapper-->
        </aside> 