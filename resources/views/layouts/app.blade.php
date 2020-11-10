<!DOCTYPE html>
<html lang="en">


<head>
   @include('layouts.head')
</head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            @include('layouts.header')
			<!-- /Header -->

			<!-- Sidebar -->
             @include('layouts.menu')
			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            @section('main-body');
            @show


			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		@include('layouts.all_script.script')

    </body>


</html>
