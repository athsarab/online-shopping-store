/**
 * KIYARAA — Toast Notification System
 *
 * Usage:
 *   kiyaraaToast.success('Title', 'Message');
 *   kiyaraaToast.error('Title', 'Message');
 *   kiyaraaToast.warning('Title', 'Message');
 *   kiyaraaToast.info('Title', 'Message');
 *
 * Auto-reads URL ?msg= and ?msgtype= on page load.
 */
(function () {
    'use strict';

    /* ── Icon SVGs (inline, no external dependency) ───────── */
    var icons = {
        success: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
        error:   '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>',
        warning: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
        info:    '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>'
    };

    /* ── Ensure container exists ───────────────────────────── */
    function getContainer() {
        var c = document.querySelector('.kiyaraa-toast-container');
        if (!c) {
            c = document.createElement('div');
            c.className = 'kiyaraa-toast-container';
            c.setAttribute('aria-live', 'polite');
            document.body.appendChild(c);
        }
        return c;
    }

    /* ── Core show function ────────────────────────────────── */
    function showToast(type, title, message, duration) {
        duration = duration || 4000;

        var toast = document.createElement('div');
        toast.className = 'kiyaraa-toast ' + type;

        toast.innerHTML =
            '<span class="kiyaraa-toast-icon">' + (icons[type] || icons.info) + '</span>' +
            '<div class="kiyaraa-toast-body">' +
                '<div class="kiyaraa-toast-title">' + escapeHtml(title) + '</div>' +
                (message ? '<div class="kiyaraa-toast-message">' + escapeHtml(message) + '</div>' : '') +
            '</div>' +
            '<button class="kiyaraa-toast-close" aria-label="Close">&times;</button>';

        /* Set progress-bar duration to match auto-dismiss */
        toast.style.setProperty('--toast-dur', duration + 'ms');
        var afterStyle = document.createElement('style');
        var toastId = 'toast-' + Date.now();
        toast.id = toastId;
        afterStyle.textContent = '#' + toastId + '::after { animation-duration: ' + duration + 'ms; }';
        toast.appendChild(afterStyle);

        /* Close button */
        toast.querySelector('.kiyaraa-toast-close').addEventListener('click', function () {
            dismissToast(toast);
        });

        getContainer().appendChild(toast);

        /* Trigger reflow then animate in */
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                toast.classList.add('show');
            });
        });

        /* Auto-dismiss */
        var timer = setTimeout(function () { dismissToast(toast); }, duration);
        toast._timer = timer;
    }

    function dismissToast(toast) {
        if (toast._dismissed) return;
        toast._dismissed = true;
        clearTimeout(toast._timer);
        toast.classList.remove('show');
        toast.classList.add('hide');
        setTimeout(function () { toast.remove(); }, 500);
    }

    function escapeHtml(str) {
        if (!str) return '';
        var d = document.createElement('div');
        d.textContent = str;
        return d.innerHTML;
    }

    /* ── Public API ────────────────────────────────────────── */
    window.kiyaraaToast = {
        success: function (title, msg, dur) { showToast('success', title, msg, dur); },
        error:   function (title, msg, dur) { showToast('error',   title, msg, dur); },
        warning: function (title, msg, dur) { showToast('warning', title, msg, dur); },
        info:    function (title, msg, dur) { showToast('info',    title, msg, dur); }
    };

    /* ── Auto-read URL params on page load ─────────────────── */
    /*  ?msg=Account+created+successfully&msgtype=success       */
    document.addEventListener('DOMContentLoaded', function () {
        var params = new URLSearchParams(window.location.search);
        var msg    = params.get('msg');
        var type   = params.get('msgtype') || 'info';
        var title  = params.get('msgtitle') || '';

        if (msg) {
            /* Title defaults based on type */
            if (!title) {
                var defaults = {
                    success: 'Success!',
                    error:   'Oops!',
                    warning: 'Warning',
                    info:    'Info'
                };
                title = defaults[type] || 'Notice';
            }
            showToast(type, title, msg, 5000);

            /* Clean URL so refresh doesn't re-show */
            if (window.history && window.history.replaceState) {
                params.delete('msg');
                params.delete('msgtype');
                params.delete('msgtitle');
                var clean = window.location.pathname;
                var remaining = params.toString();
                if (remaining) clean += '?' + remaining;
                window.history.replaceState({}, '', clean);
            }
        }
    });
})();

