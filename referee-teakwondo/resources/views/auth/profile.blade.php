<!doctype html>
<html lang="fa">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <title>Log In / Sign Up — Taekwondo Theme</title>

    <!-- CSRF Token برای لاراول -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts & Icons -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900&display=swap"
        rel="stylesheet" />
    <!-- Unicons (برای کلاس‌های uil) -->
    <link
        href="https://unicons.iconscout.com/release/v4.0.0/css/unicons.css"
        rel="stylesheet" />

    <style>
        /* ====== تم تکواندو (متغیرها) ====== */
        :root {
            /* تم تکواندو */
            --bg: #131821;
            /* پس‌زمینه کلی (تیره، ورزشی) */
            --section-bg: #0f1720;
            /* لایهٔ بالاتر */
            --card-surface: #ffffff;
            /* سطح روشن برای بخش‌های متنی (مثل یونیفورم) */
            --muted: #dfe6ea;
            /* متن ثانویه روشن */
            --accent-red: #e53946;
            /* رنگ قرمز رقابتی */
            --accent-blue: #0b57a4;
            /* رنگ آبی رقابتی */
            --accent-dark: #0a2130;
            /* رنگ تیره برای آیکون‌ها/پس‌زمینه‌های کوچک */
            --soft-gray: #f5f7f8;
            /* برای بک‌گراندهای روشن داخل کارت */
            --glass: rgba(255, 255, 255, 0.04);
            /* overlay شیشه‌ای */
        }

        /* پایه — بر اساس استایل قبلی با ارجاع به متغیرهای جدید */
        * {
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-size: 15px;
            line-height: 1.7;
            color: var(--muted);
            margin: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-tap-highlight-color: transparent;

            /* 👇 تصویر پس‌زمینه با فیلتر خاکستری نیمه‌شفاف */
            background:
                linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.7)),
                url("sign/img/bgt.jpg") no-repeat center center fixed;
            background-size: cover;
        }


        a {
            cursor: pointer;
            transition: all 200ms linear;
            color: var(--muted);
        }

        a:hover {
            color: var(--soft-gray);
        }

        p {
            font-weight: 500;
            font-size: 14px;
            line-height: 1.7;
            margin: 0;
        }

        h4 {
            font-weight: 600;
            margin: 0 0 12px 0;
        }

        h6 span {
            padding: 0 20px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .section {
            position: relative;
            width: 100%;
            display: block;
        }

        .full-height {
            min-height: 100vh;
        }

        /* hide native checkbox but keep accessible */
        .checkbox {
            position: absolute;
            left: -9999px;
        }

        .checkbox+label {
            position: relative;
            display: block;
            text-align: center;
            width: 60px;
            height: 16px;
            border-radius: 8px;
            padding: 0;
            margin: 10px auto;
            cursor: pointer;
            background-color: var(--accent-red);
        }

        .checkbox+label:before {
            position: absolute;
            display: block;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--accent-blue);
            content: "\eb4f";
            font-family: "unicons";
            top: -10px;
            left: -10px;
            line-height: 36px;
            text-align: center;
            font-size: 24px;
            color: #fff;
            transition: all 0.5s ease;
        }

        .checkbox:checked+label:before {
            transform: translateX(44px) rotate(-270deg);
        }

        /* کارت سه‌بعدی */
        .card-3d-wrap {
            position: relative;
            width: 440px;
            max-width: 92%;
            height: 600px;
            /* افزایش ارتفاع برای نمایش کامل فرم ثبت نام */
            transform-style: preserve-3d;
            perspective: 800px;
            margin-top: 20px;
        }

        .card-3d-wrapper {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            transform-style: preserve-3d;
            transition: all 600ms ease-out;
        }

        .card-front,
        .card-back {
            width: 100%;
            height: 100%;
            /* استفاده از پس‌زمینه شفاف چون لایهٔ داخلی کارت با استایل جدید ساخته می‌شود */
            background-color: transparent;
            background-image: none;
            position: absolute;
            border-radius: 10px;
            left: 0;
            top: 0;
            transform-style: preserve-3d;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -o-backface-visibility: hidden;
            backface-visibility: hidden;
            box-shadow: 0 10px 40px rgba(2, 6, 23, 0.7);
            padding: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-back {
            transform: rotateY(180deg);
        }

        /* flip when checkbox checked */
        .checkbox:checked~.card-3d-wrap .card-3d-wrapper {
            transform: rotateY(180deg);
        }

        .center-wrap {
            position: absolute;
            width: 100%;
            padding: 0 18px;
            top: 50%;
            left: 0;
            transform: translate3d(0, -50%, 35px) perspective(100px);
            z-index: 20;
            display: block;
        }

        .form-group {
            position: relative;
            display: block;
            margin: 0;
            padding: 0;
        }

        .form-style {
            padding: 13px 20px;
            padding-left: 55px;
            height: 48px;
            width: 100%;
            font-weight: 500;
            border-radius: 4px;
            font-size: 14px;
            line-height: 22px;
            letter-spacing: 0.5px;
            outline: none;
            color: var(--muted);
            background-color: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.04);
            transition: all 200ms linear;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .form-style:focus {
            box-shadow: 0 6px 12px rgba(11, 87, 164, 0.12);
            border-color: rgba(11, 87, 164, 0.25);
        }

        .input-icon {
            position: absolute;
            top: 0;
            left: 18px;
            height: 48px;
            font-size: 20px;
            line-height: 48px;
            text-align: left;
            color: var(--accent-blue);
            transition: all 200ms linear;
        }

        .form-group+.form-group {
            margin-top: 12px;
        }

        /* buttons */
        .btn {
            border-radius: 4px;
            height: 44px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 200ms linear;
            padding: 0 30px;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            background: linear-gradient(90deg,
                    var(--accent-red),
                    var(--accent-blue));
            color: #fff;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(11, 87, 164, 0.15);
        }

        .btn.ghost {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: var(--muted);
            box-shadow: none;
        }

        .btn:active,
        .btn:focus,
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 36px rgba(11, 87, 164, 0.25);
        }

        .logo {
            position: absolute;
            top: 18px;
            right: 18px;
            z-index: 100;
        }

        .logo img {
            height: 26px;
            display: block;
        }

        /* layout grid */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 18px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .justify-content-center {
            justify-content: center;
        }

        .text-center {
            text-align: center;
        }

        .align-self-center {
            align-self: center;
        }

        .py-5 {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .pb-5 {
            padding-bottom: 40px;
        }

        .pt-5 {
            padding-top: 40px;
        }

        .pt-sm-2 {
            padding-top: 12px;
        }

        /* small helpers */
        .mb-0 {
            margin-bottom: 0;
        }

        .mt-4 {
            margin-top: 16px;
        }

        .mt-2 {
            margin-top: 8px;
        }

        .mb-4 {
            margin-bottom: 16px;
        }

        .pb-3 {
            padding-bottom: 12px;
        }

        /* ====== کارت داخلی تقسیم‌شده (برای وقتی خواستید کارت نتیجه بذارید) ====== */
        .card-inner-surface {
            display: flex;
            align-items: stretch;
            gap: 0;
            background: linear-gradient(180deg,
                    rgba(0, 0, 0, 0.35),
                    rgba(0, 0, 0, 0.45));
            border-radius: 10px;
            width: 100%;
            height: 100%;
        }

        .card-half-left {
            width: 50%;
            background: var(--card-surface);
            color: var(--accent-dark);
            padding: 36px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .card-half-right {
            width: 50%;
            padding: 36px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: linear-gradient(120deg,
                    rgba(11, 87, 164, 0.95) 0%,
                    rgba(229, 57, 70, 0.95) 100%);
        }

        .card-diagonal {
            position: absolute;
            inset: 0;
            pointer-events: none;
            background: linear-gradient(105deg,
                    rgba(11, 87, 164, 0.98) 0% 48%,
                    rgba(229, 57, 70, 0.98) 52% 100%);
            mix-blend-mode: multiply;
            opacity: 0.95;
        }

        .card-half-left h3,
        .card-half-right h3 {
            font-weight: 700;
            margin-bottom: 12px;
            letter-spacing: 0.6px;
        }

        .match-score {
            font-size: 50px;
            font-weight: 800;
            color: var(--card-surface);
            text-shadow: 0 4px 18px rgba(0, 0, 0, 0.5);
        }

        .input-icon {
            color: var(--accent-blue);
        }

        .header-hero {
            position: relative;
            background-size: cover;
            background-position: center;
        }

        .header-hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg,
                    rgba(19, 24, 33, 0.55),
                    rgba(2, 6, 23, 0.75));
            pointer-events: none;
        }

        /* responsive adjustments */
        @media (max-width: 920px) {
            .card-3d-wrap {
                width: 640px;
            }
        }

        @media (max-width: 700px) {
            .card-3d-wrap {
                height: 500px;
                /* کاهش ارتفاع در موبایل */
                margin-top: 30px;
            }

            .center-wrap {
                padding: 0 12px;
            }

            .form-style {
                height: 44px;
                padding-left: 50px;
            }

            .input-icon {
                left: 14px;
                font-size: 18px;
            }
        }

        @media (max-width: 420px) {
            .card-3d-wrap {
                height: auto;
                perspective: 600px;
                margin-top: 18px;
            }

            .card-front,
            .card-back {
                position: relative;
                transform: none !important;
                backface-visibility: visible;
                border-radius: 8px;
                padding: 18px;
                min-height: 320px;
            }

            .card-3d-wrapper {
                transform: none !important;
            }

            /* hide flip control on very small screens */
            .checkbox+label {
                display: none;
            }
        }

        /* placeholder color */
        ::placeholder {
            color: var(--muted);
            opacity: 0.8;
        }

        /* accessibility focus outline */
        .form-style:focus {
            outline: 2px solid rgba(11, 87, 164, 0.12);
        }

        /* اطمینان از فعال بودن فرم پشت در حالت چرخیده */
        #reg-log:checked~.card-3d-wrap .card-3d-wrapper .card-back {
            pointer-events: auto !important;
        }

        /* استایل جدید برای فرم ثبت نام */
        .signup-section {
            width: 100%;
            max-width: 720px;
            padding-bottom: 20px;
        }

        .signup-form {
            overflow-y: auto;
            max-height: 400px;
            padding-right: 10px;
        }

        .signup-form::-webkit-scrollbar {
            width: 6px;
        }

        .signup-form::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 3px;
        }

        .signup-form::-webkit-scrollbar-thumb {
            background: var(--accent-blue);
            border-radius: 3px;
        }

        /* استایل برای پیام‌های خطا و موفقیت */
        .alert {
            padding: 12px 16px;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 14px;
            font-weight: 500;
        }

        .alert-success {
            background-color: rgba(76, 175, 80, 0.2);
            color: #4caf50;
            border: 1px solid rgba(76, 175, 80, 0.3);
        }

        .alert-error {
            background-color: rgba(244, 67, 54, 0.2);
            color: #f44336;
            border: 1px solid rgba(244, 67, 54, 0.3);
        }

        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .form-message {
            display: none;
            margin-top: 12px;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 13px;
        }

        .form-message.success {
            background-color: rgba(76, 175, 80, 0.1);
            color: #4caf50;
            border: 1px solid rgba(76, 175, 80, 0.2);
        }

        .form-message.error {
            background-color: rgba(244, 67, 54, 0.1);
            color: #f44336;
            border: 1px solid rgba(244, 67, 54, 0.2);
        }
    </style>
</head>

<body>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">

                        <!-- toggle checkbox (keeps same behavior) -->

                        <div class="card-3d-wrap mx-auto">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="signup-section text-center">
                                        <h4 class="mb-4 pb-3">Profile</h4>

                                        <div id="signupMessage" class="form-message"></div>

                                        <form id="signupForm" class="signup-form" autocomplete="on" action="{{ route('update-profile')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <i class="input-icon uil uil-user"></i>
                                                <input type="text" name="name" class="form-style"
                                                    placeholder="Your name" value="{{ old('name',$user->name) }}" required>
                                            </div>

                                            <div class="form-group">
                                                <i class="input-icon uil uil-user"></i>
                                                <input type="text" name="family" class="form-style"
                                                    placeholder="Your Family" value="{{ old('family',$user->family) }}" required>
                                            </div>

                                            <div class="form-group">
                                                <i class="input-icon uil uil-phone"></i>
                                                <input type="tel" name="phone" class="form-style"
                                                    placeholder="Your Phone Number" value="{{ old('phone',$user->phone) }}" required>
                                            </div>

                                            <div class="form-group">
                                                <i class="input-icon uil uil-at"></i>
                                                <input type="email" name="email" class="form-style"
                                                    placeholder="Email" value="{{ old('email',$user->email) }}" required>
                                            </div>

                                            <div class="form-group">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                                <input type="password" name="password" class="form-style"
                                                    placeholder="Password">
                                            </div>

                                            <div class="form-group">
                                                <i class="input-icon uil uil-image"></i>
                                                <input type="file" name="photo" class="form-style"
                                                    accept="image/*">
                                            </div>
                                            <p>Old Photo</p>
                                            <img src="{{ $user->photo ? asset('userProfile/'.$user->photo) : asset('userProfile/profile.png')}}" alt="Old Photo" style="max-width: 150px; max-height: 150px; border: 1px solid #ccc; border-radius: 8px; object-fit: cover;">

                                            <div class="form-group mt-4">
                                                <button type="submit" class="btn w-100">
                                                    Update
                                                </button>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /card-3d-wrap -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>