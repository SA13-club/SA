<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>發布需求 - 校園合作平台</title>
    <style>
        :root {
            --default-color: #333;
            --background-color: #f0f2f5;
            --surface-color: #ffffff;
            --accent-color: #3b82f6;
            --accent-hover-color: #2563eb;
            --text-muted: #6b7280;
            --border-color: #e5e7eb;

            --default-font: 'Inter', 'Noto Sans TC', sans-serif;
            --heading-font: 'Inter', 'Noto Sans TC', sans-serif;
        }



        body {
            font-family: var(--default-font);
            background-color: var(--background-color);
            color: var(--default-color);
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        .form-card {
            background-color: var(--surface-color);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            padding-top: 100px;
        }

        .form-title {
            text-align: center;
            color: var(--default-color);

            margin-bottom: 2rem;
            font-size: 1.75rem;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--default-color);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: var(--accent-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: var(--accent-hover-color);
        }

        .tag-group {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tag {
            background-color: var(--background-color);
            color: var(--text-muted);
            padding: 0.375rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .tag:hover,
        .tag.selected {
            background-color: var(--accent-color);
            color: white;
        }

        .radio-group {
            display: flex;
            gap: 0.5rem;
        }

        .radio-button {
            flex: 1;
            padding: 0.75rem;
            text-align: center;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .radio-button:hover {
            background-color: var(--background-color);
        }

        .radio-button.selected {
            background-color: var(--accent-color);
            color: white;
            border-color: var(--accent-color);
        }

        .required {
            color: #ef4444;
            margin-left: 0.25rem;
        }
    </style>
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">社團企業<span>媒合平台</span></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.html" class="active">主頁</a></li>
                    <li><a href="about.html">關於</a></li>
                    <li><a href="services.html">服務</a></li>
                    <li><a href="properties.html">Properties</a></li>
                    <li><a href="agents.html">Agents</a></li>
                    <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Dropdown 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                    <li><a href="#">Deep Dropdown 4</a></li>
                                    <li><a href="#">Deep Dropdown 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dropdown 2</a></li>
                            <li><a href="#">Dropdown 3</a></li>
                            <li><a href="#">Dropdown 4</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="form-card">
            <h2 class="form-title">發布需求</h2>

            <form id="requirementForm">
                <div class="form-group">
                    <label class="form-label">需求類型 <span class="required">*</span></label>
                    <div class="radio-group">
                        <label><input type="radio" name="demand_type" value="sponser" required> 贊助</label>
                        <label><input type="radio" name="demand_type" value="co"> 合作</label>
                        <label><input type="radio" name="demand_type" value="recruit"> 招募</label>
                        <label><input type="radio" name="demand_type" value="inter"> 實習</label>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class="form-label">需求標題 <span class="required">*</span></label>
                    <input type="text" class="form-control" name="require"   placeholder="請輸入需求簡要說明" required>
                </div>

                <div class="form-group">
                    <label class="form-label">需求詳細描述 <span class="required">*</span></label>
                    <textarea class="form-control" rows="5" name="description" placeholder="詳細說明您的需求、期望和背景" required></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">選擇標籤</label>
                    <div class="tag-group">
                        <div class="tech">技術開發</div>
                        <div class="event">活動策劃</div>
                        <div class="promo">社群行銷</div>
                        <div class="copo">產學合作</div>
                        <div class="resou">資源募集</div>
                        <div class="file">專案管理</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">預期目標</label>
                    <textarea class="form-control" rows="3" name="target" placeholder="請描述您希望通過此需求達成的具體目標"></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">聯繫方式 <span class="required">*</span></label>
                    <div class="radio-group" style="margin-bottom: 1rem;">
                        <input type="text" class="form-control" name="name" placeholder="姓名" required>
                        <input type="email" class="form-control" name="email" placeholder="電子郵件" required>
                    </div>
                    <input type="tel" class="form-control" name="phone" placeholder="聯絡電話">
                </div>

                <div class="form-group">
                    <label class="form-label" name="date">需求截止日期</label>
                    <input type="date" class="form-control">
                </div>

                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn btn-primary">發布需求</button>
                </div>
            </form>
        </div>
    </div>
    <footer id="footer" class="footer light-background">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div class="address">
                        <h4>Address</h4>
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p></p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Contact</h4>
                        <p>
                            <strong>Phone:</strong> <span>+1 5589 55488 55</span><br>
                            <strong>Email:</strong> <span>info@example.com</span><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br>
                            <strong>Sunday</strong>: <span>Closed</span>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">EstateAgency</strong> <span>All Rights
                    Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>
    <script>
        document.querySelectorAll('.radio-button').forEach(button => {
            button.addEventListener('click', function () {
                document.querySelectorAll('.radio-button').forEach(btn =>
                    btn.classList.remove('selected')
                );
                this.classList.add('selected');
            });
        });

        document.querySelectorAll('.tag').forEach(tag => {
            tag.addEventListener('click', function () {
                this.classList.toggle('selected');
            });
        });

        document.getElementById('requirementForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = {
                type: document.querySelector('.radio-button.selected')?.getAttribute('data-type'),
                title: document.querySelector('input[placeholder="請輸入需求簡要說明"]').value,
                description: document.querySelector('textarea[placeholder="詳細說明您的需求、期望和背景"]').value,
                tags: Array.from(document.querySelectorAll('.tag.selected')).map(tag => tag.textContent),
                expectedGoals: document.querySelector('textarea[placeholder="請描述您希望通過此需求達成的具體目標"]').value,
                contact: {
                    name: document.querySelector('input[placeholder="姓名"]').value,
                    email: document.querySelector('input[placeholder="電子郵件"]').value,
                    phone: document.querySelector('input[placeholder="聯絡電話"]').value
                },
                deadline: document.querySelector('input[type="date"]').value
            };

            console.log(formData);
            alert('需求已提交！');
        });
    </script>

</body>

</html>