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
                <li  class="{{ active('admin.private.applications') }}"><a href="{{ route('admin.private.applications') }}"><i class="fa fa-circle-o"></i> Список заявок</a></li>
                <li  class="{{ active('admin.private.users') }}"><a href="{{ route('admin.private.users') }}"><i class="fa fa-circle-o"></i> Список регистраторов</a></li>
            </ul>
        </li>
    </ul>
</section>
