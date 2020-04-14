<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">

 	<?php //$user_login = Auth::user(); ?>
  	@if(isset($user_login))
  	<li class=""><a title="" href=""><i class="icon icon-alt"></i> <span class="text">{{$user_login}}</span></a></li>
    <li class=""><a title="" href="admin/logout.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    @endif
  </ul>
</div>
<!--close-top-Header-menu-->

@include('admin.layout.menu')