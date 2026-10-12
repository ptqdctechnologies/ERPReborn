<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP Reborn</title>

    <!-- Sweetalert -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminltesweatalert.min.css') }}">

    <style>
        :root {
            --page-bg: #f7f5f0;
            --text: #152238;
            --muted: #687384;
            --border: #e7e5df;
            --input-border: #d9d6ce;
            --primary: #244593;
            --success-bg: #e8f6ef;
            --success-border: #c5e7d5;
            --success: #087344;
            --error-bg: #fef2f2;
            --error-border: #fecaca;
            --error: #b91c1c;
            --avatar-bg: #e9eefb;
            --avatar-text: #294a9b;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            min-height: 100%;
        }

        body {
            background: var(--page-bg);
            color: var(--text);
            font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI",
                Roboto, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        main {
            width: 100%;
            min-height: 100vh;
            padding: 31px 24px;
        }

        .verify-layout {
            display: grid;
            grid-template-columns: 275px minmax(0, 1fr);
            /* grid-template-columns: 272px minmax(0, 1fr); */
            column-gap: 20px;
            align-items: start;
            max-width: fit-content;
            /* max-width: 732px; */
            margin: 0 auto;
        }

        .page-title {
            margin: 0 0 11px;
            /* font-size: 21px; */
            line-height: 25px;
            font-weight: 750;
            letter-spacing: -0.55px;
            color: #172437;
        }

        .verification-card {
            width: 100%;
            min-height: 95px;
            padding: 17px 15px 14px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 9px;
            box-shadow: 0 1px 3px rgba(25, 32, 44, 0.035);
        }

        .verification-card label {
            display: block;
            margin: 0 0 7px;
            font-size: 14px;
            line-height: 11px;
            font-weight: 700;
            color: #172437;
        }

        .verify-form {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 50px;
            gap: 5px;
            align-items: end;
        }

        .code-input {
            width: 100%;
            height: 30px;
            padding: 0 10px;
            border: 1px solid var(--input-border);
            border-radius: 6px;
            outline: none;
            background: #fff;
            color: #1d2a3c;
            font: 400 12px/1 Inter, -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.015);
        }

        .code-input::placeholder {
            color: #a3a7ad;
            opacity: 1;
        }

        .code-input:focus {
            border-color: #9baedc;
            box-shadow: 0 0 0 2px rgba(36, 69, 147, 0.08);
        }

        .verify-button {
            height: 30px;
            border: 0;
            border-radius: 6px;
            background: var(--primary);
            color: #fff;
            font: 700 12px/1 Inter, -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            cursor: pointer;
        }

        .verify-button:hover {
            filter: brightness(0.96);
        }

        .help-text {
            margin: 6px 0 0;
            font-size: 10px;
            line-height: 10px;
            color: #657080;
        }

        .results {
            min-width: 0;
        }

        .results-heading {
            margin: 0 0 8px;
            font-size: 14px;
            line-height: 10px;
            font-weight: 750;
            letter-spacing: 0.75px;
            color: #647080;
            text-transform: uppercase;
        }

        .success-card {
            min-height: 80px;
            padding: 13px 19px;
            display: flex;
            align-items: center;
            gap: 15px;
            background: var(--success-bg);
            border: 1px solid var(--success-border);
            border-radius: 10px;
        }

        .success-icon {
            width: 40px;
            height: 40px;
            flex: 0 0 40px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: var(--success);
            position: relative;
        }

        .success-icon::after {
            content: "";
            width: 15px;
            height: 8px;
            border-left: 3px solid #fff;
            border-bottom: 3px solid #fff;
            transform: rotate(-45deg) translate(1px, -1px);
            border-radius: 1px;
        }

        .success-content {
            min-width: 0;
        }

        .success-title {
            margin: 0 0 2px;
            /* font-size: 17px; */
            line-height: 20px;
            font-weight: 750;
            letter-spacing: -0.25px;
            color: #075e3a;
        }

        .success-description {
            margin: 0;
            font-size: 12px;
            line-height: 12px;
            color: #326650;
        }

        .error-card {
            min-height: 80px;
            padding: 13px 19px;
            display: flex;
            align-items: center;
            gap: 15px;
            background: var(--error-bg);
            border: 1px solid var(--error-border);
            border-radius: 10px;
        }

        .error-icon {
            width: 40px;
            height: 40px;
            flex: 0 0 40px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: var(--error);
            position: relative;
        }

        .error-icon::before,
        .error-icon::after {
            content: "";
            position: absolute;
            width: 18px;
            height: 3px;
            background: #fff;
            border-radius: 2px;
        }

        .error-icon::before {
            transform: rotate(45deg);
        }

        .error-icon::after {
            transform: rotate(-45deg);
        }

        .error-content {
            min-width: 0;
        }

        .error-title {
            margin: 0 0 2px;
            /* font-size: 17px; */
            line-height: 20px;
            font-weight: 750;
            letter-spacing: -0.25px;
            color: #b91c1c;
        }

        .error-description {
            margin: 0;
            font-size: 12px;
            line-height: 12px;
            color: #b91c1c;
        }

        .signer-card {
            min-height: 55px;
            margin-top: 12px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 11px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 9px;
            box-shadow: 0 1px 3px rgba(25, 32, 44, 0.035);
        }

        .avatar {
            width: 40px;
            height: 40px;
            flex: 0 0 40px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: var(--avatar-bg);
            color: var(--avatar-text);
            font-size: 10px;
            line-height: 1;
            font-weight: 700;
        }

        .signer-label {
            margin: 0 0 1px;
            font-size: 10px;
            line-height: 9px;
            color: #7b8390;
        }

        .signer-name {
            margin: 6px 0px 4px 0px;
            font-size: 14px;
            line-height: 11px;
            font-weight: 700;
            color: #172437;
        }

        .signer-position {
            margin: 0;
            font-size: 12px;
            line-height: 9px;
            color: #647080;
        }

        .details-card {
            min-height: 50px;
            margin-top: 12px;
            padding: 10px 15px;
            display: grid;
            grid-template-columns: max-content max-content max-content max-content;
            gap: 16px;
            align-items: center;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 9px;
            box-shadow: 0 1px 3px rgba(25, 32, 44, 0.035);
        }

        .detail-item {
            min-width: 0;
        }

        .detail-label {
            display: block;
            margin-bottom: 3px;
            font-size: 10px;
            line-height: 8px;
            color: #7b8390;
        }

        .detail-value {
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 12px;
            /* line-height: 10px; */
            font-weight: 700;
            color: #172437;
        }

        @media (max-width: 700px) {
            main {
                padding: 24px 18px;
            }

            .verify-layout {
                grid-template-columns: 1fr;
                gap: 24px;
                max-width: 440px;
            }

            .verification-card {
                min-height: auto;
            }

            .results {
                width: 100%;
            }

            .details-card {
                grid-template-columns: 1fr 1fr;
                gap: 12px 10px;
            }
        }

        @media (max-width: 420px) {
            main {
                padding: 20px 14px;
            }

            .page-title {
                font-size: 20px;
            }

            .verify-form {
                grid-template-columns: 1fr;
            }

            .verify-button {
                width: 100%;
            }

            .success-card {
                align-items: flex-start;
                padding: 14px;
            }

            .success-icon {
                width: 36px;
                height: 36px;
                flex-basis: 36px;
            }

            .success-title {
                font-size: 15px;
            }

            .details-card {
                grid-template-columns: 1fr 1fr;
                gap: 12px 10px;
            }
        }

        /* ── CAPTCHA Modal ── */
        .captcha-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(21, 34, 56, 0.45);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            place-items: center;
            animation: captchaFadeIn 0.2s ease;
        }

        .captcha-overlay.active {
            display: grid;
        }

        @keyframes captchaFadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes captchaSlideUp {
            from {
                opacity: 0;
                transform: translateY(12px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .captcha-modal {
            width: 340px;
            max-width: calc(100vw - 32px);
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(21, 34, 56, 0.18), 0 1px 4px rgba(21, 34, 56, 0.06);
            overflow: hidden;
            animation: captchaSlideUp 0.25s ease;
        }

        .captcha-header {
            padding: 16px 20px 12px;
            border-bottom: 1px solid var(--border);
        }

        .captcha-header h3 {
            margin: 0 0 2px;
            font-size: 15px;
            font-weight: 750;
            color: #172437;
            letter-spacing: -0.2px;
        }

        .captcha-header p {
            margin: 0;
            font-size: 11px;
            color: #687384;
            line-height: 15px;
        }

        .captcha-body {
            padding: 16px 20px;
        }

        .captcha-challenge {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .captcha-canvas-wrap {
            flex: 1;
            min-width: 0;
            height: 46px;
            border-radius: 7px;
            overflow: hidden;
            border: 1px solid var(--border);
            background: #f3f1ec;
        }

        .captcha-canvas-wrap canvas {
            display: block;
            width: 100%;
            height: 100%;
        }

        .captcha-refresh {
            width: 36px;
            height: 36px;
            flex: 0 0 36px;
            display: grid;
            place-items: center;
            border: 1px solid var(--border);
            border-radius: 7px;
            background: #fff;
            cursor: pointer;
            color: #687384;
            transition: background 0.15s, color 0.15s;
        }

        .captcha-refresh:hover {
            background: #f3f1ec;
            color: #172437;
        }

        .captcha-refresh svg {
            width: 16px;
            height: 16px;
        }

        .captcha-input {
            width: 100%;
            height: 34px;
            padding: 0 11px;
            border: 1px solid var(--input-border);
            border-radius: 7px;
            outline: none;
            background: #fff;
            color: #1d2a3c;
            font: 500 13px/1 Inter, -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.015);
            transition: border-color 0.15s, box-shadow 0.15s;
        }

        .captcha-input::placeholder {
            color: #a3a7ad;
            font-weight: 400;
        }

        .captcha-input:focus {
            border-color: #9baedc;
            box-shadow: 0 0 0 2px rgba(36, 69, 147, 0.08);
        }

        .captcha-input.shake {
            animation: captchaShake 0.4s ease;
            border-color: var(--error);
        }

        @keyframes captchaShake {

            0%,
            100% {
                transform: translateX(0);
            }

            20% {
                transform: translateX(-6px);
            }

            40% {
                transform: translateX(6px);
            }

            60% {
                transform: translateX(-4px);
            }

            80% {
                transform: translateX(4px);
            }
        }

        .captcha-footer {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            padding: 12px 20px 16px;
        }

        .captcha-btn {
            height: 34px;
            padding: 0 18px;
            border: 0;
            border-radius: 7px;
            font: 600 12px/1 Inter, -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            cursor: pointer;
            transition: filter 0.15s, background 0.15s;
        }

        .captcha-btn-cancel {
            background: #f3f1ec;
            color: #4a5260;
        }

        .captcha-btn-cancel:hover {
            background: #e7e5df;
        }

        .captcha-btn-submit {
            background: var(--primary);
            color: #fff;
        }

        .captcha-btn-submit:hover {
            filter: brightness(0.94);
        }

        .captcha-btn-submit:disabled {
            opacity: 0.55;
            cursor: not-allowed;
            filter: none;
        }
    </style>
</head>

<body>
    <main>
        <div class="verify-layout">

            <aside aria-labelledby="verify-title">
                <h1 id="verify-title" class="page-title">Verify PO</h1>

                <section class="verification-card" aria-label="Purchase order verification">
                    <form class="verify-form" id="verify-form">
                        <div>
                            <label for="unique-code">Unique code</label>
                            <input id="unique-code" name="unique_code" class="code-input" type="text"
                                placeholder="Enter unique code" autocomplete="off">
                        </div>

                        <button class="verify-button" id="verify-button" type="submit">Verify</button>
                    </form>

                    <p class="help-text">
                        No code yet? Ask the signer or the Procurement team.
                    </p>
                </section>
            </aside>

            <section id="result-success" class="results" aria-labelledby="results-title" style="display: none;">
                <h2 id="results-title" class="results-heading">
                    Result &amp; Approval Details
                </h2>

                <article class="success-card" aria-label="Verification successful">
                    <span class="success-icon" aria-hidden="true"></span>

                    <div class="success-content">
                        <h3 class="success-title">Signature verified</h3>
                        <p class="success-description">
                            The code matches. Here are the approval details.
                        </p>
                    </div>
                </article>

                <article class="signer-card" aria-label="Signer information">
                    <div class="avatar" aria-hidden="true">WT</div>

                    <div>
                        <p class="signer-label">Signed by</p>
                        <p class="signer-name">Wisnu Trenggono Wirayuda</p>
                        <p class="signer-position">Staff</p>
                    </div>
                </article>

                <section class="details-card" aria-label="Purchase order details">
                    <div class="detail-item">
                        <span class="detail-label">PO number</span>
                        <span class="detail-value">PO/2026/09/0148</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Vendor</span>
                        <span class="detail-value">Supplier Nusa Indonesia</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Total amount</span>
                        <span class="detail-value">Rp 8.000.000.000</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Approval date</span>
                        <span class="detail-value">19 Sep 2026</span>
                    </div>
                </section>
            </section>

            <section id="result-error" class="results" aria-labelledby="results-title" style="display: none;">
                <h2 id="results-title" class="results-heading">
                    Result &amp; Approval Details
                </h2>

                <article class="error-card" aria-label="Verification successful">
                    <span class="error-icon" aria-hidden="true"></span>

                    <div class="error-content">
                        <h3 class="error-title">Code does not match</h3>
                        <p class="error-description">
                            The signature could not be confirmed. Do not process this PO yet.
                        </p>
                    </div>
                </article>

                <article class="signer-card" aria-label="Signer information">
                    <p class="signer-label">Need help? Contact Procurement at procurement@qdc.co.id.</p>
                </article>
            </section>

        </div>
    </main>

    <!-- CAPTCHA Modal -->
    <div class="captcha-overlay" id="captcha-overlay">
        <div class="captcha-modal" role="dialog" aria-labelledby="captcha-title" aria-modal="true">
            <div class="captcha-header">
                <h3 id="captcha-title">Security Verification</h3>
                <p>Solve the math problem below to continue.</p>
            </div>

            <div class="captcha-body">
                <div class="captcha-challenge">
                    <div class="captcha-canvas-wrap">
                        <canvas id="captcha-canvas" width="520" height="92"></canvas>
                    </div>

                    <button type="button" class="captcha-refresh" id="captcha-refresh" title="New challenge">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                        </svg>
                    </button>
                </div>

                <input type="text" class="captcha-input" id="captcha-answer" placeholder="Enter your answer"
                    autocomplete="off">
            </div>

            <div class="captcha-footer">
                <button type="button" class="captcha-btn captcha-btn-cancel" id="captcha-cancel">Cancel</button>
                <button type="button" class="captcha-btn captcha-btn-submit" id="captcha-submit">Confirm</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('AdminLTE-master/dist/js/sweetalert2.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('verify-form');
            const input = document.getElementById('unique-code');
            const successResult = document.getElementById('result-success');
            const errorResult = document.getElementById('result-error');

            // ── CAPTCHA elements ──
            const captchaOverlay = document.getElementById('captcha-overlay');
            const captchaCanvas = document.getElementById('captcha-canvas');
            const captchaAnswer = document.getElementById('captcha-answer');
            const captchaRefresh = document.getElementById('captcha-refresh');
            const captchaCancel = document.getElementById('captcha-cancel');
            const captchaSubmit = document.getElementById('captcha-submit');
            let captchaExpected = null;
            let pendingUniqueCode = null;

            // ── Generate random math challenge ──
            function generateCaptcha() {
                const operators = ['+', '−', '×'];
                const op = operators[Math.floor(Math.random() * operators.length)];
                let a, b, answer;

                switch (op) {
                    case '+':
                        a = Math.floor(Math.random() * 50) + 10;
                        b = Math.floor(Math.random() * 40) + 5;
                        answer = a + b;
                        break;
                    case '−':
                        a = Math.floor(Math.random() * 50) + 20;
                        b = Math.floor(Math.random() * (a - 1)) + 1;
                        answer = a - b;
                        break;
                    case '×':
                        a = Math.floor(Math.random() * 12) + 2;
                        b = Math.floor(Math.random() * 9) + 2;
                        answer = a * b;
                        break;
                }

                captchaExpected = answer;
                drawCaptcha(a + ' ' + op + ' ' + b + ' = ?');
            }

            // ── Render challenge text on canvas with noise ──
            function drawCaptcha(text) {
                const ctx = captchaCanvas.getContext('2d');
                const w = captchaCanvas.width;
                const h = captchaCanvas.height;

                // Background
                ctx.fillStyle = '#f3f1ec';
                ctx.fillRect(0, 0, w, h);

                // Noise dots
                for (let i = 0; i < 90; i++) {
                    ctx.beginPath();
                    ctx.arc(
                        Math.random() * w,
                        Math.random() * h,
                        Math.random() * 2 + 0.5,
                        0, Math.PI * 2
                    );
                    ctx.fillStyle = `rgba(${100 + Math.random() * 100}, ${100 + Math.random() * 100}, ${120 + Math.random() * 80}, ${0.25 + Math.random() * 0.25})`;
                    ctx.fill();
                }

                // Noise lines
                for (let i = 0; i < 4; i++) {
                    ctx.beginPath();
                    ctx.moveTo(Math.random() * w, Math.random() * h);
                    ctx.lineTo(Math.random() * w, Math.random() * h);
                    ctx.strokeStyle = `rgba(${80 + Math.random() * 100}, ${80 + Math.random() * 100}, ${100 + Math.random() * 80}, ${0.18 + Math.random() * 0.15})`;
                    ctx.lineWidth = 1;
                    ctx.stroke();
                }

                // Text
                ctx.font = 'bold 32px Inter, -apple-system, BlinkMacSystemFont, sans-serif';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';

                // Slight random rotation per character
                const startX = w / 2 - (text.length * 10);
                for (let i = 0; i < text.length; i++) {
                    ctx.save();
                    const x = startX + i * 20;
                    const y = h / 2 + (Math.random() * 6 - 3);
                    const angle = (Math.random() - 0.5) * 0.18;
                    ctx.translate(x, y);
                    ctx.rotate(angle);
                    ctx.fillStyle = `hsl(${220 + Math.random() * 20}, ${40 + Math.random() * 20}%, ${22 + Math.random() * 15}%)`;
                    ctx.fillText(text[i], 0, 0);
                    ctx.restore();
                }
            }

            // ── Show CAPTCHA modal ──
            function showCaptcha() {
                captchaAnswer.value = '';
                captchaAnswer.classList.remove('shake');
                captchaSubmit.disabled = false;
                generateCaptcha();
                captchaOverlay.classList.add('active');
                setTimeout(() => captchaAnswer.focus(), 200);
            }

            // ── Hide CAPTCHA modal ──
            function hideCaptcha() {
                captchaOverlay.classList.remove('active');
                captchaExpected = null;
                pendingUniqueCode = null;
            }

            // ── Validate CAPTCHA and proceed ──
            async function validateCaptchaAndSubmit() {
                const userAnswer = captchaAnswer.value.trim();

                if (!userAnswer || isNaN(userAnswer)) {
                    captchaAnswer.classList.add('shake');
                    setTimeout(() => captchaAnswer.classList.remove('shake'), 450);
                    captchaAnswer.focus();
                    return;
                }

                if (parseInt(userAnswer, 10) !== captchaExpected) {
                    captchaAnswer.classList.add('shake');
                    setTimeout(() => captchaAnswer.classList.remove('shake'), 450);
                    captchaAnswer.value = '';
                    captchaAnswer.focus();
                    generateCaptcha();
                    Swal.fire({
                        icon: 'error',
                        title: 'Incorrect',
                        text: 'CAPTCHA answer is wrong. Please try again.',
                        timer: 2500,
                        showConfirmButton: false
                    });
                    return;
                }

                // CAPTCHA passed – proceed with the actual verification
                hideCaptcha();

                try {
                    Swal.fire({
                        title: 'Verifying…',
                        text: 'Please wait while we verify your code.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => Swal.showLoading()
                    });

                    const response = await fetch(
                        "{{ route('VerifyStorePurchaseOrder') }}",
                        {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                unique_code: input.value
                            })
                        }
                    );

                    const result = await response.json();

                    console.log('result', result);

                    Swal.close();

                    if (result.success) {
                        successResult.style.display = "block";
                        errorResult.style.display = "none";
                    } else {
                        successResult.style.display = "none";
                        errorResult.style.display = "block";
                    }
                } catch (error) {
                    Swal.close();
                    console.error('Verification error:', error);
                    Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
                }
            }

            // ── Form submit → open CAPTCHA instead of calling API directly ──
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                const uniqueCode = input.value.trim().toUpperCase();

                if (!uniqueCode) {
                    Swal.fire("Error", "The Unique code field is required", "error");
                    return;
                }

                pendingUniqueCode = uniqueCode;
                showCaptcha();
            });

            // ── CAPTCHA button handlers ──
            captchaSubmit.addEventListener('click', validateCaptchaAndSubmit);

            captchaCancel.addEventListener('click', hideCaptcha);

            captchaRefresh.addEventListener('click', function () {
                captchaAnswer.value = '';
                captchaAnswer.classList.remove('shake');
                generateCaptcha();
                captchaAnswer.focus();
            });

            // Allow Enter key inside CAPTCHA input
            captchaAnswer.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    validateCaptchaAndSubmit();
                }
            });

            // Close modal on overlay click (outside modal)
            captchaOverlay.addEventListener('click', function (e) {
                if (e.target === captchaOverlay) {
                    hideCaptcha();
                }
            });

            // Close modal on Escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && captchaOverlay.classList.contains('active')) {
                    hideCaptcha();
                }
            });
        });
    </script>
</body>

</html>