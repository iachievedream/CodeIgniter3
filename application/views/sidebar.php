<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
		<div class="sidebar-brand-text mx-3">user</div>
	</a>
	<!-- Divider -->
	<hr class="sidebar-divider my-0">
	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="/dashboard">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>主頁面</span>
		</a>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider">
	<!-- Nav Item - Tables -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#checkin" aria-expanded="true" aria-controls="checkin">
			<i class="fas fa-fw fa-table"></i>
			<span>出勤系統</span>
		</a>
		<div id="checkin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="/checkin">出勤狀況</a>
				<a class="collapse-item" href="/checkin/">薪資</a>
			</div>
		</div>
	</li>
	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-wrench"></i>
			<span>系統</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="/log">記錄</a>
				<a class="collapse-item" href="/permission">權限管理</a>
				<a class="collapse-item" href="/permission/type">權限類別管理</a>
			</div>
		</div>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">
	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>