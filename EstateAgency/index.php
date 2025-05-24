<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>CoLaB</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
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

  <!-- =======================================================
  * Template Name: EstateAgency
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Updated: Aug 09 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    section,
    .container,
    .your-other-blocks {
      background-color: transparent !important;
    }
    .page-title,
    .page-title .container,
    .breadcrumbs {
      background: transparent !important;
      z-index: 1;
    }
    .member .pic img {
      width: 100%;
      height: 400px; /* 可依需求調整 */
      object-fit: cover; /* 保持圖片比例並填滿容器 */
    }
  </style>

</head>

<body class="index-page"style="
  background-image: url('/SA/EstateAgency/assets/img/bg2.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  min-height: 100vh;
  margin: 0;
">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <h1 class="sitename">Co<span>LaB</span></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">主頁</a></li>
          <li><a href="about.php">操作指南</a></li>
          <li><a href="propertiesdemo.php">專案總覽</a></li>
          <li><a href="contact.php">聯絡我們</a></li>
          <?php
          if ($_SESSION['u_email']) {
            echo "<li><a href='Logout.php'>登出</a></li>";
            echo "<li><a href='account.php'>帳號中心</a></li>";
          } else {
            echo "<li><a href='LogIn.html'>登入</a></li>";
            echo "<li><a href='#' data-bs-toggle='modal' data-bs-target='#SignInPermission'>註冊</a></li>";
          }
          ?>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="assets/img/party.jpg" alt="">
          <div class="carousel-container">
            <div>
              <!-- <p>Organization</p> -->
              <h2><span>組織團體 </span>Organization</h2>
            </div>
          </div>
        </div><!-- End Carousel Item -->

        <!-- Modal -->
        <div class="modal fade" id="SignInPermission" tabindex="-1" aria-labelledby="SignInPermissionLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 style="color: #1b1b1b;" class="modal-title fs-5" id="SignInPermissionLabel">請問您的身分是？</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <a href="BusinessSignIn.php" class="btn-permission">企業</a>
                <a href="OgnizationSignIn.php" class="btn-permission">組織團體</a>
                <a href="PersonalSignIn.php" class="btn-permission">個人</a>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <img src="assets/img/company.jpg" alt="">
          <div class="carousel-container">
            <div>
              <!-- <p>Doral, Florida</p> -->
              <h2><span>企業 </span> Business</h2>
            </div>
          </div>
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>推薦文章</h2>
        <p>依照評分推薦</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
            <?php
              $servername = "localhost";
              $username   = "root";
              $password   = "";
              $dbname     = "sa";

              $conn = new mysqli($servername, $username, $password, $dbname);
              if ($conn->connect_error) {
                  die("連線失敗: " . $conn->connect_error);
              }

              // 使用者身份判斷
              $current_perm = $_SESSION['u_permission'] ?? '';
              $hasPermission = !empty($current_perm);
              $permission = ($current_perm === '企業') ? '組織團體' : '企業';

              // 提取文章標題與內容
              function getDemandTitleContent($conn, $d_id, $tag, $permission) {
                  if (!$permission) $permission = '組織團體'; // 防呆（未登入者）

                  if ($tag === 'spon') {
                      if ($permission === '組織團體') {
                          $sql = "SELECT event_name AS title, event_description AS content FROM org_donate WHERE d_id = ?";
                      }
                  } elseif ($tag === '贊助') {
                      if ($permission === '企業') {
                          $sql = "SELECT title, content FROM cor_spons WHERE d_id = ?";
                      }
                  } elseif ($tag === '合作') {
                      if ($_SESSION['u_permission'] === '企業') {
                          $sql = "SELECT coop_name AS title, coop_desc AS content FROM corp_coop WHERE d_id = ?";
                          $stmt = $conn->prepare($sql);
                          $stmt->bind_param('i', $d_id);
                          $stmt->execute();
                          $result = $stmt->get_result();
                          $stmt->close();
                          if ($row = $result->fetch_assoc()) {
                              return ['title' => $row['title'], 'content' => $row['content']];
                          } else {
                              return ['title' => '（無法顯示）', 'content' => '此合作文章不是對企業發出的，無法顯示'];
                          }
                      } elseif ($_SESSION['u_permission'] === '組織團體') {
                          // 組織團體或未登入者
                          $sql1 = "SELECT coop_name AS title, coop_desc AS content FROM club_coop WHERE d_id = ?";
                          $stmt = $conn->prepare($sql1);
                          $stmt->bind_param('i', $d_id);
                          $stmt->execute();
                          $result = $stmt->get_result();
                          $stmt->close();
                          if ($row = $result->fetch_assoc()) {
                              return ['title' => $row['title'], 'content' => $row['content']];
                          }
                      } else {
                          $sql2 = "SELECT coop_name AS title, coop_desc AS content FROM club_coop WHERE d_id = ?";
                          $stmt = $conn->prepare($sql2);
                          $stmt->bind_param('i', $d_id);
                          $stmt->execute();
                          $result = $stmt->get_result();
                          $stmt->close();
                          if ($row = $result->fetch_assoc()) {
                              return ['title' => $row['title'], 'content' => $row['content']];
                          }

                          $sql3 = "SELECT coop_name AS title, coop_desc AS content FROM corp_coop WHERE d_id = ?";
                          $stmt = $conn->prepare($sql3);
                          $stmt->bind_param('i', $d_id);
                          $stmt->execute();
                          $result = $stmt->get_result();
                          $stmt->close();
                          if ($row = $result->fetch_assoc()) {
                              return ['title' => $row['title'], 'content' => $row['content']];
                          }

                          return ['title' => '（無法顯示）', 'content' => '這篇合作文章無法對應到資料表'];
                      }
                  } elseif ($tag === '實習') {
                      if ($permission === '企業') {
                          $sql = "SELECT intern_title AS title, intern_detail AS content FROM cor_intern WHERE d_id = ?";
                      } else {
                          return ['title' => '（無法顯示）', 'content' => '非企業帳號的實習文章無法顯示'];
                      }
                  } else {
                      return ['title' => '（無法顯示）', 'content' => '這篇文章的分類不明，無法顯示內容'];
                  }

                  if (!isset($sql)) return ['title' => '（無法顯示）', 'content' => '不符合條件'];

                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param('i', $d_id);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $stmt->close();

                  if ($row = $result->fetch_assoc()) {
                      return ['title' => $row['title'], 'content' => $row['content']];
                  } else {
                      return ['title' => '（無法顯示）', 'content' => '這篇文章無法對應到資料表'];
                  }
              }

              $foundDemands = [];

              if (!$hasPermission) {
              $foundDemands = [];

              // Step 1: 找出有評分的文章，且未完成/終止，依評分高→低排序
              $sql = "
                  SELECT 
              d.d_id, d.d_date, d.tag, d.u_permission,
              COALESCE(m.a_feedback, 0) + COALESCE(m.b_feedback, 0) AS total_feedback
          FROM demanded d
          JOIN match_db m ON d.d_id = m.demanded_id
          WHERE (m.a_feedback IS NOT NULL OR m.b_feedback IS NOT NULL)
          GROUP BY d.d_id
          ORDER BY total_feedback DESC
          LIMIT 6

              ";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $res = $stmt->get_result();

              while ($row = $res->fetch_assoc()) {
                  $d_id = (int)$row['d_id'];
                  $titleContent = getDemandTitleContent($conn, $d_id, $row['tag'], $row['u_permission']);
                  $foundDemands[] = [
                      'd_id'      => $d_id,
                      'd_date'    => $row['d_date'],
                      'd_title'   => $titleContent['title'],
                      'd_content' => $titleContent['content']
                  ];
              }
              $stmt->close();

              // Step 2: 若不足6筆 → 撈尚未媒合過的文章，按發佈時間遞減排序補滿
              if (count($foundDemands) < 6) {
                  $sql = "SELECT d_id, d_date, tag, u_permission FROM demanded ORDER BY d_id DESC";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $res = $stmt->get_result();

                  $checkStmt = $conn->prepare("
                      SELECT COUNT(*) 
                      FROM match_db
                      WHERE demanded_id = ? AND status IN ('completed','terminated','pending','negotiating')
                  ");

                  while (count($foundDemands) < 6 && ($row = $res->fetch_assoc())) {
                      $d_id = (int)$row['d_id'];

                      // 如果這筆文章已經在前面加入過了，就跳過
                      $alreadyAdded = array_filter($foundDemands, fn($d) => $d['d_id'] === $d_id);
                      if ($alreadyAdded) continue;

                      $checkStmt->bind_param('i', $d_id);
                      $checkStmt->execute();
                      $checkStmt->bind_result($cnt);
                      $checkStmt->fetch();
                      $checkStmt->reset();

                      if ($cnt === 0) {
                          $titleContent = getDemandTitleContent($conn, $d_id, $row['tag'], $row['u_permission']);
                          $foundDemands[] = [
                              'd_id'      => $d_id,
                              'd_date'    => $row['d_date'],
                              'd_title'   => $titleContent['title'],
                              'd_content' => $titleContent['content']
                          ];
                      }
                  }

                  $checkStmt->close();
                  $stmt->close();
              }

              // 最終 $foundDemands 陣列裡就是你要顯示的資料
          } else {
                  // Step 1：計算 top users
                  $ratings = [];
                  $sql = "
                      SELECT a_u_email AS email, b_feedback AS feedback
                      FROM match_db
                      WHERE status = 'completed' AND b_feedback <> 0 
                      UNION ALL
                      SELECT b_u_email AS email, a_feedback AS feedback
                      FROM match_db
                      WHERE status = 'completed' AND a_feedback <> 0
                  ";
                  $res = $conn->query($sql);
                  while ($row = $res->fetch_assoc()) {
                      $email = $row['email'];
                      $score = (float)$row['feedback'];
                      if (!isset($ratings[$email])) {
                          $ratings[$email] = ['total'=>0,'count'=>0];
                      }
                      $ratings[$email]['total'] += $score;
                      $ratings[$email]['count']++;
                  }
                  $averages = [];
                  foreach ($ratings as $email => $d) {
                      $averages[$email] = round($d['total'] / $d['count'], 2);
                  }
                  arsort($averages);
                  $topUsers = array_keys($averages);

                  // Step 1 後立即加入這段
                  foreach ($topUsers as $email) {
                      $sql = "
                          SELECT DISTINCT demanded_id
                          FROM match_db
                          WHERE status = 'completed'
                            AND demanded_id IS NOT NULL
                            AND (
                                (a_u_email = ? AND b_feedback IS NOT NULL AND b_feedback <> 0) OR 
                                (b_u_email = ? AND a_feedback IS NOT NULL AND a_feedback <> 0)
                            )
                          ORDER BY d_date DESC
                          LIMIT 6
                      ";
                      $stmt = $conn->prepare($sql);
                      $stmt->bind_param("ss", $email, $email);
                      $stmt->execute();
                      $res = $stmt->get_result();
                      $stmt->close();

                      while ($row = $res->fetch_assoc()) {
                      $d_id = (int)$row['demanded_id'];

                      // 避免重複
                      $exists = false;
                      foreach ($foundDemands as $d) {
                          if ($d['d_id'] === $d_id) {
                              $exists = true;
                              break;
                          }
                      }
                      if ($exists) continue;

                      // 這裡加入身份條件（社團只能看到企業的，企業只能看到社團的）
                      $stmt2 = $conn->prepare("
                          SELECT tag, u_permission, d_date 
                          FROM demanded 
                          WHERE d_id = ? 
                            AND (
                              (tag = '合作' AND (
                                  (? = '企業' AND u_permission = '組織團體') OR 
                                  (? = '組織團體' AND u_permission = '企業')
                              )) 
                              OR 
                              (tag <> '合作' AND u_permission = ?)
                          )
                      ");
                      $stmt2->bind_param("isss", $d_id, $current_perm, $current_perm, $permission);
                      $stmt2->execute();
                      $result2 = $stmt2->get_result();
                      $stmt2->close();

                      if ($result2 && $row2 = $result2->fetch_assoc()) {
                          $tag = $row2['tag'];
                          $u_permission = $row2['u_permission'];
                          $d_date = $row2['d_date'];

                          $titleContent = getDemandTitleContent($conn, $d_id, $tag, $u_permission);

                          if (
                              str_starts_with($titleContent['title'], '（') &&
                              str_contains($titleContent['title'], '無法顯示')
                          ) continue;

                          $foundDemands[] = [
                              'd_id'      => $d_id,
                              'd_date'    => $d_date,
                              'd_title'   => $titleContent['title'],
                              'd_content' => $titleContent['content']
                          ];
                      }

                      if (count($foundDemands) >= 6) break;
                  }


                      if (count($foundDemands) >= 6) break;
                  }


                  // Step 2：抓 top user 的需求文章
                  foreach ($topUsers as $email) {
                      $lastCheckedId = null;
                      $sql1 = "
                          SELECT d_id, d_date, tag, u_permission
                          FROM demanded
                          WHERE u_email = ?
                            AND (? IS NULL OR d_id < ?)
                            AND (
                                (tag = '合作' AND (
                                    (? = '企業' AND u_permission = '組織團體') OR
                                    (? = '組織團體')
                                ))
                                OR
                                (tag <> '合作' AND u_permission = ?)
                            )
                          ORDER BY d_id DESC
                          LIMIT 1
                      ";

                      while (true) {
                          $stmt1 = $conn->prepare($sql1);
                          $stmt1->bind_param('sissss', $email, $lastCheckedId, $lastCheckedId, $current_perm, $current_perm, $permission);
                          $stmt1->execute();
                          $r1 = $stmt1->get_result();
                          $stmt1->close();

                          if (!$r1 || $r1->num_rows === 0) break;

                          $row1 = $r1->fetch_assoc();
                          $d_id = (int)$row1['d_id'];
                          $lastCheckedId = $d_id;

                          $stmt2 = $conn->prepare("SELECT COUNT(*) FROM match_db WHERE demanded_id = ? AND status IN ('completed','terminated')");
                          $stmt2->bind_param('i', $d_id);
                          $stmt2->execute();
                          $stmt2->bind_result($cnt);
                          $stmt2->fetch();
                          $stmt2->close();

                          if ($cnt === 0) {
                              $tag = $row1['tag'];
                              $u_permission = $row1['u_permission'];
                              $titleContent = getDemandTitleContent($conn, $d_id, $tag, $u_permission);

                              if (
                                  str_starts_with($titleContent['title'], '（') &&
                                  str_contains($titleContent['title'], '無法顯示')
                              ) continue;

                              $foundDemands[] = [
                                  'd_id'      => $d_id,
                                  'd_date'    => $row1['d_date'],
                                  'd_title'   => $titleContent['title'],
                                  'd_content' => $titleContent['content']
                              ];
                              break;
                          }
                      }

                      if (count($foundDemands) >= 6) break;
                  }

                  // Step 3：補足未滿 6 筆
                  $sql3 = "
                      SELECT d_id, d_date, tag, u_permission
                      FROM demanded
                      WHERE (
                          (tag = '合作' AND (
                              (? = '企業' AND u_permission = '組織團體') OR
                              (? = '組織團體')
                          ))
                          OR
                          (tag <> '合作' AND u_permission = ?)
                      )
                      ORDER BY d_id DESC
                  ";
                  $stmt3 = $conn->prepare($sql3);
                  $stmt3->bind_param('sss', $current_perm, $current_perm, $permission);
                  $stmt3->execute();
                  $r = $stmt3->get_result();

                  $checkStmt = $conn->prepare("
                      SELECT COUNT(*) 
                      FROM match_db
                      WHERE demanded_id = ?
                        AND status IN ('completed','terminated')
                  ");

                  while (count($foundDemands) < 6 && ($row = $r->fetch_assoc())) {
                      $d_id = (int)$row['d_id'];

                      // 避免重複
                      $exists = false;
                      foreach ($foundDemands as $d) {
                          if ($d['d_id'] === $d_id) {
                              $exists = true;
                              break;
                          }
                      }
                      if ($exists) continue;

                      // 狀態檢查
                      $checkStmt->bind_param('i', $d_id);
                      $checkStmt->execute();
                      $checkStmt->bind_result($termCount);
                      $checkStmt->fetch();
                      $checkStmt->reset();

                      if ($termCount === 0) {
                          $tag = $row['tag'];
                          $u_permission = $row['u_permission'];
                          $titleContent = getDemandTitleContent($conn, $d_id, $tag, $u_permission);


                          if (
                              str_starts_with($titleContent['title'], '（') &&
                              str_contains($titleContent['title'], '無法顯示')
                          ) continue;

                          $foundDemands[] = [
                              'd_id'      => $d_id,
                              'd_date'    => $row['d_date'],
                              'd_title'   => $titleContent['title'],
                              'd_content' => $titleContent['content']
                          ];
                      }
                  }
                  $checkStmt->close();
                  $stmt3->close();
              }

              // Step 4：輸出結果
              if (!empty($foundDemands)) {
                  if (!$hasPermission) {
                      echo '<h3 data-aos="fade-up" data-aos-delay="150">以下為推薦的文章</h3>';
                  } else {
                      echo '<h3 data-aos="fade-up" data-aos-delay="150">選定文章列表</h3>';
                  }

                  foreach ($foundDemands as $d) {
                      echo '
                      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                          <div class="service-item position-relative">
                              <div class="icon">
                                  <i class="bi bi-activity"></i>
                              </div>
                              <a href="property-single.php?id='.$d['d_id'].'" class="stretched-link">
                                  <h3>'.htmlspecialchars($d['d_title']).'</h3>
                              </a>
                              <p>'.nl2br(htmlspecialchars($d['d_content'])).'</p>
                          </div>
                      </div>';
                  }
              } else {
                  echo "<p>目前沒有任何文章可供媒合。</p>";
              }

              $conn->close();
            ?>

        </div>


      </div>

    </section><!-- /Services Section -->

    <!-- Agents Section -->
    <section id="agents" class="agents section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>我們的團隊</h2>
        <p>CoLaB成員</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="assets/img/kamt1n.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>許建廷</h4>
                <span>美編及程式設計</span>
                <div class="social">
                  <a href="https://www.instagram.com/kamt1n/" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img src="assets/img/lgc.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>林國丞</h4>
                <span>領導及程式設計</span>
                <div class="social">
                  <a href="https://www.instagram.com/lgc_731/" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="pic"><img src="assets/img/waffle.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>張文謙</h4>
                <span>程式設計主力<br></span>
                <div class="social">
                  <a href="#" target="_blank"><i class="bi bi-discord"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="pic"><img src="assets/img/cheng.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>陳冠丞</h4>
                <span>文件處理及測試員</span>
                <div class="social">
                  <a href="https://www.instagram.com/_cheng._905/" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Agents Section -->

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>地址</h4>
            <p>輔仁大學</p>
            <p>新北市 新莊區</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>聯絡</h4>
            <p>
              <strong>電話：</strong> <span>0979822638</span><br>
              <strong>Email：</strong> <span>dennis.940822@gmail.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>客服時間</h4>
            <p>
              <strong>星期一～星期六：</strong> <span>11AM - 23PM</span><br>
              <strong>星期天：</strong> <span>公休</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="https://www.instagram.com/kamt1n/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://discord.gg/qCmPcxba" target="_blank" class="linkedin"><i class="bi bi-discord"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">EstateAgency</strong> <span>All Rights Reserved</span>
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

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>