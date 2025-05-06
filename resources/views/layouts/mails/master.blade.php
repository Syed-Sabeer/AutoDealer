<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ \App\Helpers\Helper::getCompanyName() }} - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fc;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-container {
            width: 100%;
            max-width: 700px;
            margin: 40px auto;
            padding: 40px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            padding: 30px 0;
        }
        .email-header a{
            color: inherit;
            text-decoration: none;
        }
        .email-header .app-brand-logo img {
            width: 60px;
            height: 60px;
            margin-bottom: 20px;
        }
        .email-header .app-brand-text {
            font-size: 30px;
            color: #4e73df;
            margin: 0;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .email-body {
            padding: 25px 0;
            color: #495057;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.7;
            margin: 0 0 20px;
        }
        .email-body .credentials {
            margin-top: 25px;
            padding: 25px;
            background-color: #f8f9fc;
            border-radius: 12px;
            border: 1px solid #e9ecef;
        }
        .credentials h3 {
            color: #4e73df;
            font-size: 20px;
            font-weight: 700;
            margin: 0 0 15px;
        }
        .credentials p {
            font-size: 16px;
            color: #333;
            margin: 0 0 10px;
        }
        .cta-button {
            background-color: #4e73df;
            color: #fff;
            text-align: center;
            padding: 14px 28px;
            border-radius: 8px;
            display: inline-block;
            margin-top: 20px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .cta-button:hover {
            background-color: #3e59b3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #6c757d;
        }
        .footer a {
            color: #4e73df;
            text-decoration: none;
            font-weight: 500;
        }
        .footer p {
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <div class="email-header">
            <a href="{{route('dashboard')}}" class="app-brand auth-cover-brand">
                <span class="app-brand-logo demo">
                    <img src="{{ asset(\App\Helpers\Helper::getLogoLight()) }}" alt="{{\App\Helpers\Helper::getCompanyName()}}">
                </span>
                <span class="app-brand-text demo text-heading fw-bold">{{ \App\Helpers\Helper::getCompanyName() }}</span>
            </a>
        </div>

        <div class="email-body">
            @yield('content')
        </div>

        <div class="footer">
            <p>© {{ date('Y') }}, {{ \App\Helpers\Helper::getfooterText() }}</p>
        </div>
    </div>

    @yield('script')
</body>
</html>
