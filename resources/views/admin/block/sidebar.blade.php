<section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Навигация</li>
        <li class="treeview  {{ active('admin.private.*') }}">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Меню регистратора</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" >
                <li  class="{{ active('admin.private.applications.index') }}"><a href="{{ route('admin.private.applications.index') }}"><i class="fa fa-circle-o"></i> Список заявок</a></li>
                <li  class="{{ active('admin.private.users.index') }}"><a href="{{ route('admin.private.users.index') }}"><i class="fa fa-circle-o"></i> Список регистраторов</a></li>
            </ul>
        </li>
        <li class="treeview  {{ active('admin.user_interface.*') }}">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Пользовательские данные</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" >
               <li  class="{{ active('admin.user_interface.users.index') }}"><a href="{{ route('admin.user_interface.users.index') }}"><i class="fa fa-circle-o"></i> Список пользователей</a></li>
            </ul>
        </li>
    </ul>
</section>
