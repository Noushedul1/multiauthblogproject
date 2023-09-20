<!DOCTYPE html>
<html lang="en-us">
@include('includes.head')
<body>
  <!-- navigation -->
@include('includes.navigation')
<!-- /navigation -->

{{-- start of main content  --}}
@yield('content')
{{-- end of main content  --}}

{{-- start of footer  --}}
@include('includes.footer')
{{-- end of footer  --}}

<!-- JS Plugins -->
@include('includes.script')
</body>
