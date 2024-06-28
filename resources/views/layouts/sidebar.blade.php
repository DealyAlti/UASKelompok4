<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="header">MASTER</li>
            <li>
                <a href="{{ route('kategori.index') }}">
                    <i class="fa fa-list" aria-hidden="true"></i> <span>Kategori</span>
                </a>
            </li>
            <li>
                <a href="{{ route('produk.index') }}">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i> <span>Produk</span>
                </a>
            </li>

            </li>
            <li>
                <a href="{{ route('supplier.index') }}">
                <i class="fa fa-cubes" aria-hidden="true"></i></i> <span>Supplier</span>
                </a>
            </li>
            <li class="header">TRANSAKSI</li>
            <li>
                <a href="{{ route('barangmasuk.index') }}">
                    <i class="fa fa-archive" aria-hidden="true"></i> <span>Barang Masuk</span>
                </a>
            </li>

            <li>
                <a href="{{ route('barangkeluar.index') }}">
                    <i class="fa fa-truck" aria-hidden="true"></i></i> <span>Barang Keluar</span>
                </a>
            </li>

            <li class="header">LAPORAN</li>
            <li>
                <a href="{{ route('laporan.index') }}">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i> <span>Laporan Barang Masuk</span>
                </a>
            </li>

            <li>
                <a href="{{ route('laporankeluar.index') }}">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i> <span>Laporan Barang Keluar</span>
                </a>
            </li>
        
           
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
