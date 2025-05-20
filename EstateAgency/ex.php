<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>平台使用者指南</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }
    .nav-link { color: #495057 !important; }
    .section-title { border-left: 4px solid #0d6efd; padding-left: 10px; margin-bottom: 15px; }
    .card { margin-bottom: 20px; }
    footer { text-align: center; padding: 20px 0; color: #6c757d; }
    /* 圖片說明排版 */
    .image-gallery { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 15px; }
    .image-gallery figure { flex: 1 1 calc(33.333% - 12px); background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 6px rgba(0,0,0,0.1); margin: 0; }
    .image-gallery img { width: 100%; height: auto; display: block; }
    .image-gallery figcaption { padding: 8px; font-size: 0.9rem; color: #555; text-align: center; }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">CoLaB 平台指南</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#register">1. 註冊與登入</a></li>
          <li class="nav-item"><a class="nav-link" href="#post">2. 發布需求</a></li>
          <li class="nav-item"><a class="nav-link" href="#browse">3. 瀏覽與篩選</a></li>
          <li class="nav-item"><a class="nav-link" href="#match">4. 配對媒合</a></li>
          <li class="nav-item"><a class="nav-link" href="#progress">5. 合作進度</a></li>
          <li class="nav-item"><a class="nav-link" href="#chat">6. 即時聊天</a></li>
          <li class="nav-item"><a class="nav-link" href="#feedback">7. 回饋評價</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container py-5">
    <!-- 1. 註冊與登入 -->
    <section id="register">
      <h2 class="section-title">1. 註冊與登入</h2>
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-8">
              <h5 class="card-title">選擇身分</h5>
              <p>進入註冊頁面後，請先選擇「企業」或「組織團體」，系統會顯示對應欄位供填寫。</p>
              <h5 class="card-title">填寫資訊</h5>
              <ul>
                <li>企業：公司名稱、產業類別、聯絡地址、負責人資訊。</li>
                <li>組織團體：組織名稱、組織性質、負責人資訊。</li>
              </ul>
              <h5 class="card-title">登入</h5>
              <p>註冊完成後，可透過帳號密碼直接登入平台。</p>
            </div>
            <div class="col-md-4">
              <div class="image-gallery">
                <figure>
                  <img src="https://via.placeholder.com/150" alt="選擇身分示意圖">
                  <figcaption>選擇身分</figcaption>
                </figure>
                <figure>
                  <img src="https://via.placeholder.com/150" alt="填寫資訊示意圖">
                  <figcaption>填寫資訊</figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 2. 發布需求 -->
    <section id="post">
      <h2 class="section-title">2. 發布需求</h2>
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-8">
              <h5 class="card-title">建立新需求</h5>
              <p>點擊「發布需求」，選擇需求標籤（如 贊助、實習），系統自動顯示相關欄位填寫。</p>
              <h5 class="card-title">編輯/刪除</h5>
              <p>可在「帳號中心 > 發布文章記錄」中修改或刪除已發布的專案。</p>
            </div>
            <div class="col-md-4">
              <div class="image-gallery">
                <figure>
                  <img src="https://via.placeholder.com/150" alt="發布需求示意圖">
                  <figcaption>發布需求</figcaption>
                </figure>
                <figure>
                  <img src="https://via.placeholder.com/150" alt="編輯刪除示意圖">
                  <figcaption>編輯/刪除</figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 3. 瀏覽與篩選 -->
    <section id="browse">
      <h2 class="section-title">3. 瀏覽與篩選</h2>
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-8">
              <h5 class="card-title">文章列表</h5>
              <p>主畫面列出所有需求專案，顯示標題與簡要描述。</p>
              <h5 class="card-title">關鍵字搜尋</h5>
              <p>輸入關鍵字過濾標題或內容，快速找到目標專案。</p>
              <h5 class="card-title">標籤篩選</h5>
              <p>點擊上方標籤即可篩選該類專案，並可再細分條件篩選。</p>
            </div>
            <div class="col-md-4">
              <div class="image-gallery">
                <figure>
                  <img src="https://via.placeholder.com/150" alt="文章列表示意圖">
                  <figcaption>文章列表</figcaption>
                </figure>
                <figure>
                  <img src="https://via.placeholder.com/150" alt="搜尋篩選示意圖">
                  <figcaption>搜尋篩選</figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 4. 配對媒合 -->
    <section id="match">
      <h2 class="section-title">4. 配對媒合</h2>
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-8">
              <h5 class="card-title">申請合作流程</h5>
              <p>點選專案詳情後，點擊「申請合作」列入清單並通知對方，對方同意後即完成初步配對。</p>
            </div>
            <div class="col-md-4">
              <div class="image-gallery">
                <figure>
                  <img src="https://via.placeholder.com/150" alt="申請合作示意圖">
                  <figcaption>申請合作</figcaption>
                </figure>
                <figure>
                  <img src="https://via.placeholder.com/150" alt="同意配對示意圖">
                  <figcaption>同意配對</figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 5. 合作進度管理 -->
    <section id="progress">
      <h2 class="section-title">5. 合作進度管理</h2>
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-8">
              <ul>
                <li><strong>同意申請</strong>：一方已申請，待另一方確認。</li>
                <li><strong>洽談中</strong>：雙方同意後，可利用聊天室溝通細節。</li>
                <li><strong>已完成合作</strong>：雙方同意完成後，進行回饋評價。</li>
              </ul>
            </div>
            <div class="col-md-4">
              <div class="image-gallery">
                <figure>
                  <img src="https://via.placeholder.com/150" alt="進度管理示意圖">
                  <figcaption>進度管理</figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 6. 聊天室與即時溝通 -->
    <section id="chat">
      <h2 class="section-title">6. 聊天室與即時溝通</h2>
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-8">
              <p>點擊「聊天室」即時交流，支援歷史訊息、氣泡樣式及時間戳記。</p>
            </div>
            <div class="col-md-4">
              <div class="image-gallery">
                <figure>
                  <img src="https://via.placeholder.com/150" alt="聊天室示意圖">
                  <figcaption>聊天室</figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 7. 回饋評價 -->
    <section id="feedback">
      <h2 class="section-title">7. 回饋評價</h2>
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-8">
              <p>在「合作專案」點擊「回饋評價」，進行星級及文字評價，並可查看評價紀錄。</p>
            </div>
            <div class="col-md-4">
              <div class="image-gallery">
                <figure>
                  <img src="https://via.placeholder.com/150" alt="評價示意圖">
                  <figcaption>回饋評價</figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <footer>
    © 2025 CoLaB 平台保留所有權利
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
