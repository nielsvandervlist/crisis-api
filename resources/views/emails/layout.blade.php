<!DOCTYPE html>
<html style="margin: 0;padding: 0;" lang="nl">
<head>
    <meta charset="utf-8">
    <title>Uitnodiging {{ $participant }}</title>
</head>
<body style="margin: 0;padding: 0;font-family: Helvetica, arial, sans-serif;font-size: 16px;line-height: 22px;background-color: #f0f4f7;">
<!-- Container Table 100% -->
<div style="background: #f0f4f7;width: 100%;border: none;padding: 40px;">

    <div style="background: #ffffff;width: 600px;border: none;padding:0;text-align: center;margin: 0 auto;">
        <div id="content" style="padding: 0 40px 40px 40px;color: #999999;">
            @yield('content')
            <p>
                Met vriendelijke groet<br>
            </p>
        </div>
    </div>
</div>
</body>
</html>
