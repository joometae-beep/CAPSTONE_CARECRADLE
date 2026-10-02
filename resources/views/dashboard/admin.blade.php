<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg sm:text-xl leading-tight" style="color:#BE185D;">
            CareCradle Administrator Dashboard
        </h2>
    </x-slot>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ── Base ─────────────────────────────────────────────── */
        .ad-wrap * { box-sizing: border-box; }
        .ad-wrap {
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            color: #1e293b;
        }

        /* ── Welcome banner ───────────────────────────────────── */
        .ad-banner {
            border-radius: 1.25rem;
            background: linear-gradient(135deg, #9d174d 0%, #be185d 45%, #ec4899 100%);
            padding: 1.875rem 2.25rem;
            color: #fff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(190,24,93,0.2), 0 1px 4px rgba(0,0,0,0.06);
        }
        .ad-banner-blob-a {
            position: absolute; border-radius: 50%; pointer-events: none;
            width: 320px; height: 320px; top: -110px; right: -80px;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
        }
        .ad-banner-blob-b {
            position: absolute; border-radius: 50%; pointer-events: none;
            width: 160px; height: 160px; bottom: -40px; right: 180px;
            background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%);
        }
        .ad-banner-blob-c {
            position: absolute; border-radius: 50%; pointer-events: none;
            width: 80px; height: 80px; top: 16px; left: 42%;
            background: radial-gradient(circle, rgba(255,255,255,0.04) 0%, transparent 70%);
        }
        .ad-banner-inner {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }
        @media (min-width: 640px) {
            .ad-banner-inner { flex-direction: row; align-items: center; justify-content: space-between; }
        }
        .ad-banner-eyebrow {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            margin-bottom: 0.625rem;
        }
        .ad-banner-eyebrow-icon {
            width: 36px; height: 36px;
            border-radius: 0.75rem;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.2);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .ad-banner-eyebrow-text {
            font-size: 0.6875rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(251,207,232,0.9);
        }
        .ad-banner-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: clamp(1.375rem, 2.8vw, 2.125rem);
            font-weight: 400;
            line-height: 1.2;
            color: #fff;
            margin: 0 0 0.5rem;
        }
        .ad-banner-sub {
            font-size: 0.875rem;
            line-height: 1.65;
            color: rgba(251,207,232,0.85);
            max-width: 36rem;
            margin: 0;
        }
        .ad-banner-date {
            display: inline-flex;
            align-items: center;
            gap: 0.625rem;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.16);
            border-radius: 0.875rem;
            padding: 0.625rem 1.125rem;
            flex-shrink: 0;
            align-self: flex-start;
        }
        .ad-banner-date-label {
            font-size: 0.5625rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: rgba(251,207,232,0.7);
            margin-bottom: 0.125rem;
        }
        .ad-banner-date-value {
            font-size: 0.8125rem;
            font-weight: 600;
            color: #fff;
            white-space: nowrap;
        }

        /* ── Section heading ──────────────────────────────────── */
        .ad-section-head { margin-bottom: 1.125rem; }
        .ad-section-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 1.25rem;
            font-weight: 400;
            color: #9d174d;
            margin: 0 0 0.25rem;
            line-height: 1.2;
        }
        .ad-section-sub {
            font-size: 0.8125rem;
            color: #64748b;
            margin: 0;
        }

        /* ── Primary stat cards ───────────────────────────────── */
        .ad-stats-primary {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.875rem;
        }
        @media (min-width: 1024px) {
            .ad-stats-primary { grid-template-columns: repeat(4, 1fr); }
        }

        .ad-stat {
            background: #fff;
            border-radius: 1.125rem;
            border: 1px solid #fce7f3;
            padding: 1.25rem 1.375rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03), 0 4px 12px rgba(190,24,93,0.05);
            transition: box-shadow 0.2s, transform 0.15s;
        }
        .ad-stat:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.06), 0 8px 24px rgba(190,24,93,0.1);
            transform: translateY(-1px);
        }
        .ad-stat-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 0.875rem;
        }
        .ad-stat-icon {
            width: 40px; height: 40px;
            border-radius: 0.75rem;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .ad-stat-badge {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            padding: 0.2rem 0.625rem;
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }
        .ad-stat-value {
            font-size: 2.25rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1;
            margin: 0 0 0.3rem;
        }
        .ad-stat-label {
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 500;
            margin: 0;
        }

        .ad-stat-pink   .ad-stat-icon  { background: #fdf2f8; color: #ec4899; }
        .ad-stat-pink   .ad-stat-badge { background: #fdf2f8; color: #be185d; }
        .ad-stat-pink   .ad-stat-value { color: #9d174d; }

        .ad-stat-cyan   .ad-stat-icon  { background: #ecfeff; color: #0891b2; }
        .ad-stat-cyan   .ad-stat-badge { background: #ecfeff; color: #0e7490; }
        .ad-stat-cyan   .ad-stat-value { color: #164e63; }

        .ad-stat-blue   .ad-stat-icon  { background: #eff6ff; color: #3b82f6; }
        .ad-stat-blue   .ad-stat-badge { background: #eff6ff; color: #1d4ed8; }
        .ad-stat-blue   .ad-stat-value { color: #1e3a8a; }

        .ad-stat-amber  .ad-stat-icon  { background: #fffbeb; color: #f59e0b; }
        .ad-stat-amber  .ad-stat-badge { background: #fffbeb; color: #b45309; }
        .ad-stat-amber  .ad-stat-value { color: #78350f; }

        /* ── Secondary stat ───────────────────────────────────── */
        .ad-stat-secondary {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            background: #fff;
            border: 1px solid #fce7f3;
            border-radius: 1rem;
            padding: 1rem 1.375rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
            margin-top: 0.875rem;
        }
        .ad-stat-secondary-icon {
            width: 40px; height: 40px;
            border-radius: 0.75rem;
            background: #ecfdf5;
            color: #059669;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .ad-stat-secondary-value {
            font-size: 1.625rem;
            font-weight: 800;
            color: #064e3b;
            letter-spacing: -0.03em;
            line-height: 1;
            margin: 0 0 0.15rem;
        }
        .ad-stat-secondary-label {
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 500;
            margin: 0;
        }

        /* ── Quick action cards ───────────────────────────────── */
        .ad-actions {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        @media (min-width: 1024px) {
            .ad-actions { grid-template-columns: repeat(2, 1fr); }
        }
        .ad-action {
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            background: #fff;
            border-radius: 1.25rem;
            padding: 1.625rem 1.75rem;
            text-decoration: none;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 4px 16px rgba(0,0,0,0.04);
            transition: box-shadow 0.2s, transform 0.15s, border-color 0.2s;
        }
        .ad-action-blob {
            position: absolute;
            width: 120px; height: 120px;
            border-radius: 50%;
            top: -36px; right: -36px;
            pointer-events: none;
            transition: background 0.2s;
        }
        .ad-action-body { position: relative; flex: 1; min-width: 0; }
        .ad-action-icon {
            width: 52px; height: 52px;
            border-radius: 1rem;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.125rem;
            transition: background 0.2s, color 0.2s;
        }
        .ad-action-name {
            font-size: 1rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 0.5rem;
        }
        .ad-action-desc {
            font-size: 0.8125rem;
            line-height: 1.65;
            color: #64748b;
            margin: 0 0 1.25rem;
        }
        .ad-action-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            font-size: 0.8125rem;
            font-weight: 700;
        }
        .ad-action-arrow {
            width: 18px; height: 18px;
            flex-shrink: 0;
            margin-top: 0.25rem;
            transition: transform 0.15s;
        }
        .ad-action:hover .ad-action-arrow { transform: translateX(4px); }

        .ad-action-pink { border: 1px solid #fce7f3; }
        .ad-action-pink:hover {
            border-color: #fbcfe8;
            box-shadow: 0 4px 24px rgba(236,72,153,0.14), 0 1px 4px rgba(0,0,0,0.04);
            transform: translateY(-2px);
        }
        .ad-action-pink .ad-action-blob { background: #fdf2f8; }
        .ad-action-pink:hover .ad-action-blob { background: #fce7f3; }
        .ad-action-pink .ad-action-icon { background: #fdf2f8; color: #ec4899; }
        .ad-action-pink:hover .ad-action-icon { background: #ec4899; color: #fff; }
        .ad-action-pink .ad-action-cta { color: #be185d; }

        .ad-action-emerald { border: 1px solid #d1fae5; }
        .ad-action-emerald:hover {
            border-color: #a7f3d0;
            box-shadow: 0 4px 24px rgba(16,185,129,0.12), 0 1px 4px rgba(0,0,0,0.04);
            transform: translateY(-2px);
        }
        .ad-action-emerald .ad-action-blob { background: #ecfdf5; }
        .ad-action-emerald:hover .ad-action-blob { background: #d1fae5; }
        .ad-action-emerald .ad-action-icon { background: #ecfdf5; color: #059669; }
        .ad-action-emerald:hover .ad-action-icon { background: #059669; color: #fff; }
        .ad-action-emerald .ad-action-cta { color: #047857; }

        /* ── Insights ─────────────────────────────────────────── */
        .ad-insight-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.875rem;
        }
        .ad-insight-head h3 {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 1.0625rem;
            font-weight: 400;
            color: #9d174d;
            margin: 0;
        }
        .ad-insight-count {
            font-size: 0.6875rem;
            font-weight: 700;
            color: #ec4899;
            background: #fdf2f8;
            border-radius: 9999px;
            padding: 0.2rem 0.625rem;
            letter-spacing: 0.02em;
        }

        /* ── Table ────────────────────────────────────────────── */
        .ad-table-shell {
            background: #fff;
            border: 1px solid #fce7f3;
            border-radius: 1.125rem;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03), 0 4px 12px rgba(190,24,93,0.04);
        }
        .ad-table-scroll { overflow-x: auto; }
        table.ad-table {
            width: 100%;
            min-width: 480px;
            border-collapse: collapse;
        }
        table.ad-table thead tr {
            background: #fdf2f8;
            border-bottom: 1px solid #fce7f3;
        }
        table.ad-table thead th {
            padding: 0.875rem 1.375rem;
            text-align: left;
            font-size: 0.6875rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            color: #be185d;
        }
        table.ad-table tbody tr {
            border-bottom: 1px solid #fdf2f8;
            transition: background 0.15s;
        }
        table.ad-table tbody tr:last-child { border-bottom: none; }
        table.ad-table tbody tr:hover { background: #fffbfe; }
        table.ad-table tbody td {
            padding: 1rem 1.375rem;
            font-size: 0.875rem;
            color: #1e293b;
            vertical-align: middle;
        }
        table.ad-table tbody td.ad-td-muted { color: #64748b; }

        .ad-td-time {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            font-size: 0.8125rem;
            font-weight: 700;
            color: #9d174d;
        }
        .ad-chip {
            display: inline-flex;
            border-radius: 0.5rem;
            padding: 0.25rem 0.625rem;
            font-size: 0.75rem;
            font-weight: 500;
            background: #f1f5f9;
            color: #475569;
        }

        /* Status pills */
        .ad-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            border-radius: 9999px;
            padding: 0.25rem 0.75rem;
            font-size: 0.6875rem;
            font-weight: 700;
            letter-spacing: 0.01em;
        }
        .ad-pill-dot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
        .ad-pill-blue    { background: #eff6ff; color: #1d4ed8; }
        .ad-pill-blue .ad-pill-dot    { background: #3b82f6; }
        .ad-pill-emerald { background: #ecfdf5; color: #065f46; }
        .ad-pill-emerald .ad-pill-dot { background: #10b981; }
        .ad-pill-rose    { background: #fff1f2; color: #be123c; }
        .ad-pill-rose .ad-pill-dot    { background: #f43f5e; }
        .ad-pill-amber   { background: #fffbeb; color: #92400e; }
        .ad-pill-amber .ad-pill-dot   { background: #f59e0b; }
        .ad-pill-slate   { background: #f1f5f9; color: #475569; }
        .ad-pill-slate .ad-pill-dot   { background: #94a3b8; }
        .ad-pill-due { background: #ecfdf5; color: #047857; font-weight: 600; font-size: 0.8125rem; }

        /* ── Empty states ─────────────────────────────────────── */
        .ad-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3.5rem 2rem;
            text-align: center;
        }
        .ad-empty-icon {
            width: 56px; height: 56px;
            border-radius: 1rem;
            background: #fdf2f8;
            display: flex; align-items: center; justify-content: center;
            color: #f9a8d4;
            margin: 0 auto 1rem;
        }
        .ad-empty-title {
            font-size: 0.9375rem;
            font-weight: 600;
            color: #1e293b;
            margin: 0 0 0.375rem;
        }
        .ad-empty-sub {
            font-size: 0.8125rem;
            color: #94a3b8;
            max-width: 28rem;
            line-height: 1.6;
            margin: 0;
        }
        .ad-empty-icon-emerald { background: #ecfdf5; color: #6ee7b7; }

        /* ── System footer ────────────────────────────────────── */
        .ad-sys-footer {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
            background: #fff;
            border: 1px solid #fce7f3;
            border-radius: 1.125rem;
            padding: 1.375rem 1.75rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        }
        @media (min-width: 640px) {
            .ad-sys-footer { flex-direction: row; align-items: center; justify-content: space-between; }
        }
        .ad-sys-footer-brand { display: flex; align-items: center; gap: 0.875rem; }
        .ad-sys-footer-icon {
            width: 40px; height: 40px;
            border-radius: 0.875rem;
            background: #fdf2f8;
            color: #ec4899;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .ad-sys-footer-name { font-size: 0.875rem; font-weight: 600; color: #1e293b; margin: 0 0 0.2rem; }
        .ad-sys-footer-sub  { font-size: 0.75rem; color: #94a3b8; margin: 0; }
        .ad-sys-footer-version { font-size: 0.75rem; color: #94a3b8; flex-shrink: 0; text-align: right; }
        .ad-sys-footer-version strong { display: block; font-size: 0.8125rem; font-weight: 600; color: #be185d; margin-bottom: 0.125rem; }
    </style>

    <div class="ad-wrap py-6 sm:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8 sm:space-y-10">

            {{-- ====================================== --}}
            {{-- 1. Welcome Banner --}}
            {{-- ====================================== --}}

            <div class="ad-banner">
                <div class="ad-banner-blob-a" aria-hidden="true"></div>
                <div class="ad-banner-blob-b" aria-hidden="true"></div>
                <div class="ad-banner-blob-c" aria-hidden="true"></div>

                <div class="ad-banner-inner">
                    <div>
                        <div class="ad-banner-eyebrow">
                            <div class="ad-banner-eyebrow-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.9)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                                    <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                                </svg>
                            </div>
                            <span class="ad-banner-eyebrow-text">Administrator Control Center</span>
                        </div>

                        <h1 class="ad-banner-title">
                            Welcome back, {{ Auth::user()->name }}
                        </h1>

                        <p class="ad-banner-sub">
                            Centralized management of maternal and infant healthcare services.
                        </p>
                    </div>

                    <div class="ad-banner-date">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(251,207,232,0.8)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 2v3M16 2v3M3.5 9.09h17M21 8.5V19a2 2 0 01-2 2H5a2 2 0 01-2-2V8.5a2 2 0 012-2h14a2 2 0 012 2z"/>
                        </svg>
                        <div>
                            <p class="ad-banner-date-label">Today</p>
                            <p class="ad-banner-date-value">{{ now()->format('l, F d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ====================================== --}}
            {{-- 2. System Overview --}}
            {{-- ====================================== --}}

            <div>
                <div class="ad-section-head">
                    <p class="ad-section-title">System Overview</p>
                    <p class="ad-section-sub">Real-time summary of CareCradle records and healthcare services.</p>
                </div>

                <div class="ad-stats-primary">

                    <div class="ad-stat ad-stat-pink">
                        <div class="ad-stat-top">
                            <div class="ad-stat-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                                </svg>
                            </div>
                            <span class="ad-stat-badge">Mothers</span>
                        </div>
                        <p class="ad-stat-value">{{ $mothers }}</p>
                        <p class="ad-stat-label">Registered Mothers</p>
                    </div>

                    <div class="ad-stat ad-stat-cyan">
                        <div class="ad-stat-top">
                            <div class="ad-stat-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                                </svg>
                            </div>
                            <span class="ad-stat-badge">Infants</span>
                        </div>
                        <p class="ad-stat-value">{{ $infants }}</p>
                        <p class="ad-stat-label">Registered Infants</p>
                    </div>

                    <div class="ad-stat ad-stat-blue">
                        <div class="ad-stat-top">
                            <div class="ad-stat-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                    <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                                </svg>
                            </div>
                            <span class="ad-stat-badge">Midwives</span>
                        </div>
                        <p class="ad-stat-value">{{ $midwives }}</p>
                        <p class="ad-stat-label">Registered Midwives</p>
                    </div>

                    <div class="ad-stat ad-stat-amber">
                        <div class="ad-stat-top">
                            <div class="ad-stat-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M8 2v3M16 2v3M3.5 9.09h17M21 8.5V19a2 2 0 01-2 2H5a2 2 0 01-2-2V8.5a2 2 0 012-2h14a2 2 0 012 2z"/>
                                </svg>
                            </div>
                            <span class="ad-stat-badge">Appointments</span>
                        </div>
                        <p class="ad-stat-value">{{ $appointments }}</p>
                        <p class="ad-stat-label">Upcoming Appointments</p>
                    </div>

                </div>

                <div class="ad-stat-secondary">
                    <div class="ad-stat-secondary-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="ad-stat-secondary-value">{{ $vaccinations }}</p>
                        <p class="ad-stat-secondary-label">Vaccinations Administered</p>
                    </div>
                </div>
            </div>

            {{-- ====================================== --}}
            {{-- 3. Quick Actions --}}
            {{-- ====================================== --}}

            <div>
                <div class="ad-section-head">
                    <p class="ad-section-title">Quick Actions</p>
                    <p class="ad-section-sub">Manage users and administrative reports for the CareCradle EMR.</p>
                </div>

                <div class="ad-actions">

                    <a href="{{ route('midwives.index') }}" class="ad-action ad-action-pink" aria-label="Open Midwife Management">
                        <div class="ad-action-blob" aria-hidden="true"></div>
                        <div class="ad-action-body">
                            <div class="ad-action-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                    <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                                </svg>
                            </div>
                            <p class="ad-action-name">Midwife Management</p>
                            <p class="ad-action-desc">Manage registered midwives and their access to the CareCradle system.</p>
                            <span class="ad-action-cta">
                                Open module
                                <svg class="ad-action-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                </svg>
                            </span>
                        </div>
                    </a>

                    <a href="{{ route('reports.index') }}" class="ad-action ad-action-emerald" aria-label="Open Reports">
                        <div class="ad-action-blob" aria-hidden="true"></div>
                        <div class="ad-action-body">
                            <div class="ad-action-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 17v-2m3 2v-4m3 4V7m5 12H4.5A2.25 2.25 0 012.25 16.75V4.5A2.25 2.25 0 014.5 2.25h15A2.25 2.25 0 0121.75 4.5v12.25A2.25 2.25 0 0119.5 19Z"/>
                                </svg>
                            </div>
                            <p class="ad-action-name">Reports</p>
                            <p class="ad-action-desc">View and generate maternal, infant, appointment, and vaccination reports.</p>
                            <span class="ad-action-cta">
                                Open module
                                <svg class="ad-action-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                </svg>
                            </span>
                        </div>
                    </a>

                </div>
            </div>

            {{-- ====================================== --}}
            {{-- 4. System Insights --}}
            {{-- ====================================== --}}

            <div class="space-y-8">

                <div class="ad-section-head">
                    <p class="ad-section-title">System Insights</p>
                    <p class="ad-section-sub">Live operational detail behind the summary statistics above.</p>
                </div>

                {{-- Today's Appointments --}}
                <div>
                    <div class="ad-insight-head">
                        <h3>Today's Appointments</h3>
                        <span class="ad-insight-count">{{ $todayAppointments->count() }} today</span>
                    </div>

                    <div class="ad-table-shell">
                        @if($todayAppointments->count())

                            @php
                                $statusPill = fn($s) => match($s) {
                                    'Scheduled' => 'ad-pill-blue',
                                    'Completed' => 'ad-pill-emerald',
                                    'Cancelled' => 'ad-pill-rose',
                                    'Missed'    => 'ad-pill-amber',
                                    default     => 'ad-pill-slate',
                                };
                            @endphp

                            <div class="ad-table-scroll">
                                <table class="ad-table">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Mother</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($todayAppointments as $appointment)
                                            <tr>
                                                <td>
                                                    <span class="ad-td-time">
                                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                                                        </svg>
                                                        {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}
                                                    </span>
                                                </td>
                                                <td style="font-weight:600;">
                                                    {{ $appointment->mother->first_name }} {{ $appointment->mother->last_name }}
                                                </td>
                                                <td>
                                                    <span class="ad-chip">{{ $appointment->appointment_type }}</span>
                                                </td>
                                                <td>
                                                    <span class="ad-pill {{ $statusPill($appointment->status) }}">
                                                        <span class="ad-pill-dot"></span>
                                                        {{ $appointment->status }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        @else
                            <div class="ad-empty">
                                <div class="ad-empty-icon">
                                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M8 2v3M16 2v3M3.5 9.09h17M21 8.5V19a2 2 0 01-2 2H5a2 2 0 01-2-2V8.5a2 2 0 012-2h14a2 2 0 012 2z"/>
                                    </svg>
                                </div>
                                <p class="ad-empty-title">No Appointments Today</p>
                                <p class="ad-empty-sub">There are no scheduled maternal appointments for today.</p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Upcoming Vaccinations --}}
                <div>
                    <div class="ad-insight-head">
                        <h3>Upcoming Vaccinations</h3>
                        <span class="ad-insight-count">{{ $upcomingVaccinations->count() }} upcoming</span>
                    </div>

                    <div class="ad-table-shell">
                        @if($upcomingVaccinations->count())

                            <div class="ad-table-scroll">
                                <table class="ad-table">
                                    <thead>
                                        <tr>
                                            <th>Infant</th>
                                            <th>Vaccine</th>
                                            <th>Next Due Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($upcomingVaccinations as $vaccination)
                                            <tr>
                                                <td style="font-weight:600;">
                                                    {{ $vaccination->infant->first_name }} {{ $vaccination->infant->last_name }}
                                                </td>
                                                <td class="ad-td-muted">{{ $vaccination->vaccine_name }}</td>
                                                <td>
                                                    <span class="ad-pill ad-pill-due">
                                                        {{ \Carbon\Carbon::parse($vaccination->next_due_date)->format('M d, Y') }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        @else
                            <div class="ad-empty">
                                <div class="ad-empty-icon ad-empty-icon-emerald">
                                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <p class="ad-empty-title">No Upcoming Vaccinations</p>
                                <p class="ad-empty-sub">Upcoming infant immunization schedules will appear here once vaccination records are available.</p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Recent Infant Registrations --}}
                <div>
                    <div class="ad-insight-head">
                        <h3>Recent Infant Registrations</h3>
                        <span class="ad-insight-count">{{ $recentInfants->count() }} recent</span>
                    </div>

                    <div class="ad-table-shell">
                        @if($recentInfants->count())

                            <div class="ad-table-scroll">
                                <table class="ad-table">
                                    <thead>
                                        <tr>
                                            <th>Infant</th>
                                            <th>Mother</th>
                                            <th>Registration Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentInfants as $infant)
                                            <tr>
                                                <td style="font-weight:600;">
                                                    {{ $infant->first_name }} {{ $infant->last_name }}
                                                </td>
                                                <td class="ad-td-muted">
                                                    {{ $infant->mother->first_name }} {{ $infant->mother->last_name }}
                                                </td>
                                                <td>
                                                    <span class="ad-pill ad-pill-blue">
                                                        <span class="ad-pill-dot"></span>
                                                        {{ $infant->created_at->format('M d, Y') }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        @else
                            <div class="ad-empty">
                                <div class="ad-empty-icon">
                                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>
                                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                                    </svg>
                                </div>
                                <p class="ad-empty-title">No Infant Records Yet</p>
                                <p class="ad-empty-sub">Newly registered infant records will appear here once patients are enrolled in the CareCradle system.</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            {{-- ====================================== --}}
            {{-- 5. System Information --}}
            {{-- ====================================== --}}

            <div class="ad-sys-footer">
                <div class="ad-sys-footer-brand">
                    <div class="ad-sys-footer-icon">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="ad-sys-footer-name">CareCradle Maternal &amp; Infant Health Monitoring System</p>
                        <p class="ad-sys-footer-sub">Rural Health Unit Electronic Maternal and Infant Records Management</p>
                    </div>
                </div>
                <div class="ad-sys-footer-version">
                    <strong>Version 1.0 &middot; Administrator Dashboard</strong>
                    &copy; {{ date('Y') }} Irosin Rural Health Unit. All Rights Reserved.
                </div>
            </div>

        </div>
    </div>

</x-app-layout>