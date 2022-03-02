<aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- sidebar: style can be found in sidebar.less -->
         <div class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="pull-left image">
                  <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
               </div>
               <div class="pull-left info">
                  <p>{{auth()->user()->name}}</p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
               </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
												<nav class="mt-2">
            <!-- <ul class="sidebar-menu"> -->
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item header">МЕНЮ</li>               
               <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon fas fa-circle"></i> <span>Профиль</span></a></li>
               <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon fas fa-circle"></i> <span>Услуги</span></a></li>

            </ul>
									</div>	
         <!-- /.sidebar -->
      </aside>