<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<base href="{{asset('')}}">

<link rel="stylesheet" href="admin_asset/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="admin_asset/css/fullcalendar.css" />
<link rel="stylesheet" href="admin_asset/css/bootstrap-wysihtml5.css" />
<link rel="stylesheet" href="admin_asset/css/colorpicker.css" />
<link rel="stylesheet" href="admin_asset/css/datepicker.css" />
<link rel="stylesheet" href="admin_asset/css/jquery.gritter.css" />
<link rel="stylesheet" href="admin_asset/css/bootstrap.min.css" />
<link rel="stylesheet" href="admin_asset/css/uniform.css" />
<link rel="stylesheet" href="admin_asset/css/select2.css" />
<link rel="stylesheet" href="admin_asset/css/matrix-style.css" />
<link rel="stylesheet" href="admin_asset/css/matrix-media.css" />
<link rel="stylesheet" href="admin_asset/css/font-awesome.css" />
<link rel="stylesheet" href="admin_asset/css/jquery.easy-pie-chart.css" />
<link href="admin_asset/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

@include('admin.layout.header')

<!--main-container-part-->
@yield('content')

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->

<!--
<script src="admin_asset/js/excanvas.min.js"></script> 
<script src="admin_asset/js/jquery.flot.min.js"></script> 
<script src="admin_asset/js/jquery.flot.resize.min.js"></script> 
<script src="admin_asset/js/jquery.peity.min.js"></script> 
<script src="admin_asset/js/fullcalendar.min.js"></script> 
<script src="admin_asset/js/matrix.calendar.js"></script> 
<script src="admin_asset/js/matrix.charts.js"></script> 
<script src="admin_asset/js/matrix.form_common.js"></script> 
<script src="admin_asset/js/matrix.wizard.js"></script> 
<script src="admin_asset/js/matrix.dashboard.js"></script> 
<script src="admin_asset/js/jquery.gritter.min.js"></script> 
<script src="admin_asset/js/matrix.interface.js"></script> 
<script src="admin_asset/js/matrix.chat.js"></script> 
<script src="admin_asset/js/jquery.validate.js"></script> 
<script src="admin_asset/js/matrix.form_validation.js"></script> 
<script src="admin_asset/js/jquery.wizard.js"></script> 
<script src="admin_asset/js/jquery.uniform.js"></script> 
<script src="admin_asset/js/select2.min.js"></script> 
<script src="admin_asset/js/matrix.popover.js"></script> 
<script src="admin_asset/js/jquery.dataTables.min.js"></script> 
<script src="admin_asset/js/matrix.tables.js"></script> 
<script src="admin_asset/js/jquery.min.js"></script> 
<script src="admin_asset/js/jquery.ui.custom.js"></script> 
<script src="admin_asset/js/bootstrap.min.js"></script>  
<script src="admin_asset/js/matrix.js"></script>
<script src="admin_asset/js/jquery.flot.crosshair.js"></script>  
<script src="admin_asset/js/jquery.flot.pie.js"></script> 
<script src="admin_asset/js/jquery.flot.stack.js"></script>
<script src="admin_asset/js/jquery.flot.pie.min.js"></script>
<script src="admin_asset/js/jquery.easy-pie-chart.js"></script>
<script src="admin_asset/js/bootstrap.js"></script> 
<script src="admin_asset/js/bootstrap-colorpicker.js"></script> 
<script src="admin_asset/js/bootstrap-datepicker.js"></script> 
<script src="admin_asset/js/jquery.toggle.buttons.js"></script> 
<script src="admin_asset/js/masked.js"></script> -->
<script src="admin_asset/js/wysihtml5-0.3.0.js"></script> 
<script src="admin_asset/js/bootstrap-wysihtml5.js"></script> 

<script src="admin_asset/js/jquery.min.js"></script> 
<script src="admin_asset/js/jquery.ui.custom.js"></script> 
<script src="admin_asset/js/bootstrap.min.js"></script> 
<script src="admin_asset/js/jquery.uniform.js"></script> 
<script src="admin_asset/js/select2.min.js"></script> 
<script src="admin_asset/js/jquery.dataTables.min.js"></script> 
<script src="admin_asset/js/matrix.js"></script> 
<script src="admin_asset/js/matrix.tables.js"></script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>

@yield('script')
</body>
</html>
