<?php
include('config.php');

$lead_name  = isset($_SESSION['all_data']['name'])  ? $_SESSION['all_data']['name']  : '';
$lead_phone = isset($_SESSION['phone'])              ? $_SESSION['phone']              : '';
$lead_email = isset($_SESSION['all_data']['email'])  ? $_SESSION['all_data']['email']  : '';
$lead_form  = isset($_SESSION['all_data']['form_name']) ? $_SESSION['all_data']['form_name'] : '';
$lead_project = 'TVS Emerald Altura';
$has_session = !empty($lead_phone);
$more_details_done = !empty($_SESSION['more_details_done']);
$fire_datalayer = !empty($_SESSION['fire_datalayer']);
$unit_plans_download = isset($_GET['unitplans']) && $_GET['unitplans'] === 'true';
$unit_plans_pdf_url = 'https://www.tvsemerald.com/wp-content/uploads/2026/04/Tvs-Altura-Unit-Plans-LR.pdf';
$brochure_download = isset($_GET['brochure']) && $_GET['brochure'] === 'true';
$brochure_pdf_url = 'https://www.tvsemerald.com/wp-content/uploads/2026/04/TVS_Altura_Digital_Brochure_2026.pdf';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Thank You | TVS Emerald Altura</title>
    <link rel="icon" type="image/webp" href="assets/images/logo.png">
    <meta name="robots" content="noindex, nofollow">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,300;0,6..72,400;0,6..72,500;0,6..72,600;1,6..72,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        accent: '#AD3703',
                        dark: '#2C2420',
                        cream: '#F7F1E9',
                        'cream-light': '#FAF5ED',
                    },
                    fontFamily: {
                        heading: ['Newsreader', 'Georgia', 'serif'],
                        serif: ['Newsreader', 'Georgia', 'serif'],
                        body: ['Poppins', 'sans-serif'],
                    },
                },
            },
        }
    </script>

    <style>
        body { -webkit-font-smoothing: antialiased; }
        .texture-bg {
            position: absolute; inset: 0;
            background: url('assets/images/1911%207.png') top left repeat;
            background-size: auto; opacity: 0.35; z-index: 0; pointer-events: none;
        }
        select { appearance: none; -webkit-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23AD3703' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat; background-position: right 12px center;
        }
        button[type="submit"] .btn-spinner { display: inline-block; vertical-align: middle; }
        button[type="submit"]:disabled { opacity: 0.8; cursor: not-allowed; }
        #ohsnap { position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 99999; }
        .ohsnap { padding: 12px 24px; border-radius: 8px; color: #fff; font-family: 'Poppins', sans-serif; font-size: 14px; margin-bottom: 8px; min-width: 250px; text-align: center; }
        .ohsnap-red { background: #dc2626; }
        .ohsnap-green { background: #16a34a; }
    </style>
</head>

<body class="bg-cream-light">

    <div id="ohsnap" class="top"></div>

    <?php if ($fire_datalayer): ?>
    <!-- DataLayer Push for Thank You conversion (fires only once) -->
    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event': 'enhanced_lead_altura',
            'enhanced_conversion_data': {
                'name': '<?php echo addslashes($lead_name); ?>',
                'email': '<?php echo addslashes($lead_email); ?>',
                'phone': '<?php echo addslashes($lead_phone); ?>',
                'project': '<?php echo addslashes($lead_project); ?>'
            }
        });
    </script>
    <?php unset($_SESSION['fire_datalayer']); ?>
    <?php endif; ?>

    <?php if ($unit_plans_download): ?>
    <script>
        setTimeout(function () {
            window.location.href = '<?php echo $unit_plans_pdf_url; ?>';
        }, 3000);
    </script>
    <?php endif; ?>

    <?php if ($brochure_download): ?>
    <script>
        setTimeout(function () {
            window.location.href = '<?php echo $brochure_pdf_url; ?>';
        }, 3000);
    </script>
    <?php endif; ?>

    <div class="min-h-screen flex flex-col items-center justify-center relative px-4 py-10">
        <div class="absolute inset-0 z-0">
            <img src="assets/images/hero-banner.png" alt="" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 bg-black/65 z-0"></div>

        <div class="relative z-10 w-full max-w-3xl">
            <!-- Logo -->
            <a href="./" class="block text-center mb-8">
                <img src="assets/images/logo.png" alt="TVS Emerald Altura" class="h-14 mx-auto">
            </a>

            <!-- Main Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row">

                <!-- Left: Thank You Message -->
                <div class="md:w-2/5 flex flex-col items-center justify-center px-8 py-10 text-center text-white" style="background-color: #AD3703;">
                    <div class="w-16 h-16 mb-5 rounded-full border-2 border-white/40 flex items-center justify-center">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <h1 class="font-serif text-3xl font-semibold mb-2">Thank You!</h1>
                    <p class="font-body text-sm text-white/80 leading-relaxed">We will contact you shortly.</p>
                    <hr class="border-white/20 w-16 my-5">
                    <p class="font-body text-xs text-white/60 leading-relaxed">
                        TVS Emerald Altura<br>
                        2 & 3 BHK Apartments<br>
                        Sathanur, Bagalur Main Road
                    </p>
                </div>

                <!-- Right: More Details Form -->
                <div class="md:w-3/5 px-6 py-8 md:px-10 md:py-10">

                    <?php if ($has_session && !$more_details_done): ?>
                    <!-- Form -->
                    <div id="moreDetailsFormWrap">
                        <p class="font-body text-sm text-dark/70 mb-6 leading-relaxed">
                            To serve you better, please share a few more details about your requirements.
                        </p>
                        <form id="moreDetailsForm" action="saveInfo.php" method="POST" novalidate>
                            <input type="hidden" name="form_name" value="More Customer Details">

                            <div class="space-y-4">
                                <input type="text" name="location" placeholder="City of Residence *" required
                                    class="w-full border border-gray-200 rounded-lg px-4 py-3 font-body text-sm text-dark placeholder:text-dark/40 focus:outline-none focus:border-accent transition-colors bg-[#f8f6f3]">

                                <div class="grid grid-cols-2 gap-3">
                                    <input type="text" name="min_budget" placeholder="Min Budget *" required
                                        class="w-full border border-gray-200 rounded-lg px-4 py-3 font-body text-sm text-dark placeholder:text-dark/40 focus:outline-none focus:border-accent transition-colors bg-[#f8f6f3]">
                                    <input type="text" name="max_budget" placeholder="Max Budget *" required
                                        class="w-full border border-gray-200 rounded-lg px-4 py-3 font-body text-sm text-dark placeholder:text-dark/40 focus:outline-none focus:border-accent transition-colors bg-[#f8f6f3]">
                                </div>

                                <select name="reasons_for_purchase" required
                                    class="w-full border border-gray-200 rounded-lg px-4 py-3 font-body text-sm text-dark/40 focus:outline-none focus:border-accent transition-colors bg-[#f8f6f3]">
                                    <option value="">Reason for Purchase *</option>
                                    <option value="Investment - Will Rent it Out">Investment - Will Rent it Out</option>
                                    <option value="Moving in to a Bigger Home">Moving in to a Bigger Home</option>
                                    <option value="Moving in to a Better Location">Moving in to a Better Location</option>
                                    <option value="Moving for a Better Lifestyle">Moving for a Better Lifestyle</option>
                                </select>

                                <select name="current_residential_status" required
                                    class="w-full border border-gray-200 rounded-lg px-4 py-3 font-body text-sm text-dark/40 focus:outline-none focus:border-accent transition-colors bg-[#f8f6f3]">
                                    <option value="">Residential Status *</option>
                                    <option value="Indian">Indian</option>
                                    <option value="NRI">NRI</option>
                                </select>

                                <input type="text" name="unit_configurations" placeholder="Preferred Configuration (e.g. 2 BHK) *" required
                                    class="w-full border border-gray-200 rounded-lg px-4 py-3 font-body text-sm text-dark placeholder:text-dark/40 focus:outline-none focus:border-accent transition-colors bg-[#f8f6f3]">
                            </div>

                            <div class="flex items-center gap-3 mt-6">
                                <button type="submit" class="flex-1 text-white font-body font-semibold text-sm py-3 rounded-full transition-all hover:opacity-90" style="background-color: #AD3703;">
                                    Submit
                                </button>
                                <a href="./" class="font-body text-sm text-dark/50 hover:text-dark transition-colors px-4 py-3">Skip</a>
                            </div>
                        </form>
                    </div>

                    <!-- Success message (shown after form submit) -->
                    <div id="moreDetailsSuccess" class="hidden text-center py-8">
                        <div class="w-14 h-14 mx-auto mb-4 rounded-full flex items-center justify-center bg-green-100">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <p class="font-body text-base text-dark font-semibold mb-1">Details Saved!</p>
                        <p class="font-body text-sm text-dark/60">Thank you for the additional information.</p>
                        <a href="./" class="inline-block mt-5 text-accent font-body font-semibold text-sm underline underline-offset-4 hover:opacity-80">Back to Home</a>
                    </div>

                    <?php elseif ($has_session && $more_details_done): ?>
                    <!-- Already submitted more details -->
                    <div class="text-center py-8">
                        <div class="w-14 h-14 mx-auto mb-4 rounded-full flex items-center justify-center bg-green-100">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <p class="font-body text-base text-dark font-semibold mb-1">Details Already Saved!</p>
                        <p class="font-body text-sm text-dark/60">Thank you for the additional information.</p>
                        <a href="./" class="inline-block mt-5 text-accent font-body font-semibold text-sm underline underline-offset-4 hover:opacity-80">Back to Home</a>
                    </div>

                    <?php else: ?>
                    <!-- No session - direct visit -->
                    <div class="text-center py-8">
                        <p class="font-body text-base text-dark/70 mb-6 leading-relaxed">
                            Thank you for your interest in TVS Emerald Altura.
                        </p>
                        <a href="./" class="inline-block text-white font-body font-semibold text-sm px-10 py-3 rounded-full transition-all hover:opacity-90" style="background-color: #AD3703;">
                            Back to Home
                        </a>
                    </div>
                    <?php endif; ?>

                </div>
            </div>

            <p class="font-body text-xs text-white/50 mt-6 text-center">
                &copy; <?php echo date('Y'); ?> TVS Emerald. All Rights Reserved.
            </p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/justindomingue/ohSnap@master/ohsnap.js"></script>

    <?php if ($has_session): ?>
    <script>
    $(function() {
        $('#moreDetailsForm').validate({
            rules: {
                location: { required: true },
                min_budget: { required: true },
                max_budget: { required: true },
                reasons_for_purchase: { required: true },
                current_residential_status: { required: true },
                unit_configurations: { required: true }
            },
            highlight: function(el) { $(el).addClass('!border-red-400'); },
            unhighlight: function(el) { $(el).removeClass('!border-red-400'); },
            errorPlacement: function() { return true; },
            submitHandler: function(formElement) {
                var $btn = $(formElement).find('[type="submit"]');
                var btnHtml = $btn.html();
                $btn.css('min-width', $btn.outerWidth() + 'px');
                $btn.html('<svg class="btn-spinner" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none" stroke-dasharray="31.4 31.4" stroke-linecap="round"><animateTransform attributeName="transform" type="rotate" dur="0.8s" from="0 12 12" to="360 12 12" repeatCount="indefinite"/></circle></svg>');
                $btn.prop('disabled', true);

                $.ajax({
                    url: formElement.action,
                    type: 'POST',
                    data: $(formElement).serialize(),
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                        $btn.html(btnHtml).prop('disabled', false).css('min-width', '');
                        if (data && data.response && data.response.code === 10) {
                            $('#moreDetailsFormWrap').addClass('hidden');
                            $('#moreDetailsSuccess').removeClass('hidden');
                        } else {
                            ohSnap('Failed to save details. Please try again.', { color: 'red' });
                        }
                    },
                    error: function() {
                        $btn.html(btnHtml).prop('disabled', false).css('min-width', '');
                        ohSnap('Server error. Please try again.', { color: 'red' });
                    }
                });
                return false;
            }
        });

        // Fix select color on change
        $('select').on('change', function() {
            $(this).css('color', this.value ? '#2C2420' : '');
        });
    });
    </script>
    <?php endif; ?>

</body>

</html>
