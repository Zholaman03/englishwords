<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EnglishApp - Пайдаланушы профилі</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      background:
        radial-gradient(circle at top left, rgba(99, 102, 241, .16), transparent 28%),
        radial-gradient(circle at top right, rgba(16, 185, 129, .14), transparent 24%),
        linear-gradient(180deg, #f8fafc 0%, #eef2f7 100%);
      color: #0f172a;
      min-height: 100vh;
      padding: 34px 18px;
    }

    .container {
      max-width: 1140px;
      margin: 0 auto;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      margin-bottom: 24px;
      flex-wrap: wrap;
    }

    .title h1 {
      margin: 0;
      font-size: 30px;
      font-weight: 800;
      letter-spacing: -0.03em;
    }

    .title p {
      margin: 6px 0 0;
      color: #64748b;
      font-size: 14px;
    }

    .top-actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .btn {
      border: none;
      border-radius: 16px;
      padding: 12px 18px;
      font-weight: 700;
      font-size: 14px;
      cursor: pointer;
      transition: transform .18s ease, box-shadow .18s ease, opacity .18s ease;
    }

    .btn:hover {
      transform: translateY(-2px);
    }

    .btn-primary {
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      color: white;
      box-shadow: 0 14px 28px rgba(99, 102, 241, .22);
    }

    .btn-light {
      background: rgba(255, 255, 255, .8);
      color: #0f172a;
      border: 1px solid #dbe4ee;
      box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
    }

    .grid {
      display: grid;
      grid-template-columns: 360px 1fr;
      gap: 22px;
    }

    .card {
      background: rgba(255, 255, 255, .82);
      backdrop-filter: blur(14px);
      border: 1px solid rgba(255, 255, 255, .7);
      border-radius: 28px;
      box-shadow: 0 20px 60px rgba(15, 23, 42, .08);
    }

    .profile-card {
      padding: 26px;
      position: relative;
      overflow: hidden;
    }

    .profile-card::after {
      content: "";
      position: absolute;
      width: 190px;
      height: 190px;
      right: -60px;
      top: -60px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(99, 102, 241, .16), transparent 68%);
      pointer-events: none;
    }

    .avatar-wrap {
      display: flex;
      justify-content: center;
      margin-bottom: 18px;
    }

    .avatar {
      width: 104px;
      height: 104px;
      border-radius: 28px;
      background: linear-gradient(135deg, #6366f1, #10b981);
      color: white;
      font-size: 34px;
      font-weight: 800;
      display: grid;
      place-items: center;
      box-shadow: 0 18px 34px rgba(99, 102, 241, .24);
    }

    .name {
      text-align: center;
      margin: 0;
      font-size: 26px;
      font-weight: 800;
      letter-spacing: -0.03em;
    }

    .email {
      text-align: center;
      color: #64748b;
      margin: 8px 0 0;
      font-size: 14px;
    }

    .level-pill {
      width: fit-content;
      margin: 16px auto 0;
      padding: 8px 14px;
      border-radius: 999px;
      background: #eef2ff;
      color: #4338ca;
      font-size: 13px;
      font-weight: 800;
    }

    .divider {
      height: 1px;
      background: #e2e8f0;
      margin: 22px 0;
    }

    .mini-list {
      display: grid;
      gap: 12px;
    }

    .mini-item {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 18px;
      padding: 14px 16px;
    }

    .mini-item .label {
      color: #64748b;
      font-size: 13px;
      margin-bottom: 8px;
    }

    .mini-item .value {
      font-size: 18px;
      font-weight: 800;
      color: #0f172a;
    }

    .content {
      display: grid;
      gap: 22px;
    }

    .section {
      padding: 24px;
    }

    .section-head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
      margin-bottom: 18px;
      flex-wrap: wrap;
    }

    .section-head h2 {
      margin: 0;
      font-size: 22px;
      font-weight: 800;
      letter-spacing: -0.02em;
    }

    .section-head p {
      margin: 6px 0 0;
      color: #64748b;
      font-size: 14px;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 14px;
    }

    .stat {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 22px;
      padding: 18px;
    }

    .stat .label {
      color: #64748b;
      font-size: 13px;
      margin-bottom: 10px;
    }

    .stat .value {
      font-size: 30px;
      font-weight: 800;
      letter-spacing: -0.04em;
    }

    .stat .sub {
      margin-top: 8px;
      color: #94a3b8;
      font-size: 12px;
    }

    .progress-card {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 22px;
      padding: 18px;
    }

    .progress-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 10px;
      margin-bottom: 12px;
      flex-wrap: wrap;
    }

    .progress-title {
      font-weight: 800;
      font-size: 16px;
    }

    .muted {
      color: #64748b;
      font-size: 14px;
    }

    .track {
      width: 100%;
      height: 14px;
      background: #e2e8f0;
      border-radius: 999px;
      overflow: hidden;
    }

    .fill {
      height: 100%;
      width: 72%;
      border-radius: 999px;
      background: linear-gradient(90deg, #6366f1, #10b981);
    }

    .two-col {
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 18px;
    }

    .activity-list {
      display: grid;
      gap: 12px;
    }

    .activity {
      display: flex;
      gap: 14px;
      align-items: flex-start;
      padding: 14px 16px;
      border-radius: 18px;
      background: #f8fafc;
      border: 1px solid #e2e8f0;
    }

    .icon {
      width: 42px;
      height: 42px;
      border-radius: 14px;
      display: grid;
      place-items: center;
      background: #eef2ff;
      color: #4338ca;
      font-weight: 800;
      flex-shrink: 0;
    }

    .activity strong {
      display: block;
      margin-bottom: 4px;
      font-size: 15px;
    }

    .activity span {
      color: #64748b;
      font-size: 13px;
    }

    .achievement-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }

    .achievement {
      border-radius: 20px;
      padding: 16px;
      background: linear-gradient(135deg, rgba(99, 102, 241, .08), rgba(16, 185, 129, .08));
      border: 1px solid rgba(99, 102, 241, .12);
    }

    .achievement .emoji {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .achievement strong {
      display: block;
      margin-bottom: 6px;
      font-size: 15px;
    }

    .achievement span {
      color: #64748b;
      font-size: 13px;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }

    .field {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .field.full {
      grid-column: 1 / -1;
    }

    label {
      font-size: 13px;
      font-weight: 700;
      color: #475569;
    }

    input,
    select {
      width: 100%;
      border: 1px solid #dbe4ee;
      border-radius: 16px;
      padding: 13px 15px;
      font-size: 14px;
      background: white;
      outline: none;
      transition: border-color .18s ease, box-shadow .18s ease;
    }

    input:focus,
    select:focus {
      border-color: #818cf8;
      box-shadow: 0 0 0 4px rgba(99, 102, 241, .12);
    }

    .save-row {
      display: flex;
      justify-content: flex-end;
      margin-top: 18px;
    }

    @media (max-width: 1040px) {
      .stats-grid {
        grid-template-columns: 1fr 1fr;
      }

      .grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 760px) {

      .two-col,
      .form-grid,
      .achievement-grid {
        grid-template-columns: 1fr;
      }

      .stats-grid {
        grid-template-columns: 1fr;
      }

      .section {
        padding: 18px;
      }

      .profile-card {
        padding: 20px;
      }

      .title h1 {
        font-size: 24px;
      }
    }
    a{
      text-decoration: none;
      color: inherit;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="topbar">
      <div class="title">
        <h1>Пайдаланушы кабинеті</h1>
        <p>Пайдаланушының прогресі, статистикасы және есептік жазба параметрлері</p>
      </div>
      <div class="top-actions">
        <a href="{{ route('home.index') }}" class="btn btn-light">Басты бет</a>
        <a href="{{ route('auth.logout') }}" class="btn btn-primary">Шығу</a>  
      </div>
    </div>

    <div class="grid">
      <aside class="card profile-card">
        <div class="avatar-wrap">
          <div class="avatar">{{ $user->name[0] }}</div>
        </div>

        <h2 class="name">{{ $user->name }}</h2>
        <p class="email">{{ $user->email }}</p>
        <div class="level-pill">Жоғары орта (B2)</div>

        <div class="divider"></div>

        <div class="mini-list">
          
          <div class="mini-item">
            <div class="label">Үйренген</div>
            <div class="value">{{ $knownWords }} сөз</div>
          </div>
          <div class="mini-item">
            <div class="label">Сүйікті категория</div>
            <div class="value">Бизнес ағылшын</div>
          </div>
        </div>
      </aside>

      <main class="content">
        <section class="card section">
          <div class="section-head">
            <div>
              <h2>Статистика</h2>
              <p>Жалпы оқу статистикасы және қолданушының белсенділігі</p>
            </div>
          </div>

          <div class="stats-grid">
            <div class="stat">
              <div class="label">Барлығы</div>
              <div class="value">{{ $knownWords }}</div>
              <div class="sub">Оқыған сөздер саны</div>
            </div>
            <div class="stat">
              <div class="label">Пайыз</div>
              <div class="value">{{ $totalWords > 0 ? round($knownWords / $totalWords * 100) : 0 }}%</div>
              <div class="sub"></div>
            </div>
            <div class="stat">
              <div class="label">Аяқталған деңгейлер</div>
              <div class="value">{{ count($completedLevels) }}</div>
              <div class="sub">{{ count($completedLevels) }} деңгей аяқталды</div>
            </div>
            <div class="stat">
              <div class="label">Таңдаулы сөздер</div>
              <div class="value">{{ $savedWords->count() }}</div>
              <div class="sub">Кейін қарап шығу</div>
            </div>
          </div>
        </section>

        <section class="card section">
          <div class="section-head">
            <div>
              <h2>Жалпы прогресс</h2>
              <p>Пайдаланушының ағымдағы мақсаты</p>
            </div>
          </div>
          @foreach ($levels as $level)
            <div class="progress-card">
              <div class="progress-row">
                <span class="progress-title">{{ $level->name }}</span>
                <span class="muted">{{ $resultById[$level->id]->percent ?? 0 }}%</span>
              </div>
              <div class="track">
                <div class="fill" style="width: {{ $resultById[$level->id]->percent ?? 0 }}%;"></div>
              </div>
              <div class="progress-row" style="margin-top: 12px; margin-bottom: 0;">
                <span class="muted">{{ $resultById[$level->id]->known_words_count ?? 0 }} of
                  {{ $level->dictionary_count }} апталық сөз аяқталды</span>
                <span class="muted">7 сөз қалды</span>
              </div>
            </div>

          @endforeach

        </section>

        <section class="card section">
          <div class="section-head">
            <div>
              <h2>Есептік жазбаны баптау</h2>
              <p>Пайдаланушы деректерін өңдеу блогы</p>
            </div>
          </div>
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @else
            @error('email')
              <div class="alert alert-danger">
                {{ $message }}
            @enderror
          @endif
          <form action="{{ route('user.edit') }}" method="POST">

            @csrf
            @method('PUT')
            <div class="form-grid">
              <div class="field">
                <label>Толық аты</label>
                <input type="text" name="name" value="{{ $user->name }}" />
              </div>
              <div class="field">
                <label>Электрондық пошта</label>
                <input type="email" name="email" value="{{ $user->email }}" />
              </div>
              <div class="field full">
                <label>Құпия сөз</label>
                <input type="password" name="password" value="" />
              </div>
            </div>

            <div class="save-row">
              <button type="submit" class="btn btn-primary">Өзгерістерді сақтау</button>
            </div>
          </form>
        </section>
      </main>
    </div>
  </div>
</body>

</html>