 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
         <!-- Sidebar user panel -->
         <div class="user-panel">
             <div class="pull-left image">
                 <img src="https://images.unsplash.com/photo-1555952517-2e8e729e0b44?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80"
                     class="img-circle" alt="User Image" />
             </div>
             <div class="pull-left info">
                 <p>{{ Auth::user()->name }}</p>
                 <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
             </div>
         </div>

         <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="sidebar-menu tree" data-widget="tree">
             <li class="header">MAIN NAVIGATION</li>
             <li class="active treeview">
                 <a href="/admin/home">
                     <i class="fa fa-pie-chart"></i> <span>Dashboard</span> </i>
                 </a>
             </li>
             <li class="treeview">
                 <a href="/admin/menu">
                     <i class="fa fa-cutlery"></i>
                     <span>Menu</span>
                 </a>
             </li>
             <li class="treeview">
                 <a href="/admin/transaksi">
                     <i class="fa fa-laptop"></i>
                     <span>Transaksi</span>
                 </a>
             </li>
             <li class="treeview">
                 <a href="/admin/testimoni">
                     <i class="fa fa-comment"></i> <span>Testimoni</span>
                 </a>
             </li>
             <li>
                 <a href="/admin/keluhan">
                     <i class="fa fa-comments"></i> <span>Keluhan</span>
                 </a>
             </li>
             <li class="treeview">
                <a href="/admin/customer">
                    <i class="fa fa-user"></i> <span>Customer</span>
                </a>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-bar-chart"></i> <span>Laporan</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right" style="margin-right:15px;"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="/admin/laporan"><i class="fa fa-circle-o"></i>Laporan Pendapatan</a></li>
                    <li><a href="/admin/laporan/customer"><i class="fa fa-circle-o"></i>Laporan Customer</a></li>
                    <li><a href="/admin/laporan/testimoni"><i class="fa fa-circle-o"></i>Laporan Testimoni</a></li>
                    <li><a href="/admin/laporan/keluhan"><i class="fa fa-circle-o"></i>Laporan Keluhan</a></li>
                </ul>
            </li>
             <li>
                 <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                     <i class="fa fa-fw fa-sign-out"></i> <span>Log Out</span>
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
             </li>
     </section>
     <!-- /.sidebar -->
 </aside>
