<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HugeProfit — Головна</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="@vite(['resources/css/main.css'])">
</head>
<body>

{{--<!-- ─── SIDEBAR ─── -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-img">
            <div class="logo-hp">Huge<span>Profit</span></div>
        </div>
        <div class="logo-tagline">Produce by Ukraine</div>
        <div class="sidebar-meta">ID: 35516<br>Адміністратор</div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                <polyline points="9 22 9 12 15 12 15 22"/>
            </svg>
            Початок
        </div>
        <div class="nav-item active">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="7"/>
                <rect x="14" y="3" width="7" height="7"/>
                <rect x="14" y="14" width="7" height="7"/>
                <rect x="3" y="14" width="7" height="7"/>
            </svg>
            Головна
        </div>
        <div class="nav-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="9" cy="21" r="1"/>
                <circle cx="20" cy="21" r="1"/>
                <path d="M1 1h4l2.68 13.39a2 2 0 001.98 1.61h9.72a2 2 0 001.98-1.61L23 6H6"/>
            </svg>
            Продажі
            <span class="arrow">›</span>
        </div>
        <div class="nav-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>
            </svg>
            Товари
            <span class="arrow">›</span>
        </div>
        <div class="nav-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                <path d="M16 3.13a4 4 0 010 7.75"/>
            </svg>
            Клієнти
        </div>
        <div class="nav-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
                <line x1="16" y1="13" x2="8" y2="13"/>
                <line x1="16" y1="17" x2="8" y2="17"/>
                <polyline points="10 9 9 9 8 9"/>
            </svg>
            Звіти
            <span class="arrow">›</span>
        </div>
        <div class="nav-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="1" x2="12" y2="23"/>
                <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
            </svg>
            Фінанси
        </div>
        <div class="nav-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="12 8 12 12 14 14"/>
                <path d="M3.05 11a9 9 0 1 0 .5-4.5"/>
                <polyline points="3 3 3 7 7 7"/>
            </svg>
            Історія
        </div>
        <div class="nav-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            Календар
        </div>
        <div class="nav-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>
            </svg>
            Панель касира
        </div>
    </nav>

    <div class="sidebar-footer">
        <div class="plan-badge">
            <div>
                <div class="plan-label">Тариф: Безкоштовно</div>
                <div class="plan-sub">Ще 50 продажів</div>
            </div>
            <div class="plan-icon">⟵</div>
        </div>
    </div>
</aside>--}}

<!-- ─── MAIN ─── -->
<div class="main">

    <!-- TOPBAR -->
    {{--<header class="topbar">
        <div class="topbar-actions">
            <button class="btn btn-teal">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="12" y1="5" x2="12" y2="19"/>
                    <line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                Додати продаж
            </button>
            <button class="btn btn-red">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="12" y1="5" x2="12" y2="19"/>
                    <line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                Додати витрату
            </button>
        </div>
        <div class="topbar-right">
            <div class="notif-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                    <path d="M13.73 21a2 2 0 01-3.46 0"/>
                </svg>
                <div class="notif-dot"></div>
            </div>
            <div class="avatar">S</div>
        </div>
    </header>--}}

    <!-- CONTENT -->
    <div class="content">

        <!-- ONBOARDING STEPS -->
        <div class="steps-card">
            <div class="steps-row">
                <div class="step done">
                    <div class="step-circle">✓</div>
                    <div class="step-label">Подивитись відео</div>
                    <div class="step-bonus">Бонус: 3.20 USD</div>
                </div>
                <div class="step active">
                    <div class="step-circle">2</div>
                    <div class="step-label">Змінити назву магазину</div>
                    <div class="step-bonus">6.40 USD</div>
                </div>
                <div class="step">
                    <div class="step-circle">3</div>
                    <div class="step-label">Додати товар</div>
                    <div class="step-bonus">9.60 USD</div>
                </div>
                <div class="step">
                    <div class="step-circle">4</div>
                    <div class="step-label">Додати продаж</div>
                    <div class="step-bonus">12.80 USD</div>
                </div>
                <div class="step">
                    <div class="step-circle">5</div>
                    <div class="step-label">Додати витрату</div>
                    <div class="step-bonus">16.00 USD</div>
                </div>
                <div class="step">
                    <div class="step-circle">6</div>
                    <button class="step-final">Отримати бонус</button>
                </div>
            </div>
        </div>

        <!-- PERIOD STATS GRID -->
        <div class="period-grid">

            <!-- Сьогодні -->
            <div class="period-card">
                <div class="period-title">Сьогодні</div>
                <div class="period-links">
                    <span class="period-link">Продалось 0.00 од.</span>
                    <span class="period-link">Витрат на 0.00 USD</span>
                </div>
                <div class="period-metrics">
                    <div class="metric-box">
                        <div class="metric-label">Продано</div>
                        <div class="metric-value">0</div>
                        <div class="metric-currency">USD</div>
                    </div>
                    <div class="metric-box">
                        <div class="metric-label">Прибуток</div>
                        <div class="metric-value">0</div>
                        <div class="metric-currency">USD</div>
                    </div>
                </div>
            </div>

            <!-- Вчора -->
            <div class="period-card">
                <div class="period-title">Вчора</div>
                <div class="period-links">
                    <span class="period-link">Продалось 0.00 од.</span>
                    <span class="period-link">Витрат на 0.00 USD</span>
                </div>
                <div class="period-metrics">
                    <div class="metric-box">
                        <div class="metric-label">Продано</div>
                        <div class="metric-value">0</div>
                        <div class="metric-currency">USD</div>
                    </div>
                    <div class="metric-box">
                        <div class="metric-label">Прибуток</div>
                        <div class="metric-value">0</div>
                        <div class="metric-currency">USD</div>
                    </div>
                </div>
            </div>

            <!-- Тиждень -->
            <div class="period-card">
                <div class="period-title">Тиждень</div>
                <div class="period-links">
                    <span class="period-link">Продалось 0.00 од.</span>
                    <span class="period-link">Витрат на 0.00 USD</span>
                </div>
                <div class="period-metrics">
                    <div class="metric-box">
                        <div class="metric-label">Продано</div>
                        <div class="metric-value">0</div>
                        <div class="metric-currency">USD</div>
                    </div>
                    <div class="metric-box">
                        <div class="metric-label">Прибуток</div>
                        <div class="metric-value">0</div>
                        <div class="metric-currency">USD</div>
                    </div>
                </div>
            </div>

            <!-- Останні 30 днів -->
            <div class="period-card">
                <div class="period-title">Останні 30 днів</div>
                <div class="period-links">
                    <span class="period-link">Продалось 0.00 од.</span>
                    <span class="period-link">Витрат на 0.00 USD</span>
                </div>
                <div class="period-metrics">
                    <div class="metric-box">
                        <div class="metric-label">Продано</div>
                        <div class="metric-value">0</div>
                        <div class="metric-currency">USD</div>
                    </div>
                    <div class="metric-box">
                        <div class="metric-label">Прибуток</div>
                        <div class="metric-value">0</div>
                        <div class="metric-currency">USD</div>
                    </div>
                </div>
            </div>

        </div><!-- /period-grid -->

        <!-- BOTTOM GRID -->
        <div class="bottom-grid">

            <!-- P&L CARD -->
            <div class="pnl-card">
                <div class="card-header">
                    <div class="card-title">Прибуток і Збитки</div>
                    <select class="select-period">
                        <option>Поточний місяць</option>
                        <option>Минулий місяць</option>
                        <option>Цей рік</option>
                        <option>Довільний період</option>
                    </select>
                </div>

                <div class="pnl-total">0.00 USD <span style="font-size:14px;color:var(--text-muted)">ⓘ</span></div>
                <div class="pnl-subtitle">Операційний прибуток за Поточний місяць</div>

                <div class="pnl-row">
                    <div class="pnl-row-info">
                        <div class="pnl-row-amount">0.00 USD <span class="info-icon">ⓘ</span></div>
                        <div class="pnl-row-name">Виручка з продажів</div>
                    </div>
                    <div class="bar-track"><div class="bar-fill bar-green" style="width:100%"></div></div>
                </div>

                <div class="pnl-row">
                    <div class="pnl-row-info">
                        <div class="pnl-row-amount">0.00 USD</div>
                        <div class="pnl-row-name">Інші надходження</div>
                    </div>
                    <div class="bar-track"><div class="bar-fill bar-green" style="width:100%"></div></div>
                </div>

                <div class="pnl-row">
                    <div class="pnl-row-info">
                        <div class="pnl-row-amount">0.00 USD</div>
                        <div class="pnl-row-name">Витрати</div>
                    </div>
                    <div class="bar-track"><div class="bar-fill bar-red" style="width:60%"></div></div>
                </div>

                <div class="pnl-row">
                    <div class="pnl-row-info">
                        <div class="pnl-row-amount">0.00 USD</div>
                        <div class="pnl-row-name">Вкладені витрати <span class="info-icon">ⓘ</span></div>
                    </div>
                    <div class="bar-track"><div class="bar-fill bar-gray" style="width:100%"></div></div>
                </div>

                <div class="pnl-row">
                    <div class="pnl-row-info">
                        <div class="pnl-row-amount" style="color:var(--accent-teal)">0.00 USD <span class="info-icon">ⓘ</span></div>
                        <div class="pnl-row-name">Прибуток з продажів</div>
                    </div>
                    <div class="bar-track"><div class="bar-fill bar-teal" style="width:100%"></div></div>
                </div>

                <div class="pnl-row">
                    <div class="pnl-row-info">
                        <div class="pnl-row-amount" style="color:var(--accent-teal)">0.00 USD</div>
                        <div class="pnl-row-name" style="color:var(--accent-teal);font-weight:600">Прибуток з продажів</div>
                    </div>
                    <div class="bar-track"><div class="bar-fill bar-teal" style="width:100%"></div></div>
                </div>
            </div>

            <!-- EXPENSES CARD -->
            <div class="expenses-card">
                <div class="card-header">
                    <div class="card-title">Витрати за категоріями</div>
                    <div style="display:flex;align-items:center;gap:8px">
                        <select class="select-period">
                            <option>Поточний місяць</option>
                            <option>Минулий місяць</option>
                        </select>
                        <div class="exp-settings">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M19.07 4.93l-1.41 1.41M4.93 4.93l1.41 1.41M12 2v2M12 20v2M2 12H4m16 0h2M6.34 17.66l-1.41 1.41M18.36 5.64l1.41 1.41"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="exp-total">0.00 USD</div>
                <div class="exp-subtitle">Витрати за Поточний місяць</div>

                <div class="exp-empty">
                    <div class="exp-empty-icon">📊</div>
                    <div class="exp-empty-text">Немає витрат за поточний місяць.<br>Додайте першу категорію або витрату.</div>
                </div>

                <div class="exp-actions">
                    <button class="btn-sm teal">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Додати категорію
                    </button>
                    <button class="btn-sm teal">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Додати витрату
                    </button>
                </div>
            </div>

        </div><!-- /bottom-grid -->

    </div><!-- /content -->
</div><!-- /main -->

</body>
</html>
