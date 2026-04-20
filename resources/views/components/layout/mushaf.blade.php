<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3">
    <meta name="description"
        content="@yield('meta_description', 'المصحف الشريف — اقرأ القرآن بصفحات مصحف المدينة المنورة مع تلاوات صوتية متعددة.')">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title', 'المصحف الشريف — مُناجاتك')</title>
    @stack('styles')
</head>

<body data-theme="light">
    @yield('content')
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
</body>

</html>