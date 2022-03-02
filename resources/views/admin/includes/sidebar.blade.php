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
               <li class="nav-item"><a class="nav-link" href="{{route('categories.index')}}"><i class="fa fa-list-ul"></i> <span>Категории</span></a></li>
               <!-- <li><a href="/ceo/categories"><i class="fa fa-list-ul"></i> <span>Категории</span></a></li> -->
               <li class="nav-item"><a class="nav-link" href="{{route('vmcategories-list')}}"><i class="fa fa-list-ul"></i> <span>VM Категории</span></a></li>

               <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-tags"></i> <span>Теги</span></a></li>
               
               <li class="nav-item"><a class="nav-link" href="{{route('admin.users.index')}}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
               
													
															<li class="nav-item">
				            <a href="#" class="nav-link">
				              <i class="nav-icon fas fa-circle"></i>
				              <p>
				                Контент
				                <i class="right fas fa-angle-left"></i>
				              </p>
				            </a>
				            <ul class="nav nav-treeview">
				              <li class="nav-item">
																		<a href="{{route('content.categories.index')}}" class="nav-link">
				                  <i class="far fa-circle nav-icon"></i>
				                  <p>Категории</p>
				                </a>
				              </li>
				              <li class="nav-item">
				                <a href="{{route('content.articles.updated')}}" class="nav-link">
				                  <i class="far fa-circle nav-icon"></i>
				                  <p>Обновлённые материалы</p>
				                </a>
				                
				                  <li class="nav-item">
				                    <a href="#" class="nav-link">
				                      <i class="far fa-dot-circle nav-icon"></i>
				                      <p>Level 3</p>
				                    </a>
				                  </li>
				                  <li class="nav-item">
				                    <a href="#" class="nav-link">
				                      <i class="far fa-dot-circle nav-icon"></i>
				                      <p>Level 3</p>
				                    </a>
				                  </li>
				                  <li class="nav-item">
				                    <a href="#" class="nav-link">
				                      <i class="far fa-dot-circle nav-icon"></i>
				                      <p>Level 3</p>
				                    </a>
				                  </li>
				               
				              </li>
				              <li class="nav-item">
				                <a href="#" class="nav-link">
				                  <i class="far fa-circle nav-icon"></i>
				                  <p>Level 2</p>
				                </a>
				              </li>
				            </ul>
				          	</li>

            </ul>
									</div>	
         <!-- /.sidebar -->
      </aside>