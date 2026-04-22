(function ($) {
  'use strict';

  // Ensure any previously saved dark preference is cleared
  document.documentElement.classList.remove('dark');
  try { localStorage.removeItem('theme'); } catch (e) {}

  // ---------- Session countdown: absolute 15-min window from login_at (no reset on activity) ----------
  const sess = window.APP_SESSION || {};
  const $idlePill  = $('#idleTimer');
  const $idleValue = $('#idleTimerValue');

  if (sess.loginAt && sess.lifetime && $idleValue.length) {
    const serverRemainingSec = Math.max(0, sess.lifetime - (sess.now - sess.loginAt));
    const deadline = Date.now() + serverRemainingSec * 1000;
    let redirected = false;

    function tickSession() {
      const msLeft = Math.max(0, deadline - Date.now());
      const secs = Math.ceil(msLeft / 1000);
      const mm = String(Math.floor(secs / 60)).padStart(2, '0');
      const ss = String(secs % 60).padStart(2, '0');
      $idleValue.text(`${mm}:${ss}`);

      $idlePill
        .toggleClass('border-red-200 bg-red-50 text-red-700 animate-pulse', msLeft <= 2 * 60 * 1000)
        .toggleClass('border-border bg-white text-slate-600',               msLeft >  2 * 60 * 1000);

      if (msLeft <= 0 && !redirected) {
        redirected = true;
        window.location.href = 'logout.php';
      }
    }

    tickSession();
    setInterval(tickSession, 1000);
  }

  // ---------- Column definitions (match <thead> after S.No) ----------
  const COLS = [
    'name', 'email', 'phone', 'project_name', 'detect_device', 'City__c', 'last_updated_time'
  ];

  const escape = (v) => v == null ? '' : String(v)
    .replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;')
    .replace(/"/g,'&quot;').replace(/'/g,'&#39;');

  const cell = (v) => {
    const s = v == null ? '' : String(v);
    const safe = escape(s);
    return s.length > 40 ? `<span title="${safe}">${safe.slice(0,40)}…</span>` : safe;
  };

  // ---------- Filters ----------
  function currentFilters() {
    const f = {};
    $('#filters').serializeArray().forEach(p => {
      if (p.value !== '') f[p.name] = p.value;
    });
    return f;
  }

  // ---------- DataTable init ----------
  const dateCell = (v) => {
    if (!v) return '';
    const d = new Date(String(v).replace(' ', 'T'));
    if (isNaN(d.getTime())) return cell(v);
    return d.toLocaleDateString('en-IN', { day: 'numeric', month: 'short', year: 'numeric' });
  };

  const table = $('#leads_table').DataTable({
    processing: true,
    serverSide: true,
    deferRender: true,
    pageLength: 25,
    lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
    order: [[7, 'desc']], // Date column (last visible)
    ajax: {
      url: 'api/leads.php',
      type: 'GET',
      data: (d) => {
        // Send the actual column NAME for sorting, not the visible index.
        if (d.order && d.order[0] && d.columns && d.columns[d.order[0].column]) {
          d.order_col = d.columns[d.order[0].column].data || '';
        }
        Object.assign(d, currentFilters());
        return d;
      },
      error: (xhr) => {
        if (xhr.status === 401) window.location.href = 'login.php';
      },
    },
    columns: [
      { data: null, orderable: false, searchable: false,
        render: (_d, _t, _r, meta) => meta.settings._iDisplayStart + meta.row + 1 },
      ...COLS.map(name => ({
        data: name,
        orderable: true,
        searchable: true,
        render: (data) => name === 'last_updated_time' ? dateCell(data) : cell(data),
      })),
    ],
    drawCallback: function (settings) {
      const info = this.api().page.info();
      $('#rowHint').text(
        info.recordsTotal === 0 ? 'No leads yet' :
        `Showing ${info.start + 1}–${info.end} of ${info.recordsDisplay.toLocaleString()} (total ${info.recordsTotal.toLocaleString()})`
      );
    },
  });

  // ---------- Lead detail modal ----------
  const LABELS = {
    detect_device: 'Device Type', detect_device_name: 'Device Name',
    City__c: 'City', Country__c: 'Country', Browser__c: 'Browser', Operating_System__c: 'Operating System',
    name: 'Name', email: 'Email', phone: 'Phone',
    date_schedule: 'Site Visit Date', location: 'Location',
    min_budget: 'Min Budget', max_budget: 'Max Budget',
    reasons_for_purchase: 'Purchase Reason', current_residential_status: 'Residential Status',
    unit_configurations: 'Unit Configuration', message: 'Message',
    project_name: 'Project', form_name: 'Form', last_updated_time: 'Submitted At',
    page_url: 'Page URL',
    PrimarySource: 'Primary Source', SecondarySource: 'Secondary Source',
    TertiarySource: 'Tertiary Source', SubSource: 'Sub Source',
    Campaign: 'Campaign', ADCampaignID: 'Ad Campaign ID', AdSetID: 'AdSet ID', AdID: 'Ad ID',
    Device: 'Ad Device', Placement: 'Placement', GCLID: 'GCLID', ip_address: 'IP Address',
  };

  const ICO = {
    building: '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V7l7-4 7 4v14M9 9h.01M9 13h.01M9 17h.01M15 9h.01M15 13h.01M15 17h.01"/></svg>',
    wallet:   '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"/><path d="M3 5v14a2 2 0 0 0 2 2h16v-5"/><path d="M18 12a2 2 0 0 0 0 4h4v-4h-4z"/></svg>',
    device:   '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    compass:  '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polygon points="16.24,7.76 14.12,14.12 7.76,16.24 9.88,9.88 16.24,7.76"/></svg>',
    megaphone:'<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/></svg>',
    mail:     '<svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="22,6 12,13 2,6"/></svg>',
    phone:    '<svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
    copy:     '<svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>',
  };

  const SECTIONS = [
    { title: 'Project & Requirement', icon: ICO.building,
      fields: ['project_name','form_name','date_schedule','location','message'] },
    { title: 'Budget & Preferences', icon: ICO.wallet,
      fields: ['min_budget','max_budget','reasons_for_purchase','current_residential_status','unit_configurations'] },
    { title: 'Device & Geography', icon: ICO.device,
      fields: ['detect_device','detect_device_name','Browser__c','Operating_System__c','City__c','Country__c','ip_address'] },
    { title: 'Source Attribution', icon: ICO.compass,
      fields: ['PrimarySource','SecondarySource','TertiarySource','SubSource'] },
    { title: 'Campaign & Page', icon: ICO.megaphone,
      fields: ['Campaign','ADCampaignID','AdSetID','AdID','Device','Placement','GCLID','page_url'] },
  ];

  const fmtBudget = (v) => {
    const n = Number(v);
    if (!isFinite(n) || n === 0) return null;
    return '₹' + n.toLocaleString('en-IN');
  };
  const fmtDateTime = (v) => {
    if (!v) return null;
    const d = new Date(v.replace(' ', 'T'));
    if (isNaN(d.getTime())) return String(v);
    return d.toLocaleString('en-IN', { day:'numeric', month:'short', year:'numeric', hour:'2-digit', minute:'2-digit' });
  };
  const fmtDate = (v) => {
    if (!v) return null;
    const d = new Date(v);
    if (isNaN(d.getTime())) return String(v);
    return d.toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' });
  };
  const truncate = (s, n) => (String(s).length > n ? String(s).slice(0, n) + '…' : String(s));

  const formatValue = (key, v) => {
    if (v == null || v === '') return '<span class="text-slate-300">—</span>';
    if (key === 'min_budget' || key === 'max_budget') {
      const f = fmtBudget(v);
      return f ? `<span class="font-semibold text-emerald-700">${escape(f)}</span>` : `<span class="text-slate-300">—</span>`;
    }
    if (key === 'last_updated_time') return escape(fmtDateTime(v) || v);
    if (key === 'date_schedule')     return escape(fmtDate(v) || v);
    if (key === 'email') return `<a href="mailto:${escape(v)}" class="text-primary hover:underline">${escape(v)}</a>`;
    if (key === 'phone') return `<a href="tel:${escape(v)}" class="text-primary hover:underline">${escape(v)}</a>`;
    if (key === 'page_url') {
      return `<a href="${escape(v)}" target="_blank" rel="noopener" class="text-primary hover:underline break-all" title="${escape(v)}">${escape(truncate(v, 80))}</a>`;
    }
    if (key === 'message') return `<span class="block whitespace-pre-wrap">${escape(v)}</span>`;
    return escape(String(v));
  };

  const initialsOf = (name) => {
    if (!name) return '?';
    return String(name).trim().split(/\s+/).map(s => s[0]).slice(0, 2).join('').toUpperCase() || '?';
  };

  function buildHero(row) {
    const name = row.name || 'Unknown Lead';
    const chips = [];
    if (row.email) chips.push(`<a href="mailto:${escape(row.email)}" class="inline-flex items-center gap-1.5 rounded-md border border-border bg-white px-2.5 py-1 text-xs font-medium text-slate-700 hover:bg-accent transition">${ICO.mail}${escape(row.email)}</a>`);
    if (row.phone) chips.push(`<a href="tel:${escape(row.phone)}" class="inline-flex items-center gap-1.5 rounded-md border border-border bg-white px-2.5 py-1 text-xs font-medium text-slate-700 hover:bg-accent transition">${ICO.phone}${escape(row.phone)}</a>`);
    const projChip = row.project_name
      ? `<span class="inline-flex items-center gap-1.5 rounded-full bg-violet-100 text-violet-800 px-2.5 py-1 text-xs font-semibold">${escape(row.project_name)}</span>`
      : '';
    const formChip = row.form_name
      ? `<span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 text-blue-800 px-2.5 py-1 text-xs font-semibold">${escape(row.form_name)}</span>`
      : '';
    return `
      <div class="flex items-start gap-4 pr-10">
        <div class="h-14 w-14 rounded-full bg-gradient-to-br from-primary to-slate-700 text-primary-foreground flex items-center justify-center text-lg font-semibold shrink-0 shadow-sm">
          ${escape(initialsOf(name))}
        </div>
        <div class="min-w-0 flex-1">
          <h2 class="text-xl font-semibold tracking-tight text-foreground truncate">${escape(name)}</h2>
          <div class="mt-1 flex flex-wrap gap-2">${projChip}${formChip}</div>
          <div class="mt-3 flex flex-wrap gap-2">${chips.join('')}</div>
        </div>
      </div>`;
  }

  function buildSections(row) {
    return SECTIONS.map(sec => {
      const items = sec.fields
        .filter(f => row[f] != null && row[f] !== '')
        .map(f => `
          <div class="min-w-0">
            <dt class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">${escape(LABELS[f] || f)}</dt>
            <dd class="mt-1 text-sm text-slate-900 break-words">${formatValue(f, row[f])}</dd>
          </div>`).join('');
      if (!items) return '';
      return `
        <section>
          <h3 class="flex items-center gap-2 text-sm font-semibold text-slate-900 mb-3">
            ${sec.icon}<span>${escape(sec.title)}</span>
          </h3>
          <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 rounded-xl border border-border bg-slate-50/70 p-5">
            ${items}
          </dl>
        </section>`;
    }).join('');
  }

  function buildFooter(row) {
    const when = fmtDateTime(row.last_updated_time) || '—';
    return `
      <div class="flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12,6 12,12 16,14"/></svg>
        <span>Submitted ${escape(when)}</span>
      </div>
      <div class="font-mono">#${escape(String(row.id || '—'))}</div>`;
  }

  function openModal() {
    const $m = $('#rowModal');
    $m.removeClass('hidden');
    // next tick for transition
    requestAnimationFrame(() => $m.removeClass('opacity-0'));
    document.body.style.overflow = 'hidden';
  }
  function closeModal() {
    const $m = $('#rowModal');
    $m.addClass('opacity-0');
    setTimeout(() => $m.addClass('hidden'), 150);
    document.body.style.overflow = '';
  }

  $('#leads_table tbody').on('click', 'tr', function () {
    const row = table.row(this).data();
    if (!row) return;
    $('#rowHero').html(buildHero(row));
    $('#rowBody').html(buildSections(row));
    $('#rowFooter').html(buildFooter(row));
    openModal();
  });
  $('#rowModal').on('click', '[data-close]', closeModal);
  $(document).on('keydown', (e) => { if (e.key === 'Escape' && !$('#rowModal').hasClass('hidden')) closeModal(); });

  // ---------- Filter buttons ----------
  $('#applyFilters').on('click', () => table.ajax.reload());
  $('#filters').on('submit', (e) => { e.preventDefault(); table.ajax.reload(); });
  $('#filters input[name="search"]').on('keypress', (e) => {
    if (e.key === 'Enter') { e.preventDefault(); table.ajax.reload(); }
  });
  $('#resetFilters').on('click', () => { $('#filters')[0].reset(); table.ajax.reload(); });

  // ---------- Export CSV (respects current filters) ----------
  $('#exportCsv').on('click', function (e) {
    const params = $.param(currentFilters());
    this.href = 'api/export.php' + (params ? '?' + params : '');
  });

  // ---------- Stats + sources ----------
  function loadStats() {
    $.getJSON('api/stats.php')
      .fail((xhr) => { if (xhr.status === 401) window.location.href = 'login.php'; })
      .done((resp) => {
      if (!resp || !resp.stats) return;
      $('#stat-today').text(resp.stats.today.toLocaleString());
      $('#stat-week').text(resp.stats.week.toLocaleString());
      $('#stat-month').text(resp.stats.month.toLocaleString());
      $('#stat-total').text(resp.stats.total.toLocaleString());

      const top = (resp.stats.top_sources || []).map(s =>
        `<span class="inline-flex items-center gap-1 rounded-full border border-border bg-white px-3 py-1">
           <strong class="text-foreground">${escape(s.source)}</strong>
           <span class="text-muted-foreground">· ${Number(s.cnt).toLocaleString()}</span>
         </span>`).join('');
      $('#topSources').html(top || '<span>No source data yet.</span>');

      const $src = $('#sourceFilter');
      $src.find('option:not(:first)').remove();
      (resp.sources || []).forEach(s => $src.append(`<option value="${escape(s)}">${escape(s)}</option>`));

      const $proj = $('#projectFilter');
      if ($proj.length) {
        $proj.find('option:not(:first)').remove();
        (resp.projects || []).forEach(p => $proj.append(`<option value="${escape(p)}">${escape(p)}</option>`));
      }
    });
  }
  loadStats();

})(jQuery);
