<?php
$utm_source = $utm_campaign = $utm_term = $utm_medium = $utm_content = '';
foreach ($_GET as $key => $value) {
  if (strtolower($key) == 'utm_source')
    $utm_source = $_GET[$key];
  elseif (strtolower($key) == 'utmsource')
    $utm_source = $_GET[$key];
  if (strtolower($key) == 'utm_campaign')
    $utm_campaign = $_GET[$key];
  elseif (strtolower($key) == 'utmcampaign')
    $utm_campaign = $_GET[$key];
  if (strtolower($key) == 'utm_medium')
    $utm_medium = $_GET[$key];
  elseif (strtolower($key) == 'utmmedium')
    $utm_medium = $_GET[$key];
  if (strtolower($key) == 'utm_term')
    $utm_term = $_GET[$key];
  elseif (strtolower($key) == 'utmterm')
    $utm_term = $_GET[$key];
  if (strtolower($key) == 'utm_content')
    $utm_content = $_GET[$key];
  elseif (strtolower($key) == 'utmcontent')
    $utm_content = $_GET[$key];
}
$utm_matchtype = (isset($_GET['matchtype']) ? $_GET['matchtype'] : '');
$utm_keyword = (isset($_GET['keyword']) ? $_GET['keyword'] : '');
$srd = (isset($_GET['srd']) ? $_GET['srd'] : '');
$original_referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
// SalesForce UTM
$sub_source = (isset($_GET['sub_source']) ? $_GET['sub_source'] : '');
$p_s = (isset($_GET['p_s']) ? $_GET['p_s'] : 'Digital');
$se_s = (isset($_GET['se_s']) ? $_GET['se_s'] : 'Website');
$t_s = (isset($_GET['t_s']) ? $_GET['t_s'] : 'LP Leads');
// SalesForce UTM
// SalesForce UTM
$ADCampaignID = (isset($_GET['ADCampaignID']) ? $_GET['ADCampaignID'] : '');
$AdSetID = (isset($_GET['AdSetID']) ? $_GET['AdSetID'] : '');
$AdID = (isset($_GET['AdID']) ? $_GET['AdID'] : '');
$utm_device = (isset($_GET['device']) ? $_GET['device'] : '');
$utm_placement = (isset($_GET['Placement']) ? $_GET['Placement'] : '');
$gclid = (isset($_GET['gclid']) ? $_GET['gclid'] : '');
// SalesForce UTM
$utmctr = (isset($_GET['utmctr']) ? $_GET['utmctr'] : '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>TVS Emerald Altura</title>
  <meta name="robots" content="index, follow">

  <!-- Optional: ICO fallback -->
  <link rel="icon" href="./favicon/favicon.ico" type="image/x-icon">
  
  <link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96" />
  
  <link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
  
  <link rel="shortcut icon" href="/favicon/favicon.ico" />
  
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
  
  <link rel="manifest" href="/favicon/site.webmanifest" />
  
  <script src="https://cdn.tailwindcss.com"></script>
  
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Caudex:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@400;500;600&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Outfit:wght@400&family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'tvs-red': '#b1381f',
            'tvs-dark': '#2c2c2c',
            'tvs-cream': '#f9f5ec',
            'tvs-warmwhite': '#fff8ed',
            'tvs-salmon': 'rgba(177, 56, 31, 0.5)',
          },
          fontFamily: {
            'display': ['Newsreader', 'serif'],
            'body': ['Inter', 'sans-serif'],
            'caudex': ['Caudex', 'serif'],
            'poppins': ['Poppins', 'sans-serif'],
            'outfit': ['Outfit', 'sans-serif'],
            'newsreader': ['Newsreader', 'serif'],
          }
        }
      }
    }
  </script>

  <!-- Include Owl Carousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
  
  <!-- intl-tel-input plugin for country codes -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.5.3/build/css/intlTelInput.min.css">
  
  <!-- Magnific Popup CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
  
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

  <link rel="stylesheet" href="css/style.css?v=<?php echo mt_rand(); ?>">

  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    
  <style>
    .nav-link.active {
      color: #b1381f;
      /* same as hover color */
      font-weight: 500;
    }
    @keyframes chevronBounce {
      0%, 100% { transform: translateY(0); opacity: 1; }
      50% { transform: translateY(7px); opacity: 0.6; }
    }
    #scroll-down-btn .scroll-chevron-1 { animation: chevronBounce 1.2s ease-in-out infinite; }
    #scroll-down-btn .scroll-chevron-2 { animation: chevronBounce 1.2s ease-in-out infinite 0.22s; }
    @media (width: 1366px) and (height: 551px) {
      #scroll-down-btn { bottom: 60px !important; }
    }
    #sticky-form-panel {
      top: 50%;
      transform: translateX(100%) translateY(-50%);
      transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.4s ease;
      opacity: 0;
      pointer-events: none;
    }

    #sticky-form-panel.open {
      transform: translateX(0) translateY(-50%);
      opacity: 1;
      pointer-events: all;
    }

    .header-transparent {
      background-image: none !important;
      background-color: transparent !important;
    }
    .header-transparent #hamburger-btn span {
      background-color: #ffffff;
    }
    .header-transparent .nav-link {
      color: #ffffff !important;
      filter: drop-shadow(2px 4px 2px black);
    }
    .header-transparent .contact-btn {
      background-color: rgb(0 0 0 / 29%);
      backdrop-filter: blur(4px);
    }
    /* Scrolled state: dark text and icons */
    #main-header:not(.header-transparent) .nav-link {
      color: #2c2b2b !important;
    }
    #main-header:not(.header-transparent) #hamburger-btn span {
      background-color: #2c2c2c;
    }
    #main-header:not(.header-transparent) .contact-btn {
      background-color: #2c2c2c;
    }

    #sticky-form-tab {
      transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      transform: rotate(-90deg);
      right: -50px;
    }

    #sticky-form-tab.hidden-tab {
      transform: rotate(-90deg) translateY(100%);
      opacity: 0;
      pointer-events: none;
    }
  </style>

</head>

<body>

  <!-- ============================================= -->
  <!-- SECTION 1: HEADER / NAVIGATION -->
  <!-- ============================================= -->
  <header id="main-header" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 header-transparent">
    <div
      class="max-w-[1440px] mx-auto flex items-center justify-between px-[16px] md:px-[32px] lg:px-[20px] h-[60px] md:h-[60px]">
      <!-- Logo -->
      <div class="w-[70px] h-[52px] md:w-[100px] md:h-[50px] flex-shrink-0">
        <img id="header-logo" src="assets/images/tvs-altura-white-logo.png" alt="TVS Altura" class="w-full h-full object-contain transition-all duration-300">
      </div>

      <!-- Nav Links (hidden on mobile/tablet) -->
      <nav class="hidden xl:flex flex-1 justify-center items-center gap-[10px] xl:gap-[20px]">
        <!-- <a href="#about" class="nav-link text-white text-[12px] xl:text-[13px] font-body leading-[24px] whitespace-nowrap transition-colors duration-300">About Altura</a> -->
        <a href="#highlights" class="nav-link text-white text-[12px] xl:text-[13px] font-body leading-[24px] whitespace-nowrap transition-colors duration-300">Project Highlights</a>
        <a href="#location-highlights" class="nav-link text-white text-[12px] xl:text-[13px] font-body leading-[24px] whitespace-nowrap transition-colors duration-300">Location Highlights</a>
        <a href="#amenities" class="nav-link text-white text-[12px] xl:text-[13px] font-body leading-[24px] whitespace-nowrap transition-colors duration-300">Key Project Features</a>
        <a href="#clubhouse" class="nav-link text-white text-[12px] xl:text-[13px] font-body leading-[24px] whitespace-nowrap transition-colors duration-300">Clubhouse Amenities</a>
        <a href="#masterplan" class="nav-link text-white text-[12px] xl:text-[13px] font-body leading-[24px] whitespace-nowrap transition-colors duration-300">Master Plan</a>
        <!-- <a href="#gallery" class="nav-link text-white text-[12px] xl:text-[13px] font-body leading-[24px] whitespace-nowrap transition-colors duration-300">Gallery</a>
        <a href="#location" class="nav-link text-white text-[12px] xl:text-[13px] font-body leading-[24px] whitespace-nowrap transition-colors duration-300">Location Map</a> -->
      </nav>

      <div class="flex items-center gap-[12px] flex-shrink-0">
        <!-- Contact Button - full on desktop, icon-only on mobile -->
        <button id="call-me-btn"
        class="contact-btn flex items-center gap-[7px] bg-[#2c2c2c] text-white rounded-full px-[12px] py-[10px] md:px-[24px] md:py-[10px] text-[14px] lg:text-[15px] font-body font-medium leading-[24px] hover:bg-[#1a1a1a] transition-all duration-300 whitespace-nowrap cursor-pointer border-none outline-none">
        <img src="assets/images/contact-icon.svg" alt="" class="w-[16px] h-[16px]">
        <span>Call Me Now!</span>
      </button>
      <a href="tel:+918069236652"
        class="contact-btn hidden xl:flex items-center gap-[7px] bg-[#2c2c2c] text-white rounded-full px-[24px] py-[10px] text-[15px] font-body font-medium leading-[24px] hover:bg-[#1a1a1a] transition-all duration-300 whitespace-nowrap no-underline">
        <img src="assets/images/contact-icon.svg" alt="" class="w-[16px] h-[16px]">
        <span>+91 80692 36652</span>
      </a>

        <!-- Hamburger Button (visible on mobile/tablet) -->
        <button id="hamburger-btn"
          class="xl:hidden flex flex-col justify-center items-center w-[36px] h-[36px] gap-[5px] cursor-pointer">
          <span class="block w-[22px] h-[2px] bg-white transition-all duration-300"></span>
          <span class="block w-[22px] h-[2px] bg-white transition-all duration-300"></span>
          <span class="block w-[22px] h-[2px] bg-white transition-all duration-300"></span>
        </button>
      </div>
    </div>
  </header>

  <!-- Mobile Menu Overlay -->
  <div id="mobile-menu-overlay" class="mobile-menu-overlay"></div>

  <!-- Mobile Slide-out Menu -->
  <div id="mobile-menu" class="mobile-menu">
    <button id="mobile-menu-close" class="mobile-menu-close">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M18 6L6 18M6 6l12 12" stroke="#2c2c2c" stroke-width="2" stroke-linecap="round" />
      </svg>
    </button>
    <a href="#about" class="mobile-nav-link">About Altura</a>
    <a href="#highlights" class="mobile-nav-link">Project Highlights</a>
    <a href="#location-highlights" class="mobile-nav-link">Location Highlights</a>
    <a href="#amenities" class="mobile-nav-link">Key Project Features</a>
    <a href="#clubhouse" class="mobile-nav-link">Clubhouse Amenities</a>
    <a href="#masterplan" class="mobile-nav-link">Master Plan</a>
    <a href="#gallery" class="mobile-nav-link">Gallery</a>
    <a href="#location-highlights" class="mobile-nav-link">Location</a>
    <button class="mobile-call-me-btn flex items-center justify-center gap-[7px] bg-[#2c2c2c] text-white rounded-full px-[24px] py-[10px] text-[15px] font-body font-medium leading-[24px] hover:bg-[#1a1a1a] transition-all duration-300 whitespace-nowrap cursor-pointer border-none outline-none mt-[10px] w-full">
      <img src="assets/images/contact-icon.svg" alt="" class="w-[16px] h-[16px]">
      <span>Call Me Now!</span>
    </button>
  </div>


  <!-- ============================================= -->
  <!-- SECTION 2: HERO -->
  <!-- ============================================= -->
  <section id="hero" class="relative w-full mt-0">
    <div class="w-full">

      <!-- Banner Image Container — full height on mobile, fixed on desktop -->
      <div id="banner-wrapper" class="relative w-full h-[calc(100vh-280px)] md:h-[calc(100vw*9/16)] md:max-h-[calc(100vh-18px)] md:overflow-hidden flex flex-col">

        <!-- Background Video — Mobile -->
        <video class="absolute inset-0 w-full h-full object-cover md:hidden" autoplay muted loop playsinline>
          <source src="assets/videos/Video Banners-Mobile.mp4" type="video/mp4">
        </video>
        <!-- Background Video — Desktop -->
        <video class="absolute inset-0 w-full h-full object-cover hidden md:block" autoplay muted loop playsinline>
          <source src="assets/videos/Video Banners-Website.mp4" type="video/mp4">
        </video>
        <span class="absolute bottom-0 lg:bottom-[80px] right-[15px] text-white text-[10px] font-body opacity-80 z-10">Artistic
          Impression. Not an actual Site Image</span>
        <!-- Gradient Overlay -->
        <div class="absolute inset-0"
          style="background: linear-gradient(136.2deg, rgb(0 0 0 / 9%) 32.06%, rgba(102, 102, 102, 0.3) 123.22%);"></div>

        <!-- Hero Content (heading + desktop cards) -->
        <div id="banner-content"
          class="relative z-10 flex-1 flex flex-col justify-end items-start pt-[76px] pb-[15px] px-[16px] md:px-[32px] lg:px-[50px]">
          <div class="text-left w-full md:w-[600px] lg:w-[660px]">
            <h1
              class="font-blacker text-[26px] md:text-[36px] lg:text-[34px] text-white tracking-[-0.48px] leading-normal mb-[8px] md:mb-[10px] drop-shadow-[0_2px_6px_rgba(0,0,0,0.5)]">
              An Illustrious Life at the Centre of Everything
            </h1>
          </div>
          <!-- Info Cards — desktop only -->
          <div class="hidden md:flex md:flex-row items-stretch gap-[15px] lg:gap-[20px] w-full md:w-auto">
            <div class="glass-card rounded-[16px] w-auto px-[14px] py-[10px] flex flex-col justify-center">
              <p class="font-body font-medium text-[10px] text-white/70 tracking-[1px] uppercase mb-[4px]">CONFIGURATION</p>
              <p class="font-body font-bold text-[13px] text-white leading-[18px]">2 & 3 BHK Apartments</p>
            </div>
            <div class="glass-card rounded-[16px] w-auto px-[14px] py-[10px] flex flex-col justify-center">
              <p class="font-body font-medium text-[10px] text-white/70 tracking-[1px] uppercase mb-[4px]">EOI STARTING AT</p>
              <p class="font-body font-bold text-[13px] text-white leading-[18px]">₹1.58 Cr* Onwards</p>
            </div>
            <div class="glass-card rounded-[16px] w-auto px-[14px] py-[10px] flex flex-col justify-center">
              <p class="font-body font-medium text-[10px] text-white/70 tracking-[1px] uppercase mb-[4px]">LOCATION</p>
              <p class="font-body font-bold text-[13px] text-white leading-[18px] md:w-[180px] lg:w-[203px]">Sathanur, Bagalur Main Road, North Bangalore</p>
            </div>
          </div>
        </div>

        <!-- Hero Form — flows at bottom, no overlap -->
        <div id="banner_form" class="banner-form hidden rounded-[0px] md:block relative z-10 w-full">
          <div class=" md:px-[16.5px] md:pt-[15px] md:pb-[8px] w-full">
            <form id="bannerForm" method="post" action="saveInfo.php" class="flex flex-col md:flex-row md:flex-wrap xl:flex-nowrap md:justify-center xl:justify-start items-stretch md:items-center gap-[12px] md:gap-[18px] w-full">
              <input type="hidden" name="form_name" value="banner-form">
              <!-- UTM Data -->
              <input type="hidden" name="project" value="TVS Emerald Altura" />
              <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>" />
              <input type="hidden" name="utm_term" value="<?php echo $utm_term; ?>" />
              <input type="hidden" name="utm_medium" value="<?php echo $utm_medium; ?>" />
              <input type="hidden" name="utm_content" value="<?php echo $utm_content; ?>" />
              <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign; ?>" />
              <input type="hidden" name="matchtype" value="<?php echo $utm_matchtype; ?>" />
              <input type="hidden" name="keyword" value="<?php echo $utm_keyword; ?>" />
              <input type="hidden" name="device" value="<?php echo $utm_device; ?>" />
              <input type="hidden" name="placement" value="<?php echo $utm_placement; ?>" />
              <input type="hidden" name="pageUrl"
                value='<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' />
              <!-- New -->
              <input type="hidden" name="gclid" value="<?php echo $gclid; ?>" />
              <input type="hidden" name="original_referrer" value="<?php echo $original_referrer; ?>" />
              <input type="hidden" name="utmctr" value="<?php echo $utmctr; ?>" />
              <!-- New -->
              <!-- SalesForce -->
              <input type="hidden" name="sub_source" value="<?php echo $sub_source; ?>" />
              <input type="hidden" name="p_s" value="<?php echo $p_s; ?>" />
              <input type="hidden" name="se_s" value="<?php echo $se_s; ?>" />
              <input type="hidden" name="t_s" value="<?php echo $t_s; ?>" />
              <!-- SalesForce -->
              <!-- Extra SalesForce -->
              <input type="hidden" name="ADCampaignID" value="<?php echo $ADCampaignID; ?>" />
              <input type="hidden" name="AdSetID" value="<?php echo $AdSetID; ?>" />
              <input type="hidden" name="AdID" value="<?php echo $AdID; ?>" />
              <!-- Extra SalesForce -->
              <input type="hidden" name="detect_device" value="" />
              <input type="hidden" name="detect_device_name" value="" />
              <input type="hidden" name="City__c" value="" />
              <input type="hidden" name="Country__c" value="" />
              <input type="hidden" name="Browser__c" value="" />
              <input type="hidden" name="Operating_System__c" value="" />
              <!-- UTM Data -->
              <div class="grid grid-cols-1 md:grid-cols-3 gap-[12px] md:gap-[12px] min-w-0 md:w-full xl:w-auto xl:flex-1">
                <div class="form-group w-full flex min-w-0">
                  <input type="text" placeholder="Name: *" name="name"
                    class="w-full min-w-0 bg-white border border-[#c8c8c8] md:border-[#a0a0a0] text-[14px] text-black font-body py-[11px] md:py-[8px] px-[14px] md:px-[8px] outline-none placeholder:text-gray-400">
                </div>
                <div class="form-group w-full flex min-w-0">
                  <input type="tel" placeholder="Phone: *" name="phone"
                    class="phone-input w-full min-w-0 bg-white border border-[#c8c8c8] md:border-[#a0a0a0] text-[14px] text-black font-body py-[11px] md:py-[8px] px-[14px] md:px-[8px] outline-none placeholder:text-gray-400">
                </div>
                <div class="form-group w-full flex min-w-0">
                  <input type="email" placeholder="Email: *" name="email"
                    class="w-full min-w-0 bg-white border border-[#c8c8c8] md:border-[#a0a0a0] text-[14px] text-black font-body py-[11px] md:py-[8px] px-[14px] md:px-[8px] outline-none placeholder:text-gray-400">
                </div>
              </div>
              <div class="flex-shrink-0 flex items-start md:items-center gap-2 w-full md:w-auto mt-[4px] md:mt-0">
                <input type="checkbox" id="heroPrivacy" name="privacy" required checked class="accent-tvs-red mt-[2px] md:mt-0">
                <label for="heroPrivacy"
                  class="font-body text-[10px] md:text-[11px] text-[#4b4b4b] md:text-tvs-dark/60 leading-tight w-full md:max-w-[320px] xl:max-w-[280px]">
                  I have read and understood the <a href="javascript:void(0)" onclick="openPrivacyModal()"
                    class="text-tvs-red underline">Privacy Policy</a>. By registering here, I agree to TVS Emerald's <a
                    href="javascript:void(0)" onclick="openPrivacyModal()"
                    class="text-tvs-red underline">Terms and Conditions</a>.
                </label>
              </div>
              <button type="submit"
                class="bg-tvs-red text-white font-poppins text-[15px] md:text-[14px] tracking-[0.42px] px-[32px] py-[11px] md:py-[7px] rounded-[9px] md:rounded-none hover:bg-[#9a2f19] transition-colors md:h-[38px] flex items-center justify-center shrink-0 w-full md:w-auto font-semibold">Submit</button>
            </form>
          </div>
        </div>

      </div>

      <!-- Info Cards — mobile only, below image -->
      <div class="flex flex-col gap-[12px] px-[16px] py-[24px] md:hidden">
        <div class="flex gap-[8px]">
          <div class="rounded-[12px] flex-1 h-[64px] flex flex-col justify-center pl-[14px]"
            style="background:rgba(0,0,0,0.05); border:1px solid rgba(0,0,0,0.09);">
            <p class="font-body font-medium text-[9px] text-black/50 tracking-[1px] uppercase mb-[3px]">CONFIGURATION</p>
            <p class="font-body font-bold text-[13px] text-black leading-snug">2 & 3 BHK</p>
          </div>
          <div class="rounded-[12px] flex-1 h-[64px] flex flex-col justify-center pl-[14px]"
            style="background:rgba(0,0,0,0.05); border:1px solid rgba(0,0,0,0.09);">
            <p class="font-body font-medium text-[9px] text-black/50 tracking-[1px] uppercase mb-[3px]">EOI STARTING AT</p>
            <p class="font-body font-bold text-[13px] text-black leading-snug">1.58 Cr* Onwards</p>
          </div>
        </div>
        <div class="rounded-[12px] w-full h-[64px] flex flex-col justify-center pl-[14px]"
          style="background:rgba(0,0,0,0.05); border:1px solid rgba(0,0,0,0.09);">
          <p class="font-body font-medium text-[9px] text-black/50 tracking-[1px] uppercase mb-[3px]">LOCATION</p>
          <p class="font-body font-bold text-[13px] text-black leading-snug">Sathanur, Bagalur Main Road, North Bangalore</p>
        </div>
      </div>

      <!-- Mobile Form — below cards -->
      <div class="banner-form mobile md:hidden mx-[16px] mb-[16px] bg-[#8B2500] rounded-[16px] px-[20px] pt-[22px] pb-[20px]">
        <h2 class="font-newsreader text-[22px] text-white font-semibold text-center mb-[18px]">Enquire Now</h2>
        <div class="flex flex-col gap-[12px]">
          <input type="text" placeholder="Name: *"
            class="w-full bg-white rounded-[8px] border border-[#c8c8c8] text-[14px] text-[#4b4b4b] font-body py-[11px] px-[14px] outline-none placeholder:text-gray-400">

          <input type="tel" placeholder="Phone: *"
            class="phone-input-mobile w-full bg-white rounded-[8px] border border-[#c8c8c8] text-[14px] text-[#4b4b4b] font-body py-[11px] px-[14px] outline-none placeholder:text-gray-400">

          <input type="email" placeholder="Email: *"
            class="w-full bg-white rounded-[8px] border border-[#c8c8c8] text-[14px] text-[#4b4b4b] font-body py-[11px] px-[14px] outline-none placeholder:text-gray-400">

          <div class="flex items-start gap-2">
            <input type="checkbox" id="mobilePrivacy" name="privacy" required checked class="accent-tvs-red mt-[3px]">
            <label for="mobilePrivacy" class="font-body text-[10px] text-white/80 leading-tight">
              I have read and understood the <a href="javascript:void(0)" onclick="openPrivacyModal()"
                class="underline text-white/90">Privacy Policy</a>. By registering here, I agree to TVS Emerald's <a
                href="javascript:void(0)" onclick="openPrivacyModal()"
                class="underline text-white/90">Terms and Conditions</a>.
            </label>
          </div>
          <button type="submit"
            class="bg-white text-tvs-red font-poppins text-[15px] font-semibold py-[11px] rounded-[9px] hover:bg-gray-100 transition-colors w-full">Submit</button>
        </div>
      </div>

    </div>
  </section>


  <!-- ============================================= -->
  <!-- SECTION 3: ABOUT US -->
  <!-- ============================================= -->
  <section id="about" class="relative w-full pt-[30px] xl:pt-0 pb-0 overflow-hidden">
    <div class="max-w-[1280px] mx-auto relative h-auto xl:h-[580px]">

      <!-- Mobile/Tablet: Stacked layout -->
      <div class="flex flex-col items-center xl:hidden px-[16px] md:px-[32px]">

        <!-- First image (top) -->
        <div class="picture-frame mb-[24px] w-[240px] lg:w-[300px] h-[280px] lg:h-[350px]">
          <div class="picture-frame-inner relative">
            <a href="assets/images/about-us/left-side-frame/Club-Cam-big.webp" class="gallery-image-popup">
              <img src="assets/images/about-us/left-side-frame/Club-Cam-small.webp" alt="Modern Architecture" class="w-full h-full object-cover">
              <span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic
                Impression. Not an actual Site Image</span>
            </a>
          </div>
        </div>

        <!-- Text content (middle) -->
        <div class="flex flex-col items-center gap-[20px] w-full max-w-[500px] text-center mb-[24px]">
          <div>
            <h2
              class="font-blacker text-[24px] md:text-[28px] text-black leading-[34px] md:leading-[38px] capitalize mb-[12px]">
              Bringing You An <span class="text-tvs-red">Elevated</span> <span class="text-tvs-red">Living</span> Where
              Everything <span class="text-tvs-red">Connects</span>
            </h2>
            <p class="font-body text-[16px] md:text-[17px] text-[#5a5a5a] leading-[26px] md:leading-[28px]">
              There comes a moment when success is no longer about proving anything. It becomes about recognizing what you have built – the discipline, the ambition, the distance travelled. The next phase is not louder. It is more considered. More reflective of who you have become. TVS Emerald Altura is that natural evolution. A world shaped not around aspiration, but around self-worth. Where space feels intentional. Where calm feels earned. Where every detail acknowledges the life you have already built.
            </p>
            <p class="font-body text-[16px] md:text-[17px] text-[#5a5a5a] leading-[26px] md:leading-[28px] mt-[12px]">
              Here, experience a lifestyle, reserved for the select ones. At TVS Emerald Altura, you can choose from 2 & 3 bed illustrious homes amidst lush greenery. With 35+ lifestyle amenities, you have unlimited avenues for leisure, everyday.
            </p>
          </div>
          <a href="#know-more-popup"
            class="bg-tvs-red text-[#fcfcfc] font-body text-[16px] px-[24px] py-[10.7px] rounded-[9px] hover:bg-[#9a2f19] transition-colors popup-link">
            Know More
          </a>
        </div>

        <!-- Second image (bottom) -->
        <div class="picture-frame" style="width: 300px; height: 350px;">
          <div class="picture-frame-inner relative">
            <a href="assets/images/about-us/right-side-frame/Side-Tower-Big.webp" class="gallery-image-popup">
              <img src="assets/images/about-us/right-side-frame/Side-Tower-Cam-small.webp" alt="Apartment Buildings" class="w-full h-full object-cover">
              <span class="absolute bottom-[6px] right-[6px] text-white text-[9px] font-body opacity-80">Artistic
                Impression. Not an actual Site Image*</span>
            </a>
          </div>
        </div>

      </div>

      <!-- Desktop: Original absolute positioning layout -->
      <!-- Left Framed Image -->
      <div data-aos="fade-up" data-aos-duration="2000" class="hidden xl:block absolute left-[64px] top-[80px] z-10">
        <div class="owl-carousel owl-theme left-frame-slider" style="width: 240px; height: 290px;">
          <div class="item">
            <div class="picture-frame" style="width: 240px; height: 290px;">
              <div class="picture-frame-inner relative">
                <a href="assets/images/about-us/left-side-frame/Club-Cam-big.webp" class="gallery-image-popup">
                  <img src="assets/images/about-us/left-side-frame/Club-Cam-small.webp" alt="Modern Architecture" class="w-full h-full object-cover">
                  <span class="absolute bottom-[4px] left-[6px] text-white text-[8px] font-body opacity-90" style="text-shadow: 0 1px 3px rgba(0,0,0,0.6)">Artistic Impression*</span>
                </a>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="picture-frame" style="width: 240px; height: 290px;">
              <div class="picture-frame-inner relative">
                <a href="assets/images/about-us/left-side-frame/image-01.webp" class="gallery-image-popup">
                  <img src="assets/images/about-us/left-side-frame/image-01-thumbnail.webp" alt="Modern Architecture" class="w-full h-full object-cover">
                  <span class="absolute bottom-[4px] left-[6px] text-white text-[8px] font-body opacity-90" style="text-shadow: 0 1px 3px rgba(0,0,0,0.6)">Artistic Impression*</span>
                </a>
              </div>
            </div>
          </div>          

          <div class="item">
            <div class="picture-frame" style="width: 240px; height: 290px;">
              <div class="picture-frame-inner relative">
                <a href="assets/images/about-us/left-side-frame/image-02.webp" class="gallery-image-popup">
                  <img src="assets/images/about-us/left-side-frame/image-02-thumbnail.webp" alt="Modern Architecture" class="w-full h-full object-cover">
                  <span class="absolute bottom-[4px] left-[6px] text-white text-[8px] font-body opacity-90" style="text-shadow: 0 1px 3px rgba(0,0,0,0.6)">Artistic Impression*</span>
                </a>
              </div>
            </div>
          </div>            
      
          <!-- Add more .item blocks here for additional slides -->
        </div>
      </div>

      <!-- Right Framed Image -->
    <div data-aos="fade-down" data-aos-duration="2000" class="hidden xl:block absolute right-[66px] top-[200px] z-10">
      <div class="owl-carousel owl-theme right-frame-slider" style="width: 240px; height: 290px;">
        <div class="item">
          <div class="picture-frame" style="width: 240px; height: 290px;">
            <div class="picture-frame-inner relative">
              <a href="assets/images/about-us/right-side-frame/Side-Tower-Big.webp" class="gallery-image-popup">
                <img src="assets/images/about-us/right-side-frame/Side-Tower-Cam-small.webp" alt="Apartment Buildings" class="w-full h-full object-cover">
                <span class="absolute bottom-[4px] right-[6px] text-white text-[8px] font-body opacity-90" style="text-shadow: 0 1px 3px rgba(0,0,0,0.6)">Artistic Impression*</span>
              </a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="picture-frame" style="width: 240px; height: 290px;">
            <div class="picture-frame-inner relative">
              <a href="assets/images/about-us/right-side-frame/image-01.webp" class="gallery-image-popup">
                <img src="assets/images/about-us/right-side-frame/image-01-thumbnail.webp" alt="Apartment Buildings" class="w-full h-full object-cover">
                <span class="absolute bottom-[4px] right-[6px] text-white text-[8px] font-body opacity-90" style="text-shadow: 0 1px 3px rgba(0,0,0,0.6)">Artistic Impression*</span>
              </a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="picture-frame" style="width: 240px; height: 290px;">
            <div class="picture-frame-inner relative">
              <a href="assets/images/about-us/right-side-frame/image-02.webp" class="gallery-image-popup">
                <img src="assets/images/about-us/right-side-frame/image-02-thumbnail.webp" alt="Apartment Buildings" class="w-full h-full object-cover">
                <span class="absolute bottom-[4px] right-[6px] text-white text-[8px] font-body opacity-90" style="text-shadow: 0 1px 3px rgba(0,0,0,0.6)">Artistic Impression*</span>
              </a>
            </div>
          </div>
        </div>                
        <!-- Add more .item blocks here for additional slides -->
      </div>
    </div>

      <!-- Center Content (desktop) -->
      <div class="hidden xl:flex absolute left-1/2 -translate-x-1/2 bottom-[60px] z-20 flex-col items-center gap-[16px] w-[560px]">
        <div data-aos="zoom-in" data-aos-duration="2000" class="text-center px-8">
          <h2 class="font-blacker text-[30px] text-black leading-[40px] capitalize mb-[12px]">
            Bringing You <span class="text-tvs-red">Elevated</span> <span class="text-tvs-red">Living</span> Where
            Everything <span class="text-tvs-red">Connects</span>
          </h2>
          <p class="font-body text-[15px] text-[#5a5a5a] leading-[26px]">
            There comes a moment when success is no longer about proving anything. It becomes about recognising what you have built – the discipline, the ambition, the distance travelled. The next phase is not louder. It is more considered. More reflective of who you have become. TVS Emerald Altura is that natural evolution. A world shaped not around aspiration, but around self-worth. Where space feels intentional. Where calm feels earned. Where every detail acknowledges the life you have already built.
          </p>
          <p class="font-body text-[15px] text-[#5a5a5a] leading-[26px] mt-[12px]">
            Here, experience a lifestyle reserved for the select ones. At TVS Emerald Altura, you can choose from 2 & 3 bed illustrious homes amidst lush greenery. With 35+ lifestyle amenities, you have unlimited avenues for leisure, every day.
          </p>
        </div>
        <a data-aos="zoom-in" data-aos-duration="2000" href="#know-more-popup" class="bg-tvs-red text-[#fcfcfc] font-body text-[13px] px-[18px] py-[8px] rounded-[7px] hover:bg-[#9a2f19] transition-colors popup-link">
          Know More
        </a>
      </div>
    </div>
  </section>


  <!-- ============================================= -->
  <!-- SECTION 4: PROJECT HIGHLIGHTS -->
  <!-- ============================================= -->
  <section id="highlights" class="relative w-full py-[30px] md:py-[40px]">
    <div class="relative z-10 max-w-[1200px] mx-auto px-0 sm:px-4 lg:px-8">
      <div class="text-center mb-8 md:mb-12 px-4 sm:px-0">
        <h2 class="font-blacker text-[26px] md:text-[30px] lg:text-[32px] text-black capitalize">Project Highlights</h2>
      </div>

      <div id="highlightsGrid">
        <!-- Card 1: Finest Lifestyle of Sathanur -->
        <div class="highlight-panel relative overflow-hidden">
          <img src="assets/images/Project-highlights/project-highlights-1.webp" alt="Finest Lifestyle of Sathanur" class="highlight-panel__img absolute inset-0 w-full h-full object-cover" loading="lazy">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
          <p class="absolute bottom-1 right-3 z-10 font-body text-[7px] text-white/40 italic">Artistic Impression. Not an Actual Site Image.</p>
          <div class="absolute inset-0 z-10 flex flex-col justify-end p-6">
            <h3 class="font-body text-lg font-semibold text-white">Finest Lifestyle of Sathanur</h3>
            <p class="font-body text-[12px] text-white/80 mt-1">10+ acres. 12 towers. 2 basements + ground + 12 floors. 2 & 3 BHK homes</p>
          </div>
        </div>
        <!-- Card 2: Finest Homes of North Bengaluru -->
        <div class="highlight-panel relative overflow-hidden">
          <img src="assets/images/Project-highlights/project-highlights-2.webp" alt="Finest Homes of North Bengaluru" class="highlight-panel__img absolute inset-0 w-full h-full object-cover" loading="lazy">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
          <p class="absolute bottom-1 right-3 z-10 font-body text-[7px] text-white/40 italic">Artistic Impression. Not an Actual Site Image.</p>
          <div class="absolute inset-0 z-10 flex flex-col justify-end p-6">
            <h3 class="font-body text-lg font-semibold text-white">Located on Bagalur Main Road</h3>
            <p class="font-body text-[12px] text-white/80 mt-1">Prime location. Just 30 mins from Kempegowda International Airport</p>
          </div>
        </div>
        <!-- Card 3: 35+ Lifestyle Amenities -->
        <div class="highlight-panel relative overflow-hidden">
          <img src="assets/images/Project-highlights/swimming-pool.webp" alt="35+ Lifestyle Amenities" class="highlight-panel__img absolute inset-0 w-full h-full object-cover" loading="lazy">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
          <p class="absolute bottom-1 right-3 z-10 font-body text-[7px] text-white/40 italic">Artistic Impression. Not an Actual Site Image.</p>
          <div class="absolute inset-0 z-10 flex flex-col justify-end p-6">
            <h3 class="font-body text-lg font-semibold text-white">35+ Lifestyle Amenities</h3>
            <p class="font-body text-[12px] text-white/80 mt-1">Niche amenities for an illustrious lifestyle.</p>
          </div>
        </div>
        <!-- Card 4: EDGE 2 Pre-Certified -->
        <div class="highlight-panel relative overflow-hidden">
          <img src="assets/images/Project-highlights/card-4.webp" alt="EDGE 2 Pre-Certified" class="highlight-panel__img absolute inset-0 w-full h-full object-cover" loading="lazy" style="object-fit: contain;">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
          <p class="absolute bottom-1 right-3 z-10 font-body text-[7px] text-white/40 italic">Artistic Impression. Not an Actual Site Image.</p>
          <div class="absolute inset-0 z-10 flex flex-col justify-end p-6">
            <h3 class="font-body text-lg font-semibold text-white">EDGE 2 Pre-Certified</h3>
            <p class="font-body text-[12px] text-white/80 mt-1">Certified to international sustainability standards, aligned with global green building benchmarks</p>
          </div>
        </div>
        <!-- Card 5: Your Life Amidst Lush Greenery -->
        <div class="highlight-panel relative overflow-hidden">
          <img src="assets/images/Project-highlights/3.webp" alt="Your Life Amidst Lush Greenery" class="highlight-panel__img absolute inset-0 w-full h-full object-cover" loading="lazy">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
          <p class="absolute bottom-1 right-3 z-10 font-body text-[7px] text-white/40 italic">Artistic Impression. Not an Actual Site Image.</p>
          <div class="absolute inset-0 z-10 flex flex-col justify-end p-6">
            <h3 class="font-body text-lg font-semibold text-white">Your Life Amidst Lush Greenery</h3>
            <p class="font-body text-[12px] text-white/80 mt-1">71% open space, acres of green space with a man-made water body and 200+ trees</p>
          </div>
        </div>
        <!-- Card 6: 2 Clubhouse -->
        <div class="highlight-panel relative overflow-hidden">
          <img src="assets/images/Project-highlights/clubhouse.png" alt="Two Clubhouses" class="highlight-panel__img absolute inset-0 w-full h-full object-cover" loading="lazy">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
          <p class="absolute bottom-1 right-3 z-10 font-body text-[7px] text-white/40 italic">Artistic Impression. Not an Actual Site Image.</p>
          <div class="absolute inset-0 z-10 flex flex-col justify-end p-6">
            <h3 class="font-body text-lg font-semibold text-white">Two Clubhouses</h3>
            <p class="font-body text-[12px] text-white/80 mt-1">Your daily leisure gets a double boost here with 29,000 sq.ft. Japandi inspired clubhouses</p>
          </div>
        </div>
        <!-- Card 7: Indoor Amenities -->
        <div class="highlight-panel relative overflow-hidden">
          <img src="assets/images/Project-highlights/5.webp" alt="Indoor Amenities" class="highlight-panel__img absolute inset-0 w-full h-full object-cover" loading="lazy">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
          <p class="absolute bottom-1 right-3 z-10 font-body text-[7px] text-white/40 italic">Artistic Impression. Not an Actual Site Image.</p>
          <div class="absolute inset-0 z-10 flex flex-col justify-end p-6">
            <h3 class="font-body text-lg font-semibold text-white">Indoor Amenities</h3>
            <p class="font-body text-[12px] text-white/80 mt-1">Two gymnasiums, AV room, co-working spaces, library & many More</p>
          </div>
        </div>
      </div>
      <!-- Mobile nav for highlights carousel -->
      <div class="sm:hidden flex items-center justify-center gap-3 mt-6">
        <button class="w-9 h-9 rounded-full border border-[#2c2c2c]/30 text-[#2c2c2c]/60 flex items-center justify-center hover:bg-[#2c2c2c] hover:text-white transition-all" id="highlightsPrev" aria-label="Previous">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6" /></svg>
        </button>
        <button class="w-9 h-9 rounded-full border border-[#2c2c2c]/30 text-[#2c2c2c]/60 flex items-center justify-center hover:bg-[#2c2c2c] hover:text-white transition-all" id="highlightsNext" aria-label="Next">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6" /></svg>
        </button>
      </div>
    </div>
  </section>


  <!-- ============================================= -->
  <!-- SECTION: LOCATION HIGHLIGHTS -->
  <!-- ============================================= -->
  <section id="location-highlights" class="relative w-full pt-[10px] md:pt-[50px] pb-0 md:pb-[50px] lg:pt-[10px] lg:pb-[20px] overflow-hidden">
    <div class="relative z-10 max-w-[1200px] mx-auto px-4 lg:px-8">
      <div class="text-center mb-2">
        <h2 class="font-blacker text-[26px] md:text-[30px] lg:text-[32px] text-black capitalize">Location Highlights</h2>
        <p class="font-body text-sm text-gray-500 mt-1 mb-[15px]">Live at the Heart of North Bangalore’s Growth Corridor</p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-[45%_55%] gap-4 items-start">
        <!-- Left: Thumbnail, Title, Description, Bullets, Nav -->
        <div class="text-center order-2 lg:order-1">
          <div class="hidden sm:block w-[340px] h-[150px] mx-auto rounded overflow-hidden mb-4">
            <div class="owl-carousel location-thumb-carousel" id="locationThumbCarousel">
              <picture>
                <source media="(max-width: 767px)" srcset="assets/images/Location highlights mobile/Excellent Connectivity.webp">
                <img src="assets/images/location-2.png" alt="Connectivity" class="w-full h-[150px] object-cover" loading="lazy">
              </picture>
              <picture>
                <source media="(max-width: 767px)" srcset="assets/images/Location highlights mobile/Top Educational Institutions Nearby.webp">
                <img src="assets/images/Location highlights dektop/Top-Educational-Institutions.webp" alt="Educational Institutions" class="w-full h-[150px] object-cover" loading="lazy">
              </picture>
              <picture>
                <source media="(max-width: 767px)" srcset="assets/images/Location highlights mobile/Close to Major IT Hubs.webp">
                <img src="assets/images/location-ithubs.png" alt="IT Hubs" class="w-full h-[150px] object-cover" loading="lazy">
              </picture>
              <picture>
                <source media="(max-width: 767px)" srcset="assets/images/Location highlights mobile/Premium Healthcare Within Reach.webp">
                <img src="assets/images/Location highlights dektop/Premium Healthcare Within Reach .webp" alt="Hospitals" class="w-full h-[150px] object-cover" loading="lazy">
              </picture>
              <picture>
                <source media="(max-width: 767px)" srcset="assets/images/Location highlights mobile/Lifestyle &amp; Retail Destinations.webp">
                <img src="assets/images/Location highlights dektop/Lifestyle &amp; Retail Destinations .webp" alt="Retail Hubs" class="w-full h-[150px] object-cover" loading="lazy">
              </picture>
            </div>
          </div>
          <h3 class="font-blacker text-[22px] md:text-[24px] text-[#2c2c2c] font-semibold mb-1 min-h-[36px]" id="locationTitle">Connectivity</h3>
          <p class="font-body text-[13px] md:text-[14px] text-gray-500 mb-2" id="locationDescription">Easy access to metro, rail & airport</p>
          <div class="w-[80%] mx-auto h-px bg-[#0b253e]/20 mb-3"></div>
          <div id="locationBullets" class="text-left max-w-[95%] md:max-w-[340px] mx-auto mb-3">
            <div class="location-bullet-list space-y-[8px]"></div>
          </div>

          <div class="flex items-center justify-center gap-3 mt-2">
            <button class="w-7 h-7 md:w-9 md:h-9 rounded-full border border-[#2c2c2c]/30 text-[#2c2c2c]/60 flex items-center justify-center hover:bg-[#2c2c2c] hover:text-white transition-all cursor-pointer" id="location-highlights-prev" aria-label="Previous">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="md:w-[16px] md:h-[16px]">
                <path d="M15 18l-6-6 6-6" />
              </svg>
            </button>
            <button class="w-7 h-7 md:w-9 md:h-9 rounded-full border border-[#2c2c2c]/30 text-[#2c2c2c]/60 flex items-center justify-center hover:bg-[#2c2c2c] hover:text-white transition-all cursor-pointer" id="location-highlights-next" aria-label="Next">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="md:w-[16px] md:h-[16px]">
                <path d="M9 18l6-6-6-6" />
              </svg>
            </button>
          </div>
        </div>
        <!-- Right: Map (replaces large image carousel) -->
        <div class="relative order-1 lg:order-2">
          <div class="w-full h-[300px] md:h-[350px] overflow-hidden rounded-[12px] shadow-lg border border-gray-200 relative z-0">
            <div id="location-map" class="w-full h-full border-0 bg-transparent z-0"></div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ============================================= -->
  <!-- SECTION 5: AMENITIES -->
  <!-- ============================================= -->
  <section id="amenities" class="relative w-full pt-[40px] md:pt-[50px] pb-0 md:pb-[50px] lg:pt-[10px] lg:pb-[30px]">
    <div class="max-w-[1280px] mx-auto relative">
      <!-- Section Title -->
      <h2
        class="font-blacker text-[26px] md:text-[30px] lg:text-[32px] text-black text-center capitalize leading-normal md:pt-[36px] lg:pt-[10px] mb-0 md:mb-[30px] lg:mb-[15px]">
        Key Project Features
      </h2>

      <div class="amenity-stage relative md:h-[430px] lg:h-[370px] mx-[16px] md:mx-[32px] lg:mx-[60px] xl:mx-[138px] overflow-hidden">
        <!-- Amenity Slides Container -->
        <div class="amenity-slides relative w-full h-full">

          <!-- Slide 1 -->
          <div class="amenity-slide absolute inset-0 flex flex-col-reverse md:flex-row" data-index="0"
            style="transform: translateY(0); transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);">
            <!-- Image (shows below text on mobile, left on desktop) -->
            <div
              class="w-full md:w-[280px] lg:w-[320px] h-[280px] md:h-[320px] flex-shrink-0 overflow-hidden relative cursor-pointer gallery-image-popup"
              data-src="assets/images/clubhouse-project-highlights.webp">
              <img src="assets/images/clubhouse-project-highlights.webp" alt="Clubhouse Exterior"
                class="w-full h-full object-cover">
              <span class="absolute bottom-[8px] left-[10px] text-white text-[10px] font-body opacity-80">Artistic
                Impression. Not an actual Site Image</span>
            </div>
            <!-- Vertical Divider (desktop only) -->
            <div
              class="hidden md:block w-[2px] h-full mx-[16px] lg:mx-[33px] flex-shrink-0 relative bg-gray-300 overflow-hidden">
              <div id="amenity-active-line"
                class="absolute left-0 w-full h-[60px] bg-orange-500 transition-transform duration-500 ease-in-out">
              </div>
            </div>
            <!-- Content -->
            <div class="flex-1 pt-[10px] md:pt-[93px] pl-[10px] md:pl-[20px] lg:pl-[42px] relative">
              <!-- Large Number -->
              <div class="relative md:absolute md:top-[0px] md:left-[0px]">
                <span
                  class="font-caudex text-[80px] md:text-[100px] lg:text-[126px] leading-none number-gradient">01</span>
              </div>
              <!-- Title -->
              <div class="relative mt-[-10px] md:mt-[-30px] ml-0 md:ml-[95px] lg:ml-[60px] lg:mt-[-40px]">
                <p
                  class="font-body text-[20px] md:text-[23px] lg:text-[25px] text-[#2c2c2c] capitalize tracking-[0.68px] leading-[40.6px]">
                  Clubhouse</p>
              </div>
              <!-- Description -->
              <div
                class="font-body text-[16px] md:text-[17px] lg:text-[16px] text-[#4c4949] leading-[28px] md:leading-[30.4px] lg:leading-[26px] w-full md:w-[280px] lg:w-[354px] mt-[10px] md:mt-[46px] ml-[0px] md:ml-[18px] mb-[16px] md:mb-0">
                <p>A setting of this scale calls for two clubhouses. Thoughtfully positioned within the twelve towers, moments of pause and connection are always within reach. Together spanning over 29,000 sq. ft., these Japandi-inspired spaces bring together quiet design, natural materials and the right atmosphere.</p>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="amenity-slide absolute inset-0 flex flex-col-reverse md:flex-row" data-index="1"
            style="transform: translateY(100%); transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);">
            <div
              class="w-full md:w-[280px] lg:w-[320px] h-[280px] md:h-[320px] flex-shrink-0 overflow-hidden relative cursor-pointer gallery-image-popup"
              data-src="assets/images/gallery/Balcony Closeup Cam.webp">
              <img src="assets/images/gallery/Balcony Closeup Cam.webp" alt="Landscape" class="w-full h-full object-cover">
              <span class="absolute bottom-[8px] left-[10px] text-white text-[10px] font-body opacity-80">Artistic
                Impression. Not an actual Site Image</span>
            </div>
            <div
              class="hidden md:block w-[2px] h-full mx-[16px] lg:mx-[33px] flex-shrink-0 relative bg-gray-300 overflow-hidden">
            </div>
            <div class="flex-1 pt-[10px] md:pt-[93px] pl-[10px] md:pl-[20px] lg:pl-[42px] relative">
              <div class="relative md:absolute md:top-[0px] md:left-[0px]">
                <span
                  class="font-caudex text-[80px] md:text-[100px] lg:text-[126px] leading-none number-gradient">02</span>
              </div>
              <div class="relative mt-[-10px] md:mt-[-30px] ml-0 md:ml-[95px] lg:ml-[60px] lg:mt-[-40px]">
                <p
                  class="font-body text-[20px] md:text-[23px] lg:text-[25px] text-[#2c2c2c] capitalize tracking-[0.68px] leading-[40.6px]">
                  Our Landscape</p>
              </div>
              <div
                class="font-body text-[16px] md:text-[17px] lg:text-[16px] text-[#4c4949] leading-[28px] md:leading-[30.4px] lg:leading-[26px] w-full md:w-[280px] lg:w-[354px] mt-[10px] md:mt-[46px] ml-[0px] md:ml-[18px] mb-[16px] md:mb-0">
                <p>Most developments place greens among the towers. At Altura, the towers stand within the greens. The result is a landscape that surrounds you – opening space, softening movement, and allowing nature to become part of everyday living.</p>
              </div>
            </div>
          </div>

          <!-- Slide 3: Grand Entrance -->
          <div class="amenity-slide absolute inset-0 flex flex-col-reverse md:flex-row" data-index="2"
            style="transform: translateY(100%); transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);">
            <div
              class="w-full md:w-[280px] lg:w-[320px] h-[280px] md:h-[320px] flex-shrink-0 overflow-hidden relative cursor-pointer gallery-image-popup"
              data-src="assets/images/grand-entrance.webp">
              <img src="assets/images/grand-entrance.webp" alt="Grand Entrance" class="w-full h-full object-cover">
              <span class="absolute bottom-[8px] left-[10px] text-white text-[10px] font-body opacity-80">Artistic
                Impression. Not an actual Site Image</span>
            </div>
            <div
              class="hidden md:block w-[2px] h-full mx-[16px] lg:mx-[33px] flex-shrink-0 relative bg-gray-300 overflow-hidden">
            </div>
            <div class="flex-1 pt-[10px] md:pt-[93px] pl-[10px] md:pl-[20px] lg:pl-[42px] relative">
              <div class="relative md:absolute md:top-[0px] md:left-[0px]">
                <span
                  class="font-caudex text-[80px] md:text-[100px] lg:text-[126px] leading-none number-gradient">03</span>
              </div>
              <div class="relative mt-[-10px] md:mt-[-30px] ml-0 md:ml-[95px] lg:ml-[60px] lg:mt-[-40px]">
                <p
                  class="font-body text-[20px] md:text-[23px] lg:text-[25px] text-[#2c2c2c] capitalize tracking-[0.68px] leading-[40.6px]">
                  Grand Entrance</p>
              </div>
              <div
                class="font-body text-[16px] md:text-[17px] lg:text-[16px] text-[#4c4949] leading-[28px] md:leading-[30.4px] lg:leading-[26px] w-full md:w-[280px] lg:w-[354px] mt-[10px] md:mt-[46px] ml-[0px] md:ml-[18px] mb-[16px] md:mb-0">
                <p>The grand entrance frames Altura's 10.06-acre development offering seamless access from Bagalur Main Road. At Altura, the entrance is designed to welcome you into an illustrious life.</p>
              </div>
            </div>
          </div>

          <!-- Slide 4: Serene Manmade Features -->
          <div class="amenity-slide absolute inset-0 flex flex-col-reverse md:flex-row" data-index="3"
            style="transform: translateY(100%); transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);">
            <div
              class="w-full md:w-[280px] lg:w-[320px] h-[280px] md:h-[320px] flex-shrink-0 overflow-hidden relative cursor-pointer gallery-image-popup"
              data-src="assets/images/water-feature.webp">
              <img src="assets/images/water-feature.webp" alt="Serene Features" class="w-full h-full object-cover">
              <span class="absolute bottom-[8px] left-[10px] text-white text-[10px] font-body opacity-80">Artistic
                Impression. Not an actual Site Image</span>
            </div>
            <div
              class="hidden md:block w-[2px] h-full mx-[16px] lg:mx-[33px] flex-shrink-0 relative bg-gray-300 overflow-hidden">
            </div>
            <div class="flex-1 pt-[10px] md:pt-[93px] pl-[10px] md:pl-[20px] lg:pl-[42px] relative">
              <div class="relative md:absolute md:top-[0px] md:left-[0px]">
                <span
                  class="font-caudex text-[80px] md:text-[100px] lg:text-[126px] leading-none number-gradient">04</span>
              </div>
              <div class="relative mt-[-10px] md:mt-[-30px] ml-0 md:ml-[95px] lg:ml-[60px] lg:mt-[-40px]">
                <p
                  class="font-body text-[20px] md:text-[23px] lg:text-[25px] text-[#2c2c2c] capitalize tracking-[0.68px] leading-[40.6px]">
                  Serene Manmade Features</p>
              </div>
              <div
                class="font-body text-[16px] md:text-[17px] lg:text-[16px] text-[#4c4949] leading-[28px] md:leading-[30.4px] lg:leading-[26px] w-full md:w-[280px] lg:w-[354px] mt-[10px] md:mt-[46px] ml-[0px] md:ml-[18px] mb-[16px] md:mb-0">
                <p>Here, calm isn't an escape, it's a part of your everyday muse. At its heart lies a serene water feature, bringing calm to your doorstep. A striking contemporary sculpture marks the gateway, creating a distinctive landmark for the community. It lends the address a strong identity – recognisable and enduring.</p>
              </div>
            </div>
          </div>

          <!-- Slide 5: Niche Lifestyle Amenities -->
          <div class="amenity-slide absolute inset-0 flex flex-col-reverse md:flex-row" data-index="4"
            style="transform: translateY(100%); transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);">
            <div
              class="w-full md:w-[280px] lg:w-[320px] h-[280px] md:h-[320px] flex-shrink-0 overflow-hidden relative cursor-pointer gallery-image-popup"
              data-src="assets/images/tarrece-cafe-new.webp">
              <img src="assets/images/tarrece-cafe-new.webp" alt="Niche Amenities" class="w-full h-full object-cover">
              <span class="absolute bottom-[8px] left-[10px] text-white text-[10px] font-body opacity-80">Artistic
                Impression. Not an actual Site Image</span>
            </div>
            <div
              class="hidden md:block w-[2px] h-full mx-[16px] lg:mx-[33px] flex-shrink-0 relative bg-gray-300 overflow-hidden">
            </div>
            <div class="flex-1 pt-[10px] md:pt-[93px] pl-[10px] md:pl-[20px] lg:pl-[42px] relative">
              <div class="relative md:absolute md:top-[0px] md:left-[0px]">
                <span
                  class="font-caudex text-[80px] md:text-[100px] lg:text-[126px] leading-none number-gradient">05</span>
              </div>
              <div class="relative mt-[-10px] md:mt-[-30px] ml-0 md:ml-[95px] lg:ml-[60px] lg:mt-[-40px]">
                <p
                  class="font-body text-[20px] md:text-[23px] lg:text-[25px] text-[#2c2c2c] capitalize tracking-[0.68px] leading-[40.6px]">
                  Niche Lifestyle Amenities</p>
              </div>
              <div
                class="font-body text-[16px] md:text-[17px] lg:text-[16px] text-[#4c4949] leading-[28px] md:leading-[30.4px] lg:leading-[26px] w-full md:w-[280px] lg:w-[354px] mt-[10px] md:mt-[46px] ml-[0px] md:ml-[18px] mb-[16px] md:mb-0">
                <p>Here, niche amenities redefine modern living by offering curated experiences. From pickle ball and skating rink to rooftop cafes, these thoughtfully designed amenities cater to the evolving lifestyle needs, enhancing convenience, community engagement, and everyday indulgence within the comfort of a residential ecosystem.</p>
              </div>
            </div>
          </div>

        </div>

        <!-- Desktop Arrows - positioned outside slides so they don't move -->
        <div class="hidden md:flex md:flex-col gap-[9px] absolute right-0 top-[108px] z-10">
          <button class="amenity-prev group w-[36px] h-[36px] flex items-center justify-center cursor-pointer border border-[#2c2c2c]/30 hover:border-[#E35336] hover:bg-[#E35336] rounded-full transition-all duration-300">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
              <path d="M12 5L12 19" class="stroke-[#2c2c2c] group-hover:stroke-white transition-colors duration-300" stroke-width="1.5" stroke-linecap="round" />
              <path d="M6 11L12 5L18 11" class="stroke-[#2c2c2c] group-hover:stroke-white transition-colors duration-300" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
          <button class="amenity-next group w-[36px] h-[36px] flex items-center justify-center cursor-pointer border border-[#2c2c2c]/30 hover:border-[#E35336] hover:bg-[#E35336] rounded-full transition-all duration-300">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
              <path d="M12 5L12 19" class="stroke-[#2c2c2c] group-hover:stroke-white transition-colors duration-300" stroke-width="1.5" stroke-linecap="round" />
              <path d="M6 13L12 19L18 13" class="stroke-[#2c2c2c] group-hover:stroke-white transition-colors duration-300" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Mobile Arrows - horizontal left/right, centered -->
      <div class="flex justify-center gap-[20px] mt-[20px] md:hidden">
        <button
          class="amenity-prev group w-[42px] h-[42px] flex items-center justify-center cursor-pointer border border-[#2c2c2c]/30 hover:border-[#E35336] hover:bg-[#E35336] rounded-full transition-all duration-300">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
            <path d="M15 18L9 12L15 6" class="stroke-[#2c2c2c] group-hover:stroke-white transition-colors duration-300" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
        <button
          class="amenity-next group w-[42px] h-[42px] flex items-center justify-center cursor-pointer border border-[#2c2c2c]/30 hover:border-[#E35336] hover:bg-[#E35336] rounded-full transition-all duration-300">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
            <path d="M9 18L15 12L9 6" class="stroke-[#2c2c2c] group-hover:stroke-white transition-colors duration-300" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
      </div>
    </div>


  </section>


  <!-- ============================================= -->
  <!-- SECTION 6: CLUBHOUSE -->
  <!-- ============================================= -->
  <section id="clubhouse" class="relative w-full pt-[40px] md:pt-[50px] pb-0 md:pb-[50px] lg:pt-0 lg:pb-0">
    <div class="max-w-[1480px] mx-auto relative h-[400px] md:h-[550px] lg:h-[440px] overflow-hidden">
      <!-- Background Images (Full Width) -->
      <div class="clubhouse-bg-slides absolute inset-0">
        <div class="clubhouse-bg active absolute inset-0" data-index="0"><img src="assets/images/clubhouse-renders/gymnasium.png" alt="2 Gymnasiums" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/60"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="1"><img src="assets/images/clubhouse-renders/swimming-pool.webp" alt="2 Swimming Pools" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="2"><img src="assets/images/clubhouse-renders/badminton-court.jpg" alt="2 Double Height Badminton Courts" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="3"><img src="assets/images/clubhouse-renders/golf-simulator.png" alt="Golf Simulator" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="4"><img src="assets/images/clubhouse-renders/pilate-studio.webp" alt="Pilates Studio" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="5"><img src="assets/images/clubhouse-renders/zumba.png" alt="Zumba & Aerobic Room" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="6"><img src="assets/images/clubhouse-renders/indoor-kids-play-area.png" alt="Indoor Kid's Play Area" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="7"><img src="assets/images/clubhouse-renders/game-room.png" alt="2 Indoor Games Room" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="8"><img src="assets/images/clubhouse-renders/billiards.png" alt="Billiards Room" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="9"><img src="assets/images/clubhouse-renders/table-tennis.png" alt="Table Tennis Room" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="10"><img src="assets/images/clubhouse-renders/multipurpose-hall.webp" alt="3 Multi-Purpose Halls" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="11"><img src="assets/images/clubhouse-renders/pilate-studio.webp" alt="Yoga/Meditation Room" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="12"><img src="assets/images/gallery/AV Room.webp" alt="Mini-Theatre" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="13"><img src="assets/images/gallery/Terrace Cam 2.webp" alt="BBQ & Café" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="14"><img src="assets/images/gallery/Terrace Cam 1.webp" alt="2 Sky Cinema" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="15"><img src="assets/images/gallery/Co-Working Space.webp" alt="Co-working Space" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="16"><img src="assets/images/clubhouse-renders/meeting-room.png" alt="Meeting Room" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="17"><img src="assets/images/clubhouse-renders/spa-and-salon.png" alt="Space for Spa & Salon" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
        <div class="clubhouse-bg absolute inset-0 opacity-0" data-index="18"><img src="assets/images/clubhouse-renders/reading-space.png" alt="Library/Reading Space" class="absolute inset-0 w-full h-full object-cover"><div class="absolute inset-0 bg-black/50"></div></div>
      </div>

      <!-- Title -->
      <h2
        class="font-blacker text-[24px] md:text-[28px] lg:text-[32px] text-[#f9f9f9] text-center capitalize leading-normal relative z-10 pt-[40px] md:pt-[60px] lg:pt-[35px]">
        Clubhouse Amenities
      </h2> 

      <!-- Center Small Image Carousel -->
      <div id="clubhouse-carousel"
        class="absolute left-1/2 -translate-x-1/2 top-[110px] md:top-[160px] lg:top-[95px] z-10 w-[calc(100%-32px)] md:w-[480px] lg:w-[558px] h-[240px] md:h-[300px] lg:h-[305px]">
        <div class="relative w-full h-full">
          <!-- Left Arrow -->
          <button id="club-prev"
            class="group absolute left-[-2px] md:left-[8px] top-[40%] md:top-1/2 -translate-y-1/2 z-20 w-[36px] md:w-[45px] h-[36px] md:h-[45px] flex items-center justify-center cursor-pointer bg-transparent hover:bg-[#E35336] border border-transparent hover:border-[#E35336] rounded-full transition-all duration-300 hover:scale-110">

            <svg width="35" height="35" viewBox="0 0 24 24" fill="none">
              <path d="M19 12H5M5 12L11 6M5 12L11 18"
                class="stroke-white group-hover:stroke-white transition-colors duration-300" stroke-width="1.6"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>

          </button>

          <!-- Right Arrow -->
          <button id="club-next"
            class="group absolute right-[-2px] md:right-[8px] top-[40%] md:top-1/2 -translate-y-1/2 z-20 w-[36px] md:w-[45px] h-[36px] md:h-[45px] flex items-center justify-center cursor-pointer bg-transparent hover:bg-[#E35336] border border-transparent hover:border-[#E35336] rounded-full transition-all duration-300 hover:scale-110">

            <svg width="35" height="35" viewBox="0 0 24 24" fill="none">
              <path d="M5 12H19M19 12L13 6M19 12L13 18"
                class="stroke-white group-hover:stroke-white transition-colors duration-300" stroke-width="1.6"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>

          </button>

          <!-- Small Images Container -->
          <div class="relative overflow-hidden mx-[30px] md:mx-[60px] lg:mx-[85px] h-full">
            <div class="clubhouse-slider flex absolute top-0 left-0 h-full" id="clubhouse-slider-track">
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/gymnasium.png" alt="2 Gymnasiums" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">2 Gymnasiums</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/swimming-pool.webp" alt="2 Swimming Pools" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">2 Swimming Pools</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/badminton-court.jpg" alt="2 Double Height Badminton Courts" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">2 Double Height Badminton Courts</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/golf-simulator.png" alt="Golf Simulator" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">Golf Simulator</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/pilate-studio.webp" alt="Pilates Studio" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">Pilates Studio</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/zumba.png" alt="Zumba & Aerobic Room" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">Zumba & Aerobic Room</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/indoor-kids-play-area.png" alt="Indoor Kid's Play Area" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">Indoor Kid's Play Area</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/game-room.png" alt="2 Indoor Games Room" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">2 Indoor Games Room</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/billiards.png" alt="Billiards Room" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">Billiards Room</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/table-tennis.png" alt="Table Tennis Room" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">Table Tennis Room</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/multipurpose-hall.webp" alt="3 Multi-Purpose Halls" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">3 Multi-Purpose Halls</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/pilate-studio.webp" alt="Yoga/Meditation Room" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">Yoga/Meditation Room</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/gallery/AV Room.webp" alt="Mini-Theatre" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">Mini-Theatre</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/gallery/Terrace Cam 2.webp" alt="BBQ & Café" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">BBQ & Café</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/gallery/Terrace Cam 1.webp" alt="2 Sky Cinema" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">2 Sky Cinema</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/gallery/Co-Working Space.webp" alt="Co-working Space" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">Co-working Space</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/meeting-room.png" alt="Meeting Room" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">Meeting Room</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/spa-and-salon.png" alt="Space for Spa & Salon" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">Space for Spa & Salon</p></div>
              <div class="clubhouse-slide-item flex-shrink-0 flex flex-col" style="width: 100%;"><div class="h-[180px] md:h-[240px] lg:h-[290px] overflow-hidden relative"><img src="assets/images/clubhouse-renders/reading-space.png" alt="Library/Reading Space" class="w-full h-full object-cover"><span class="absolute bottom-[6px] left-[6px] text-white text-[9px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div><p class="font-blacker text-[16px] md:text-[18px] lg:text-[20.6px] text-[#fbf8f8] text-center capitalize mt-[12px] md:mt-[18px] lg:mt-[22px]">Library/Reading Space</p></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================= -->
  <!-- SECTION 8: MASTER PLAN -->
  <!-- ============================================= -->
  <section id="masterplan" class="relative w-full pt-[15px] pb-0 md:py-[50px] lg:pt-0 lg:mt-[30px] lg:pb-0">
    <div class="max-w-full mx-auto relative">
      <!-- Tab Navigation -->
      <div class="flex items-center justify-center gap-[14px] md:gap-[20px] lg:gap-[26px] relative z-10 pt-[12px] md:pt-[20px] lg:pt-[10px] mb-[20px] md:mb-0">
        <div
          class="masterplan-tab tab-item tab-active font-blacker-normal text-[20px] md:text-[26px] lg:text-[32px] capitalize cursor-pointer"
          data-tab="masterplan-content">
          Master Plan
        </div>
        <div
          class="masterplan-tab tab-item font-blacker-normal text-[20px] md:text-[26px] lg:text-[32px] text-[#3c3b3b] capitalize cursor-pointer"
          data-tab="floorplan-content">
          Floor Plan
        </div>
        <div
          class="masterplan-tab tab-item font-blacker-normal text-[20px] md:text-[26px] lg:text-[32px] text-[#3c3b3b] capitalize cursor-pointer"
          data-tab="unitplan-content">
          Unit Plan
        </div>
      </div>

      <!-- Plan Image -->
      <div id="masterplan-content"
        class="relative mt-[12px] md:mt-[20px] flex items-center justify-center py-[15px] md:py-[30px] lg:py-[30px] min-h-[250px] md:min-h-[380px] lg:min-h-[420px]" style="background-image: url('assets/images/masterplan-bg.jpg'); background-size: cover; background-position: center;">
          <div id="single-plan-view" class="w-[90%] md:w-[70%] lg:w-[38%] overflow-hidden">
            <a id="plan-link" href="assets/images/master-plan/MLP.webp">
              <img id="plan-image" src="assets/images/master-plan/MLP.webp"
                loading="eager" decoding="sync"
                class="w-full h-[250px] md:h-[360px] object-contain bg-transparent cursor-pointer">
            </a>
          </div>

          <div id="floor-plan-carousel-view" class="w-[90%] lg:w-[45%] hidden relative" style="display: none;">
            <div class="owl-carousel floorplan-carousel w-full">
              <div class="item w-full relative group"><a href="assets/images/floor-Plans/Tower-1.webp" class="plan-popup"><img src="assets/images/floor-Plans/Tower-1.webp" loading="eager" decoding="sync" class="w-full h-[200px] md:h-[350px] object-contain cursor-pointer"><span class="floor-plan-text">Tower 1</span></a></div>
              <div class="item w-full relative group"><a href="assets/images/floor-Plans/Tower-2.webp" class="plan-popup"><img src="assets/images/floor-Plans/Tower-2.webp" loading="eager" decoding="sync" class="w-full h-[200px] md:h-[350px] object-contain cursor-pointer"><span class="floor-plan-text">Tower 2</span></a></div>
              <div class="item w-full relative group"><a href="assets/images/floor-Plans/Tower-3.webp" class="plan-popup"><img src="assets/images/floor-Plans/Tower-3.webp" loading="eager" decoding="sync" class="w-full h-[200px] md:h-[350px] object-contain cursor-pointer"><span class="floor-plan-text">Tower 3</span></a></div>
              <div class="item w-full relative group"><a href="assets/images/floor-Plans/Tower-5.webp" class="plan-popup"><img src="assets/images/floor-Plans/Tower-5.webp" loading="eager" decoding="sync" class="w-full h-[200px] md:h-[350px] object-contain cursor-pointer"><span class="floor-plan-text">Tower 5</span></a></div>
              <div class="item w-full relative group"><a href="assets/images/floor-Plans/Tower-6.webp" class="plan-popup"><img src="assets/images/floor-Plans/Tower-6.webp" loading="eager" decoding="sync" class="w-full h-[200px] md:h-[350px] object-contain cursor-pointer"><span class="floor-plan-text">Tower 6</span></a></div>
            </div>
          </div>

          <!-- Unit Plan Container -->
          <div id="unitplan-container-view" class="w-[95%] lg:w-[90%] xl:w-[70%] hidden relative" style="display: none;">

            <!-- Sub-Tabs for Unit Plan -->
            <div class="flex flex-nowrap items-center justify-start md:justify-center gap-[10px] md:gap-[14px] mb-[15px] overflow-x-auto px-[10px] pb-[5px] scrollbar-hide">
              <div class="unitplan-subtab px-[12px] md:px-[18px] py-[4px] md:py-[5px] rounded-[50px] border border-[#E35336] bg-white/70 text-[#E35336] font-blacker-normal text-[13px] md:text-[16px] cursor-pointer transition-all duration-300 whitespace-nowrap" data-target="2bhkclassic">2 BHK Classic</div>
              <div class="unitplan-subtab px-[12px] md:px-[18px] py-[4px] md:py-[5px] rounded-[50px] border border-[#3c3b3b]/40 bg-white/20 text-[#3c3b3b] hover:text-[#E35336] hover:border-[#E35336] hover:bg-white/70 font-blacker-normal text-[13px] md:text-[16px] cursor-pointer transition-all duration-300 whitespace-nowrap" data-target="2bhkpremium">2 BHK Premium</div>
              <div class="unitplan-subtab px-[12px] md:px-[18px] py-[4px] md:py-[5px] rounded-[50px] border border-[#3c3b3b]/40 bg-white/20 text-[#3c3b3b] hover:text-[#E35336] hover:border-[#E35336] hover:bg-white/70 font-blacker-normal text-[13px] md:text-[16px] cursor-pointer transition-all duration-300 whitespace-nowrap" data-target="3bhkclassic">3 BHK Classic</div>
              <div class="unitplan-subtab px-[12px] md:px-[18px] py-[4px] md:py-[5px] rounded-[50px] border border-[#3c3b3b]/40 bg-white/20 text-[#3c3b3b] hover:text-[#E35336] hover:border-[#E35336] hover:bg-white/70 font-blacker-normal text-[13px] md:text-[16px] cursor-pointer transition-all duration-300 whitespace-nowrap" data-target="3bhkpremium">3 BHK Premium</div>
              <div class="unitplan-subtab px-[12px] md:px-[18px] py-[4px] md:py-[5px] rounded-[50px] border border-[#3c3b3b]/40 bg-white/20 text-[#3c3b3b] hover:text-[#E35336] hover:border-[#E35336] hover:bg-white/70 font-blacker-normal text-[13px] md:text-[16px] cursor-pointer transition-all duration-300 whitespace-nowrap" data-target="3bhkluxe">3 BHK Luxe</div>
              <div class="unitplan-subtab px-[12px] md:px-[18px] py-[4px] md:py-[5px] rounded-[50px] border border-[#3c3b3b]/40 bg-white/20 text-[#3c3b3b] hover:text-[#E35336] hover:border-[#E35336] hover:bg-white/70 font-blacker-normal text-[13px] md:text-[16px] cursor-pointer transition-all duration-300 whitespace-nowrap" data-target="allplans">All Plans</div>
            </div>

            <!-- 2 BHK Classic -->
            <div id="unitplan-2bhkclassic-carousel-view" class="unitplan-slider-wrap w-full lg:max-w-[80%] lg:mx-auto relative">
              <div class="owl-carousel unitplan-2bhkclassic-carousel w-full">
                <div class="item w-full"><a href="assets/images/unit-plans/2-BHK-Classic/2-BHK-Classic-1.webp" class="plan-popup"><img src="assets/images/unit-plans/2-BHK-Classic/2-BHK-Classic-1.webp" loading="eager" decoding="sync" class="w-full h-[200px] md:h-[285px] object-contain cursor-pointer"></a></div>
              </div>
            </div>

            <!-- 2 BHK Premium -->
            <div id="unitplan-2bhkpremium-carousel-view" class="unitplan-slider-wrap w-full lg:max-w-[80%] lg:mx-auto hidden relative" style="display: none;">
              <div class="owl-carousel unitplan-2bhkpremium-carousel w-full">
                <div class="item w-full"><a href="assets/images/unit-plans/2-BHK-Premium/2-BHK-Premium-1.webp" class="plan-popup"><img src="assets/images/unit-plans/2-BHK-Premium/2-BHK-Premium-1.webp" loading="eager" decoding="sync" class="w-full h-[200px] md:h-[285px] object-contain cursor-pointer"></a></div>
              </div>
            </div>

            <!-- 3 BHK Classic -->
            <div id="unitplan-3bhkclassic-carousel-view" class="unitplan-slider-wrap w-full lg:max-w-[80%] lg:mx-auto hidden relative" style="display: none;">
              <div class="owl-carousel unitplan-3bhkclassic-carousel w-full">
                <div class="item w-full"><a href="assets/images/unit-plans/3-BHK-Classic/3-BHK-Classic-1.webp" class="plan-popup"><img src="assets/images/unit-plans/3-BHK-Classic/3-BHK-Classic-1.webp" loading="eager" decoding="sync" class="w-full h-[200px] md:h-[285px] object-contain cursor-pointer"></a></div>
              </div>
            </div>

            <!-- 3 BHK Premium -->
            <div id="unitplan-3bhkpremium-carousel-view" class="unitplan-slider-wrap w-full lg:max-w-[80%] lg:mx-auto hidden relative" style="display: none;">
              <div class="owl-carousel unitplan-3bhkpremium-carousel w-full">
                <div class="item w-full"><a href="assets/images/unit-plans/3-BHK-Premium/3-BHK-Premium-1.webp" class="plan-popup"><img src="assets/images/unit-plans/3-BHK-Premium/3-BHK-Premium-1.webp" loading="eager" decoding="sync" class="w-full h-[200px] md:h-[285px] object-contain cursor-pointer"></a></div>
              </div>
            </div>

            <!-- 3 BHK Luxe -->
            <div id="unitplan-3bhkluxe-carousel-view" class="unitplan-slider-wrap w-full lg:max-w-[80%] lg:mx-auto hidden relative" style="display: none;">
              <div class="owl-carousel unitplan-3bhkluxe-carousel w-full">
                <div class="item w-full"><a href="assets/images/unit-plans/3-BHK-Luxe/3-BHK-Luxe-1.webp" class="plan-popup"><img src="assets/images/unit-plans/3-BHK-Luxe/3-BHK-Luxe-1.webp" loading="eager" decoding="sync" class="w-full h-[200px] md:h-[285px] object-contain cursor-pointer"></a></div>
              </div>
            </div>

            <!-- All Plans -->
            <div id="unitplan-allplans-carousel-view" class="unitplan-slider-wrap w-full lg:max-w-[80%] lg:mx-auto hidden relative" style="display: none;">
              <div class="relative w-full overflow-hidden">
                <img src="assets/images/unit-plans/2-BHK-Classic/2-BHK-Classic-1.webp" alt="All Plans" loading="eager" decoding="sync" class="w-full h-[200px] md:h-[285px] object-contain blur-[6px]">
                <div class="absolute inset-0 flex items-center justify-center z-10 pointer-events-none">
                  <a href="#download-plans-popup" class="popup-link pointer-events-auto inline-flex items-center gap-[8px] bg-[#E35336] hover:bg-[#c9432a] text-white font-blacker-normal text-[14px] md:text-[16px] px-[20px] md:px-[24px] py-[10px] md:py-[12px] rounded-[50px] shadow-lg transition-all duration-300 cursor-pointer">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                    Download Plans
                  </a>
                </div>
              </div>
            </div>

          </div>

      </div>

    </div>

    <!-- Download Brochure Button -->
    <div class="flex justify-center mt-[20px] md:mt-[36px] pb-[10px]">
      <a href="#brochure-popup"
        class="popup-link inline-flex items-center gap-[10px] bg-tvs-red text-white font-body text-[15px] md:text-[16px] px-[28px] py-[12px] rounded-[9px] hover:bg-[#9a2f19] transition-colors">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                    <polyline points="7 10 12 15 17 10" />
                    <line x1="12" y1="15" x2="12" y2="3" />
                </svg>
        Download Brochure
      </a>
    </div>
  </section>


  <!-- ============================================= -->
  <!-- SECTION 8: IMAGE GALLERY -->
  <!-- ============================================= -->

  <!-- ----------------------------------- new---------------------------------------- -->

  <section id="gallery" class="relative w-full pt-[40px] pb-[40px] md:py-[50px] lg:pt-[50px] lg:pb-[50px] overflow-hidden">

    <!-- Tab Navigation -->
    <div class="flex items-center justify-center gap-[20px] md:gap-[35px] mb-[20px] md:mb-0">
      <div
        class="gallery-tab  tab-active font-blacker-normal text-[22px] md:text-[28px] lg:text-[32px] capitalize cursor-pointer"
        data-tab="images">
        Image Gallery
      </div>
      <div class="gallery-tab hidden font-blacker-normal text-[22px] md:text-[28px] lg:text-[32px] text-[#3c3b3b] capitalize cursor-pointer"
        data-tab="videos">
        Video Gallery
      </div>
    </div>

    <!-- IMAGE -->
    <div class="gallery-content mt-0 md:mt-[50px]" id="images">
      <div class="owl-carousel gallery-carousel">
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Aerial Cam.webp"><img src="assets/images/gallery/Aerial Cam.webp" alt="Aerial View" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Elevation Landscape Cam.webp"><img src="assets/images/gallery/Elevation Landscape Cam.webp" alt="Elevation Landscape View" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Entrance Cam.webp"><img src="assets/images/gallery/Entrance Cam.webp" alt="Entrance View" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Club Cam.webp"><img src="assets/images/gallery/Club Cam.webp" alt="Club View" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Club To Building.webp"><img src="assets/images/gallery/Club To Building.webp" alt="Club To Building" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Pond Cam.webp"><img src="assets/images/gallery/Pond Cam.webp" alt="Pond View" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Balcony Closeup Cam.webp"><img src="assets/images/gallery/Balcony Closeup Cam.webp" alt="Balcony Closeup View" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Side Tower Cam.webp"><img src="assets/images/gallery/Side Tower Cam.webp" alt="Side Tower View" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Terrace Cam 1.webp"><img src="assets/images/gallery/Terrace Cam 1.webp" alt="Terrace View 1" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Terrace Cam 2.webp"><img src="assets/images/gallery/Terrace Cam 2.webp" alt="Terrace View 2" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Entrance Lobby HR.webp"><img src="assets/images/gallery/Entrance Lobby HR.webp" alt="Entrance Lobby" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Gym.webp"><img src="assets/images/gallery/Gym.webp" alt="Gym" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/AV Room.webp"><img src="assets/images/gallery/AV Room.webp" alt="AV Room" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Co-Working Space.webp"><img src="assets/images/gallery/Co-Working Space.webp" alt="Co-Working Space" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Kids Play Area.webp"><img src="assets/images/gallery/Kids Play Area.webp" alt="Kids Play Area" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
        <div class="item relative cursor-pointer gallery-image-popup" data-src="assets/images/gallery/Multipurpose Hall.webp"><img src="assets/images/gallery/Multipurpose Hall.webp" alt="Multipurpose Hall" loading="lazy"><span class="absolute bottom-[8px] left-[14px] text-white text-[10px] font-body opacity-80">Artistic Impression. Not an actual Site Image</span></div>
      </div>
    </div>

    <!-- VIDEO -->
    <div class="gallery-content mt-[10px] md:mt-[50px] hidden" id="videos">
      <div class="owl-carousel video-gallery-carousel">
        <div class="item">
          <div class="w-full max-w-[560px] mx-auto aspect-video">
            <iframe width="100%" height="100%" data-src="https://www.youtube-nocookie.com/embed/52K6Xv-tBPQ?rel=0&modestbranding=1&playsinline=1" title="TVS Emerald Altura" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="rounded-[12px]"></iframe>
          </div>
        </div>
        <div class="item">
          <div class="w-full max-w-[560px] mx-auto aspect-video">
            <iframe width="100%" height="100%" data-src="https://www.youtube-nocookie.com/embed/NpUFVp7c288?rel=0&modestbranding=1&playsinline=1" title="TVS Emerald Altura" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="rounded-[12px]"></iframe>
          </div>
        </div>
        <div class="item">
          <div class="w-full max-w-[560px] mx-auto aspect-video">
            <iframe width="100%" height="100%" data-src="https://www.youtube-nocookie.com/embed/EqkR3R0ZftQ?rel=0&modestbranding=1&playsinline=1" title="TVS Emerald Altura" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="rounded-[12px]"></iframe>
          </div>
        </div>
      </div>
    </div>

    <!-- ARROWS -->
    <!-- <div class="flex justify-center gap-[20px] mt-[25px]">
    <button id="prevBtn" class="nav-btn group">
      <svg width="12" height="20" viewBox="0 0 15 30" fill="none">
              <path d="M13 2L3 15L13 28" stroke="#2c2c2c" stroke-width="4" class="stroke-[#0b253e] group-hover:stroke-[#E35336] transition-colors" />
            </svg>
    </button>

    <button id="nextBtn" class="nav-btn group">
      <svg width="12" height="20" viewBox="0 0 15 30" fill="none">
              <path d="M2 2L12 15L2 28" stroke="#2c2c2c" stroke-width="4"class="stroke-[#0b253e] group-hover:stroke-[#E35336] transition-colors" />
            </svg>
    </button>
  </div> -->

    <!-- ARROWS -->
    <div class="flex justify-center gap-[20px] mt-0 md:mt-[25px] lg:mt-[10px]">

      <button id="prevBtn"
        class="group w-[45px] h-[45px] flex items-center justify-center  hover:bg-[#E35336] border border-transparent hover:border-[#E35336] rounded-full transition-all duration-300 cursor-pointer">

        <svg width="12" height="20" viewBox="0 0 15 30" fill="none">
          <path d="M13 2L3 15L13 28" class="stroke-[#0b253e] group-hover:stroke-white transition-colors duration-300"
            stroke-width="4" />
        </svg>

      </button>

      <button id="nextBtn"
        class="group w-[45px] h-[45px] flex items-center justify-center  hover:bg-[#E35336] border border-transparent hover:border-[#E35336] rounded-full transition-all duration-300 cursor-pointer">

        <svg width="12" height="20" viewBox="0 0 15 30" fill="none">
          <path d="M2 2L12 15L2 28" class="stroke-[#0b253e] group-hover:stroke-white transition-colors duration-300"
            stroke-width="4" />
        </svg>

      </button>

    </div>

    </div>

  </section>


  <!-- Location Map section removed - merged into Location Highlights above -->


  <!-- ============================================= -->
  <!-- SECTION 10: CONTACT / FOOTER -->
  <!-- ============================================= -->
  <section id="contact" class="relative w-full pb-0 mb-0 bg-[#7C5C41]">
    <div class="w-full relative">
      <div
        class="bg-[#7C5C41] w-full h-auto min-h-[350px] md:min-h-[350px] flex flex-col items-center justify-start pt-[30px] md:pt-[56px] lg:pt-[40px] pb-0 px-[16px] md:px-[32px] lg:px-0">
        <!-- Heading -->
        <h2
          class="font-blacker text-[22px] md:text-[28px] lg:text-[34px] text-white text-center tracking-[-0.48px] leading-normal mb-0 md:mb-[24px] lg:mb-[10px]">
          Schedule a Site Visit & Join the Illustrious Life
        </h2>

        <!-- Contact Form -->
        <div class="mt-[10px] md:mt-[30px] lg:mt-[20px] w-full lg:w-[95%]">
          <div class="bg-[#f7f7f7] rounded-[9px] px-[20px] md:px-[21px] py-[16px] md:py-[13px] w-full lg:w-full">
            <form id="contactForm" method="post" action="saveInfo.php" class="flex flex-col md:flex-row items-stretch md:items-center gap-[12px] md:gap-[23px] w-full">
              <input type="hidden" name="form_name" value="contact-form">
              <!-- UTM Data -->
              <input type="hidden" name="project" value="TVS Emerald Altura" />
              <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>" />
              <input type="hidden" name="utm_term" value="<?php echo $utm_term; ?>" />
              <input type="hidden" name="utm_medium" value="<?php echo $utm_medium; ?>" />
              <input type="hidden" name="utm_content" value="<?php echo $utm_content; ?>" />
              <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign; ?>" />
              <input type="hidden" name="matchtype" value="<?php echo $utm_matchtype; ?>" />
              <input type="hidden" name="keyword" value="<?php echo $utm_keyword; ?>" />
              <input type="hidden" name="device" value="<?php echo $utm_device; ?>" />
              <input type="hidden" name="placement" value="<?php echo $utm_placement; ?>" />
              <input type="hidden" name="pageUrl"
                value='<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' />
              <!-- New -->
              <input type="hidden" name="gclid" value="<?php echo $gclid; ?>" />
              <input type="hidden" name="original_referrer" value="<?php echo $original_referrer; ?>" />
              <input type="hidden" name="utmctr" value="<?php echo $utmctr; ?>" />
              <!-- New -->
              <!-- SalesForce -->
              <input type="hidden" name="sub_source" value="<?php echo $sub_source; ?>" />
              <input type="hidden" name="p_s" value="<?php echo $p_s; ?>" />
              <input type="hidden" name="se_s" value="<?php echo $se_s; ?>" />
              <input type="hidden" name="t_s" value="<?php echo $t_s; ?>" />
              <!-- SalesForce -->
              <!-- Extra SalesForce -->
              <input type="hidden" name="ADCampaignID" value="<?php echo $ADCampaignID; ?>" />
              <input type="hidden" name="AdSetID" value="<?php echo $AdSetID; ?>" />
              <input type="hidden" name="AdID" value="<?php echo $AdID; ?>" />
              <!-- Extra SalesForce -->
              <input type="hidden" name="detect_device" value="" />
              <input type="hidden" name="detect_device_name" value="" />
              <input type="hidden" name="City__c" value="" />
              <input type="hidden" name="Country__c" value="" />
              <input type="hidden" name="Browser__c" value="" />
              <input type="hidden" name="Operating_System__c" value="" />
              <!-- UTM Data -->
              <div class="grid grid-cols-1 md:grid-cols-3 gap-[10px] md:gap-[15px] flex-1">
                <div class="form-group w-full flex">
                  <input type="text" placeholder="Name:" name="name"
                    class="w-full border-b border-[#a0a0a0] bg-transparent text-[16px] md:text-[18px] text-[#4b4b4b] font-body py-[6px] md:py-[5px] px-[10px] outline-none tracking-[0.18px] placeholder:text-gray-700">
                </div>
                <div class="form-group w-full flex">
                  <input type="tel" placeholder="Phone:" name="phone"
                    class="phone-input w-full border-b border-[#a0a0a0] bg-transparent text-[16px] md:text-[18px] text-[#4b4b4b] font-body py-[6px] md:py-[5px] px-[10px] outline-none tracking-[0.18px] placeholder:text-gray-700">
                </div>
                <div class="form-group w-full flex">
                  <input type="email" placeholder="Email:" name="email"
                    class="w-full border-b border-[#a0a0a0] bg-transparent text-[16px] md:text-[18px] text-[#4b4b4b] font-body py-[6px] md:py-[5px] px-[10px] outline-none tracking-[0.18px] placeholder:text-gray-700">
                </div>
              </div>
              <div class="flex-shrink-0 flex items-center gap-2">
                <input type="checkbox" id="contactPrivacy" name="privacy" required checked class="accent-tvs-red">
                <label for="contactPrivacy"
                  class="font-body text-[10px] md:text-[11px] text-tvs-dark/60 leading-tight max-w-[200px] md:max-w-[190px] xl:max-w-[280px]">
                  I have read and understood the <a href="javascript:void(0)" onclick="openPrivacyModal()"
                    class="text-tvs-red underline">Privacy Policy</a>. By registering here, I agree to TVS Emerald's <a
                    href="javascript:void(0)" onclick="openPrivacyModal()"
                    class="text-tvs-red underline">Terms and Conditions</a>.
                </label>
              </div>
              <button type="submit"
                class="bg-tvs-red text-[#fcfcfc] font-body text-[16px] md:text-[18px] tracking-[0.54px] px-[32px] md:px-[42px] py-[10px] md:py-[9px] rounded-[9px] hover:bg-[#9a2f19] transition-colors leading-[21.3px] shrink-0">Submit</button>
            </form>
          </div>
        </div>

        <!-- Footer Logo and Copyright -->
        <div
          class="mt-[5px] md:mt-[30px] flex flex-col items-center justify-center pb-[5px] gap-[10px] md:gap-[14px]">
          <img src="assets/images/tvs-altura-white-logo.png" alt="TVS Altura Logo"
            class="h-[45px] md:h-[55px] object-contain">
          <p class="text-white text-[9px] md:text-[11px] font-body text-center leading-none mt-[2px]">
            &copy; 2026 TVS Emerald. All rights reserved.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- STICKY ENQUIRE SIDEBAR -->
  </style>

  <!-- Sticky Tab Button -->
  <button id="sticky-form-tab"
    style="opacity:0;pointer-events:none"
    class="fixed right-0 top-[40%] bg-[#b1381f] text-white px-[12px] pt-[15px] pb-[8px] rounded-t-[12px] font-inter font-medium text-[15px] shadow-[-4px_0_15px_rgba(0,0,0,0.2)] z-[9990] tracking-wide hover:bg-[#8f2b17] cursor-pointer">
    Book a Site Visit
  </button>

  <!-- Sticky Overlay (all devices, fades in AFTER form is visible) -->
  <div id="sticky-overlay" class="fixed inset-0 bg-black/40 z-[2] opacity-0 pointer-events-none"
    style="transition: opacity 0.3s ease;"></div>

  <!-- Sticky Panel -->
  <div id="sticky-form-panel" class="fixed right-0 z-[4]">
    <div
      class="bg-white w-[90vw] max-w-[360px] rounded-l-[12px] shadow-[-5px_5px_25px_rgba(0,0,0,0.2)] p-[24px] overflow-y-auto max-h-[90vh]">

      <div class="flex items-center justify-between mb-[20px]">
        <h3 class="font-blacker-normal text-[22px] text-[#2c2b2b]">Book a Site Visit</h3>
        <button id="sticky-form-close" class="text-[#a0a0a0] hover:text-[#2c2b2b] transition-colors p-[4px]">
          <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Amenities Icons -->
      <div class="flex items-start justify-between border-b border-[#e5e5e5] pb-[16px] mb-[20px]">
        <!-- Halls -->
        <div class="flex flex-col items-center justify-center text-center w-1/3">
          <svg class="w-[22px] h-[22px] mb-[8px] text-[#E35336]" fill="none" stroke="currentColor" stroke-width="1.5"
            viewBox="0 0 24 24">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <path d="M9 22V12h6v10"></path>
          </svg>
          <span class="font-inter text-[10px] text-[#6b6b6b] leading-[1.3]">3 Multi Purpose<br>Halls</span>
        </div>
        <!-- Pools -->
        <div class="flex flex-col items-center justify-center text-center w-1/3 border-l border-[#e5e5e5]">
          <svg class="w-[22px] h-[22px] mb-[8px] text-[#E35336]" fill="none" stroke="currentColor" stroke-width="1.5"
            viewBox="0 0 24 24">
            <path d="M2 12c2.5 0 2.5 2 5 2s2.5-2 5-2 2.5 2 5 2 2.5-2 5-2"></path>
            <path d="M2 18c2.5 0 2.5 2 5 2s2.5-2 5-2 2.5 2 5 2 2.5-2 5-2"></path>
            <circle cx="12" cy="5" r="2.5" fill="currentColor"></circle>
          </svg>
          <span class="font-inter text-[10px] text-[#6b6b6b] leading-[1.3]">2 Swimming<br>Pools</span>
        </div>
        <!-- Amenities -->
        <div class="flex flex-col items-center justify-center text-center w-1/3 border-l border-[#e5e5e5]">
          <svg class="w-[22px] h-[22px] mb-[8px] text-[#E35336]" fill="none" stroke="currentColor" stroke-width="1.5"
            viewBox="0 0 24 24">
            <polygon
              points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
            </polygon>
          </svg>
          <span class="font-inter text-[10px] text-[#6b6b6b] leading-[1.3]">35+ Lifestyle<br>Amenities</span>
        </div>
      </div>

      <!-- Form -->
      <form id="stickyForm" method="post" action="saveInfo.php" class="flex flex-col gap-[16px]">
        <input type="hidden" name="form_name" value="sticky-form">
        <!-- UTM Data -->
        <input type="hidden" name="project" value="TVS Emerald Altura" />
        <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>" />
        <input type="hidden" name="utm_term" value="<?php echo $utm_term; ?>" />
        <input type="hidden" name="utm_medium" value="<?php echo $utm_medium; ?>" />
        <input type="hidden" name="utm_content" value="<?php echo $utm_content; ?>" />
        <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign; ?>" />
        <input type="hidden" name="matchtype" value="<?php echo $utm_matchtype; ?>" />
        <input type="hidden" name="keyword" value="<?php echo $utm_keyword; ?>" />
        <input type="hidden" name="device" value="<?php echo $utm_device; ?>" />
        <input type="hidden" name="placement" value="<?php echo $utm_placement; ?>" />
        <input type="hidden" name="pageUrl"
          value='<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' />
        <!-- New -->
        <input type="hidden" name="gclid" value="<?php echo $gclid; ?>" />
        <input type="hidden" name="original_referrer" value="<?php echo $original_referrer; ?>" />
        <input type="hidden" name="utmctr" value="<?php echo $utmctr; ?>" />
        <!-- New -->
        <!-- SalesForce -->
        <input type="hidden" name="sub_source" value="<?php echo $sub_source; ?>" />
        <input type="hidden" name="p_s" value="<?php echo $p_s; ?>" />
        <input type="hidden" name="se_s" value="<?php echo $se_s; ?>" />
        <input type="hidden" name="t_s" value="<?php echo $t_s; ?>" />
        <!-- SalesForce -->
        <!-- Extra SalesForce -->
        <input type="hidden" name="ADCampaignID" value="<?php echo $ADCampaignID; ?>" />
        <input type="hidden" name="AdSetID" value="<?php echo $AdSetID; ?>" />
        <input type="hidden" name="AdID" value="<?php echo $AdID; ?>" />
        <!-- Extra SalesForce -->
        <input type="hidden" name="detect_device" value="" />
        <input type="hidden" name="detect_device_name" value="" />
        <input type="hidden" name="City__c" value="" />
        <input type="hidden" name="Country__c" value="" />
        <input type="hidden" name="Browser__c" value="" />
        <input type="hidden" name="Operating_System__c" value="" />
        <!-- UTM Data -->
        <div class="form-group border-b border-[#e5e5e5]">
          <input type="text" placeholder="Name *" name="name"
            class="w-full bg-transparent pb-[8px] px-1 text-[13px] font-inter text-[#4b4b4b] placeholder-[#a0a0a0] focus:outline-none"
            required>
        </div>

        <div class="form-group border-b border-[#e5e5e5] pb-[6px]">
          <input type="tel" placeholder="Phone *" name="phone"
            class="phone-input w-full bg-transparent text-[13px] font-inter text-[#4b4b4b] placeholder-[#a0a0a0] focus:outline-none"
            required>
        </div>

        <div class="form-group border-b border-[#e5e5e5]">
          <input type="email" placeholder="Email *" name="email"
            class="w-full bg-transparent pb-[8px] px-1 text-[13px] font-inter text-[#4b4b4b] placeholder-[#a0a0a0] focus:outline-none"
            required>
        </div>

        <label class="flex items-start gap-[8px] mt-[6px] cursor-pointer">
          <input type="checkbox" id="contactPrivacy" name="privacy" required checked class="accent-tvs-red">
          <span class="font-inter text-[10px] text-[#6b6b6b] leading-[1.45]">
            I have read and understood the <a href="javascript:void(0)" onclick="openPrivacyModal()"
              class="text-[#b1381f] underline">Privacy Policy</a>. By registering here, I agree to TVS Emerald's <a
              href="javascript:void(0)" onclick="openPrivacyModal()" class="text-[#b1381f] underline">Terms
              and
              Conditions</a>.
          </span>
        </label>

        <button type="submit" class="w-full mt-[8px] border-[0.5px] border-[#e5e5e5] text-white font-inter font-medium text-[15px] tracking-wide bg-[#b1381f] bg-contain bg-center rounded-[24px] py-[12px] shadow-sm hover:opacity-90 transition-opacity" style="background-image: url('assets/images/btn-bg.jpg');">Submit</button>
      </form>
    </div><!-- end inner white card -->
  </div><!-- end sticky-form-panel -->


  <!-- ✅ Mobile Sticky Bar -->
  <!-- <div class="fixed bottom-0 left-0 w-full flex z-[9999] md:hidden shadow-lg">
  
  <a href="tel:+919999999999" 
     class="flex-1 text-center py-3 bg-black text-white text-[14px] font-semibold">
    📞 Call Now
  </a>


  <a href="#brochure-popup" 
     class="flex-1 text-center py-3 border-l-[1px] border-white bg-black  text-white text-[14px] font-semibold popup-link">
    📄 Download Brochure
  </a>

</div> -->

  <div id="mobile-sticky-bar" style="opacity:0;pointer-events:none" class="fixed bottom-[-2px] left-0 w-full flex z-[9999] md:hidden shadow-lg">

    <!-- Call Button -->
    <a href="tel:+918069236652"
      class="call-me-btn-mobile flex-1 flex items-center justify-center gap-2 py-3 bg-[#E35336] text-white text-[14px] font-semibold cursor-pointer border-none outline-none">

      <!-- Phone Icon -->
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M3 5a2 2 0 012-2h2.28a2 2 0 011.94 1.515l.516 2.064a2 2 0 01-.45 1.948l-1.27 1.27a16 16 0 006.586 6.586l1.27-1.27a2 2 0 011.948-.45l2.064.516A2 2 0 0121 16.72V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
      </svg>

      Call Now
    </a>

    <!-- Brochure Button -->
    <a href="#brochure-popup"
      class="flex-1 flex items-center justify-center gap-2 py-3 border-l-[1px] border-white bg-black text-white text-[14px] font-semibold popup-link">

      <!-- Download Icon -->
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M12 3v12m0 0l-4-4m4 4l4-4M4 17v2a2 2 0 002 2h12a2 2 0 002-2v-2" />
      </svg>

      Download Brochure
    </a>

  </div>


  <!-- ✅ Popup Form -->
  <div id="brochure-popup" class="mfp-hide bg-[#f7f7f7] p-[24px] md:p-[30px] max-w-md mx-auto rounded-[9px] relative">
    <h2 class="font-blacker font-bold text-[24px] md:text-[28px] text-[#2c2c2c] mb-[20px] text-center capitalize">Download Brochure</h2>

    <form id="brochure-form" method="post" action="saveInfo.php" class="flex flex-col gap-[15px]">
      <input type="hidden" name="type" value="download_brochure">
      <input type="hidden" name="form_name" value="brochure-form">
      <!-- UTM Data -->
      <input type="hidden" name="project" value="TVS Emerald Altura" />
      <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>" />
      <input type="hidden" name="utm_term" value="<?php echo $utm_term; ?>" />
      <input type="hidden" name="utm_medium" value="<?php echo $utm_medium; ?>" />
      <input type="hidden" name="utm_content" value="<?php echo $utm_content; ?>" />
      <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign; ?>" />
      <input type="hidden" name="matchtype" value="<?php echo $utm_matchtype; ?>" />
      <input type="hidden" name="keyword" value="<?php echo $utm_keyword; ?>" />
      <input type="hidden" name="device" value="<?php echo $utm_device; ?>" />
      <input type="hidden" name="placement" value="<?php echo $utm_placement; ?>" />
      <input type="hidden" name="pageUrl"
        value='<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' />
      <!-- New -->
      <input type="hidden" name="gclid" value="<?php echo $gclid; ?>" />
      <input type="hidden" name="original_referrer" value="<?php echo $original_referrer; ?>" />
      <input type="hidden" name="utmctr" value="<?php echo $utmctr; ?>" />
      <!-- New -->
      <!-- SalesForce -->
      <input type="hidden" name="sub_source" value="<?php echo $sub_source; ?>" />
      <input type="hidden" name="p_s" value="<?php echo $p_s; ?>" />
      <input type="hidden" name="se_s" value="<?php echo $se_s; ?>" />
      <input type="hidden" name="t_s" value="<?php echo $t_s; ?>" />
      <!-- SalesForce -->
      <!-- Extra SalesForce -->
      <input type="hidden" name="ADCampaignID" value="<?php echo $ADCampaignID; ?>" />
      <input type="hidden" name="AdSetID" value="<?php echo $AdSetID; ?>" />
      <input type="hidden" name="AdID" value="<?php echo $AdID; ?>" />
      <!-- Extra SalesForce -->
      <input type="hidden" name="detect_device" value="" />
      <input type="hidden" name="detect_device_name" value="" />
      <input type="hidden" name="City__c" value="" />
      <input type="hidden" name="Country__c" value="" />
      <input type="hidden" name="Browser__c" value="" />
      <input type="hidden" name="Operating_System__c" value="" />
      <!-- UTM Data -->
      <div class="w-full">
        <input type="text" name="name" placeholder="Your Name" required
          class="w-full border-b border-[#a0a0a0] bg-transparent text-[16px] text-[#4b4b4b] font-body py-[8px] px-[8px] outline-none tracking-[0.18px] placeholder:text-gray-700">
      </div>
      <div class="w-full">
        <input type="tel" name="phone" placeholder="Phone Number" required
          class="phone-input w-full border-b border-[#a0a0a0] bg-transparent text-[16px] text-[#4b4b4b] font-body py-[8px] px-[8px] outline-none tracking-[0.18px] placeholder:text-gray-700">
      </div>
      <div class="w-full">
        <input type="email" name="email" placeholder="Email" required
          class="w-full border-b border-[#a0a0a0] bg-transparent text-[16px] text-[#4b4b4b] font-body py-[8px] px-[8px] outline-none tracking-[0.18px] placeholder:text-gray-700">
      </div>
      <div class="flex-shrink-0 flex items-start gap-2 mt-[5px] mb-[5px]">
        <input type="checkbox" id="brochurePrivacy" name="privacy" required checked class="accent-tvs-red mt-[2px]">
        <label for="brochurePrivacy" class="font-body text-[11px] text-tvs-dark/60 leading-tight">
          I have read and understood the <a href="javascript:void(0)" onclick="openPrivacyModal()"
            class="text-tvs-red underline">Privacy Policy</a>. By registering here, I agree to TVS Emerald's <a
            href="javascript:void(0)" onclick="openPrivacyModal()" class="text-tvs-red underline">Terms and
            Conditions</a>.
        </label>
      </div>
      <button type="submit"
        class="w-full bg-tvs-red text-white font-poppins text-[16px] tracking-[0.54px] py-[12px] rounded-[9px] hover:bg-[#9a2f19] transition-colors leading-[21.3px]">
        Download Now
      </button>
    </form>

  </div>

  <!-- Download Plans Popup Form -->
  <div id="download-plans-popup" class="mfp-hide bg-[#f7f7f7] p-[24px] md:p-[30px] max-w-md mx-auto rounded-[9px] relative">
    <h2 class="font-blacker font-bold text-[24px] md:text-[28px] text-[#2c2c2c] mb-[20px] text-center capitalize">Download Unit Plans</h2>
    <form id="download-plans-form" method="post" action="saveInfo.php" class="flex flex-col gap-[15px]">
      <input type="hidden" name="type" value="download_plans">
      <input type="hidden" name="form_name" value="download-plans-form">
      <!-- UTM Data -->
      <input type="hidden" name="project" value="TVS Emerald Altura" />
      <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>" />
      <input type="hidden" name="utm_term" value="<?php echo $utm_term; ?>" />
      <input type="hidden" name="utm_medium" value="<?php echo $utm_medium; ?>" />
      <input type="hidden" name="utm_content" value="<?php echo $utm_content; ?>" />
      <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign; ?>" />
      <input type="hidden" name="matchtype" value="<?php echo $utm_matchtype; ?>" />
      <input type="hidden" name="keyword" value="<?php echo $utm_keyword; ?>" />
      <input type="hidden" name="device" value="<?php echo $utm_device; ?>" />
      <input type="hidden" name="placement" value="<?php echo $utm_placement; ?>" />
      <input type="hidden" name="pageUrl"
        value='<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' />
      <!-- New -->
      <input type="hidden" name="gclid" value="<?php echo $gclid; ?>" />
      <input type="hidden" name="original_referrer" value="<?php echo $original_referrer; ?>" />
      <input type="hidden" name="utmctr" value="<?php echo $utmctr; ?>" />
      <!-- New -->
      <!-- SalesForce -->
      <input type="hidden" name="sub_source" value="<?php echo $sub_source; ?>" />
      <input type="hidden" name="p_s" value="<?php echo $p_s; ?>" />
      <input type="hidden" name="se_s" value="<?php echo $se_s; ?>" />
      <input type="hidden" name="t_s" value="<?php echo $t_s; ?>" />
      <!-- SalesForce -->
      <!-- Extra SalesForce -->
      <input type="hidden" name="ADCampaignID" value="<?php echo $ADCampaignID; ?>" />
      <input type="hidden" name="AdSetID" value="<?php echo $AdSetID; ?>" />
      <input type="hidden" name="AdID" value="<?php echo $AdID; ?>" />
      <!-- Extra SalesForce -->
      <input type="hidden" name="detect_device" value="" />
      <input type="hidden" name="detect_device_name" value="" />
      <input type="hidden" name="City__c" value="" />
      <input type="hidden" name="Country__c" value="" />
      <input type="hidden" name="Browser__c" value="" />
      <input type="hidden" name="Operating_System__c" value="" />
      <!-- UTM Data -->
      <div class="w-full">
        <input type="text" placeholder="Your Name" name="name" required
          class="w-full border-b border-[#a0a0a0] bg-transparent text-[16px] text-[#4b4b4b] font-body py-[8px] px-[8px] outline-none tracking-[0.18px] placeholder:text-gray-700">
      </div>
      <div class="w-full">
        <input type="tel" placeholder="Phone Number" name="phone" required
          class="phone-input w-full border-b border-[#a0a0a0] bg-transparent text-[16px] text-[#4b4b4b] font-body py-[8px] px-[8px] outline-none tracking-[0.18px] placeholder:text-gray-700">
      </div>
      <div class="w-full">
        <input type="email" placeholder="Email" name="email" required
          class="w-full border-b border-[#a0a0a0] bg-transparent text-[16px] text-[#4b4b4b] font-body py-[8px] px-[8px] outline-none tracking-[0.18px] placeholder:text-gray-700">
      </div>
      <div class="flex-shrink-0 flex items-start gap-2 mt-[5px] mb-[5px]">
        <input type="checkbox" id="downloadPlansPrivacy" name="privacy" required checked class="accent-tvs-red mt-[2px]">
        <label for="downloadPlansPrivacy" class="font-body text-[11px] text-tvs-dark/60 leading-tight">
          I have read and understood the <a href="javascript:void(0)" onclick="openPrivacyModal()"
            class="text-tvs-red underline">Privacy Policy</a>. By registering here, I agree to TVS Emerald's <a
            href="javascript:void(0)" onclick="openPrivacyModal()" class="text-tvs-red underline">Terms and
            Conditions</a>.
        </label>
      </div>
      <button type="submit"
        class="w-full bg-[#E35336] hover:bg-[#c9432a] text-white font-blacker-normal text-[16px] py-[10px] rounded-[6px] transition-all duration-300 cursor-pointer">
        Download Plans
      </button>
    </form>
  </div>

  <!-- Know More Popup Form -->
  <div id="know-more-popup" class="mfp-hide bg-[#f7f7f7] p-[24px] md:p-[30px] max-w-md mx-auto rounded-[9px] relative">
    <h2 class="font-blacker font-bold text-[24px] md:text-[28px] text-[#2c2c2c] mb-[20px] text-center capitalize">Get
      More Details</h2>
    <form id="know-more-form" method="post" action="saveInfo.php" class="flex flex-col gap-[15px]">
      <input type="hidden" name="form_name" value="know-more-form">
      <!-- UTM Data -->
      <input type="hidden" name="project" value="TVS Emerald Altura" />
      <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>" />
      <input type="hidden" name="utm_term" value="<?php echo $utm_term; ?>" />
      <input type="hidden" name="utm_medium" value="<?php echo $utm_medium; ?>" />
      <input type="hidden" name="utm_content" value="<?php echo $utm_content; ?>" />
      <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign; ?>" />
      <input type="hidden" name="matchtype" value="<?php echo $utm_matchtype; ?>" />
      <input type="hidden" name="keyword" value="<?php echo $utm_keyword; ?>" />
      <input type="hidden" name="device" value="<?php echo $utm_device; ?>" />
      <input type="hidden" name="placement" value="<?php echo $utm_placement; ?>" />
      <input type="hidden" name="pageUrl"
        value='<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' />
      <!-- New -->
      <input type="hidden" name="gclid" value="<?php echo $gclid; ?>" />
      <input type="hidden" name="original_referrer" value="<?php echo $original_referrer; ?>" />
      <input type="hidden" name="utmctr" value="<?php echo $utmctr; ?>" />
      <!-- New -->
      <!-- SalesForce -->
      <input type="hidden" name="sub_source" value="<?php echo $sub_source; ?>" />
      <input type="hidden" name="p_s" value="<?php echo $p_s; ?>" />
      <input type="hidden" name="se_s" value="<?php echo $se_s; ?>" />
      <input type="hidden" name="t_s" value="<?php echo $t_s; ?>" />
      <!-- SalesForce -->
      <!-- Extra SalesForce -->
      <input type="hidden" name="ADCampaignID" value="<?php echo $ADCampaignID; ?>" />
      <input type="hidden" name="AdSetID" value="<?php echo $AdSetID; ?>" />
      <input type="hidden" name="AdID" value="<?php echo $AdID; ?>" />
      <!-- Extra SalesForce -->
      <input type="hidden" name="detect_device" value="" />
      <input type="hidden" name="detect_device_name" value="" />
      <input type="hidden" name="City__c" value="" />
      <input type="hidden" name="Country__c" value="" />
      <input type="hidden" name="Browser__c" value="" />
      <input type="hidden" name="Operating_System__c" value="" />
      <!-- UTM Data -->
      <div class="w-full">
        <input type="text" placeholder="Your Name" name="name" required
          class="w-full border-b border-[#a0a0a0] bg-transparent text-[16px] text-[#4b4b4b] font-body py-[8px] px-[8px] outline-none tracking-[0.18px] placeholder:text-gray-700">
      </div>
      <div class="w-full">
        <input type="tel" placeholder="Phone Number" name="phone" required
          class="phone-input w-full border-b border-[#a0a0a0] bg-transparent text-[16px] text-[#4b4b4b] font-body py-[8px] px-[8px] outline-none tracking-[0.18px] placeholder:text-gray-700">
      </div>
      <div class="w-full">
        <input type="email" placeholder="Email" name="email" required
          class="w-full border-b border-[#a0a0a0] bg-transparent text-[16px] text-[#4b4b4b] font-body py-[8px] px-[8px] outline-none tracking-[0.18px] placeholder:text-gray-700">
      </div>
      <div class="flex-shrink-0 flex items-start gap-2 mt-[5px] mb-[5px]">
        <input type="checkbox" id="knowMorePrivacy" name="privacy" required checked class="accent-tvs-red mt-[2px]">
        <label for="knowMorePrivacy" class="font-body text-[11px] text-tvs-dark/60 leading-tight">
          I have read and understood the <a href="javascript:void(0)" onclick="openPrivacyModal()"
            class="text-tvs-red underline">Privacy Policy</a>. By registering here, I agree to TVS Emerald's <a
            href="javascript:void(0)" onclick="openPrivacyModal()" class="text-tvs-red underline">Terms and
            Conditions</a>.
        </label>
      </div>
      <button type="submit"
        class="w-full bg-tvs-red text-white font-poppins text-[16px] tracking-[0.54px] py-[12px] rounded-[9px] hover:bg-[#9a2f19] transition-colors leading-[21.3px]">
        Submit
      </button>
    </form>
  </div>

  <!-- Call Me Now Popup -->
  <div id="call-me-modal" class="fixed inset-0 z-[10000] flex items-center justify-center hidden">
    <div id="call-me-overlay" class="absolute inset-0 bg-black/50"></div>
    <div class="relative bg-white rounded-[16px] w-[90%] max-w-[400px] mx-auto p-[28px] shadow-2xl">
      <button id="call-me-close" class="absolute top-[12px] right-[14px] text-[#a0a0a0] hover:text-[#2c2b2b] transition-colors cursor-pointer bg-transparent border-none outline-none">
        <svg class="w-[22px] h-[22px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
      <h3 class="font-blacker-normal text-[22px] text-[#2c2b2b] mb-[20px]">Request a Callback</h3>
      <form id="call-me-form" method="post" action="saveInfo.php" class="flex flex-col gap-[15px]">
        <input type="hidden" name="form_type" value="callback">
        <input type="hidden" name="form_name" value="call-me-now-form">
        <!-- UTM Data -->
        <input type="hidden" name="project" value="TVS Emerald Altura" />
        <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>" />
        <input type="hidden" name="utm_term" value="<?php echo $utm_term; ?>" />
        <input type="hidden" name="utm_medium" value="<?php echo $utm_medium; ?>" />
        <input type="hidden" name="utm_content" value="<?php echo $utm_content; ?>" />
        <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign; ?>" />
        <input type="hidden" name="matchtype" value="<?php echo $utm_matchtype; ?>" />
        <input type="hidden" name="keyword" value="<?php echo $utm_keyword; ?>" />
        <input type="hidden" name="device" value="<?php echo $utm_device; ?>" />
        <input type="hidden" name="placement" value="<?php echo $utm_placement; ?>" />
        <input type="hidden" name="pageUrl"
          value='<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' />
        <!-- New -->
        <input type="hidden" name="gclid" value="<?php echo $gclid; ?>" />
        <input type="hidden" name="original_referrer" value="<?php echo $original_referrer; ?>" />
        <input type="hidden" name="utmctr" value="<?php echo $utmctr; ?>" />
        <!-- New -->
        <!-- SalesForce -->
        <input type="hidden" name="sub_source" value="<?php echo $sub_source; ?>" />
        <input type="hidden" name="p_s" value="<?php echo $p_s; ?>" />
        <input type="hidden" name="se_s" value="<?php echo $se_s; ?>" />
        <input type="hidden" name="t_s" value="<?php echo $t_s; ?>" />
        <!-- SalesForce -->
        <!-- Extra SalesForce -->
        <input type="hidden" name="ADCampaignID" value="<?php echo $ADCampaignID; ?>" />
        <input type="hidden" name="AdSetID" value="<?php echo $AdSetID; ?>" />
        <input type="hidden" name="AdID" value="<?php echo $AdID; ?>" />
        <!-- Extra SalesForce -->
        <input type="hidden" name="detect_device" value="" />
        <input type="hidden" name="detect_device_name" value="" />
        <input type="hidden" name="City__c" value="" />
        <input type="hidden" name="Country__c" value="" />
        <input type="hidden" name="Browser__c" value="" />
        <input type="hidden" name="Operating_System__c" value="" />
        <!-- UTM Data -->
        <div class="w-full">
          <input type="text" placeholder="Your Name *" name="name" required
            class="w-full border-b border-[#a0a0a0] bg-transparent text-[15px] text-[#4b4b4b] font-body py-[10px] px-[8px] outline-none placeholder:text-gray-500">
        </div>
        <div class="w-full">
          <input type="tel" placeholder="Phone Number *" name="phone" required
            class="phone-input w-full border-b border-[#a0a0a0] bg-transparent text-[15px] text-[#4b4b4b] font-body py-[10px] px-[8px] outline-none placeholder:text-gray-500">
        </div>
        <div class="flex items-start gap-2 mt-[5px]">
          <input type="checkbox" id="callMePrivacy" name="privacy" required checked class="accent-tvs-red mt-[3px]">
          <label for="callMePrivacy" class="font-body text-[11px] text-tvs-dark/60 leading-tight">
            I have read and understood the <a href="javascript:void(0)" onclick="openPrivacyModal()" class="text-tvs-red underline">Privacy Policy</a>. By registering here, I agree to TVS Emerald's <a href="javascript:void(0)" onclick="openPrivacyModal()" class="text-tvs-red underline">Terms and Conditions</a>.
          </label>
        </div>
        <button type="submit"
          class="bg-[#8B2500] text-white font-poppins text-[15px] font-semibold py-[12px] rounded-[9px] hover:bg-[#a02d00] transition-colors w-full cursor-pointer border-none outline-none mt-[5px]">Submit</button>
      </form>
    </div>
  </div>

  <button id="scroll-down-btn"
    style="opacity:1;pointer-events:auto;bottom:100px;"
    class="fixed left-[18px] md:left-1/2 md:-translate-x-1/2 z-[9980] flex flex-col items-center gap-0 cursor-pointer bg-transparent border-none outline-none">
    <svg width="32" height="20" viewBox="0 0 36 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="scroll-chevron-1">
      <path d="M2 2L18 18L34 2" stroke="#ffffff" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    <svg width="32" height="20" viewBox="0 0 36 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="scroll-chevron-2 -mt-[7px]">
      <path d="M2 2L18 18L34 2" stroke="#ffffff" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" opacity="0.45" />
    </svg>
  </button>

  <div id="ohsnap"></div>

  <!-- Scripts Start -->


  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.5.3/build/js/intlTelInput.min.js"></script>

  <!-- ohSnap JS via jsDelivr GitHub CDN -->
  <script src="https://cdn.jsdelivr.net/gh/justindomingue/ohSnap@master/ohsnap.js"></script>  
  
  <!-- Include Owl Carousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  
  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  
  <!-- <script src="/tvs-altura-lp-2-stage/js/script.js"></script> -->
  <script src="js/script.js?v=<?php echo mt_rand(); ?>"></script>


  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>
    AOS.init();
  </script>  

<script>
  $(document).ready(function () {
    // Left Frame Slider
    $(".left-frame-slider").owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: false,
      items: 1,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      mouseDrag: false,
      touchDrag: false,
      pullDrag: false,
      freeDrag: false,
      onInitialized: function () {
        if (typeof $.fn.magnificPopup !== 'undefined') {
          $(".left-frame-slider .gallery-image-popup").magnificPopup({ type: 'image' });
        }
      }
    });

    // Right Frame Slider
    $(".right-frame-slider").owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: false,
      items: 1,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      mouseDrag: false,
      touchDrag: false,
      pullDrag: false,
      freeDrag: false,
      onInitialized: function () {
        if (typeof $.fn.magnificPopup !== 'undefined') {
          $(".right-frame-slider .gallery-image-popup").magnificPopup({ type: 'image' });
        }
      }
    });
  });
</script>  


  <!-- <script src="/js/script.js?v=20260409"></script> -->

  <!-- Kenyt Chatbot (hidden) -->
    <script async>
        // var tag = document.createElement("script");
        // tag.src = "https://www.kenyt.ai/botapp/ChatbotUI/dist/js/bot-loader.js";
        // tag.setAttribute("data-bot", "26374420");
        // document.getElementsByTagName("head")[0].appendChild(tag);
    </script>

    <!-- Kenyt Event Listener -->
    <script>
        // (function() {
        //     var _kenytFired = false;

        //     const handlers = {
        //         onContactFormSubmit: function(data) {
        //             console.log('Contact Form Submitted', data);
        //             if (_kenytFired) return;

        //             var email = data && data.Email ? data.Email.toLowerCase().trim() : '';
        //             var phone = data && data.Phone ? data.Phone : '';
        //             var name = data && data.Name ? data.Name : '';

        //             if (!phone) return;

        //             _kenytFired = true;
        //             setTimeout(function() {
        //                 _kenytFired = false;
        //             }, 5000);

        //             window.dataLayer = window.dataLayer || [];
        //             var phone_number = phone ? (phone.startsWith('+91') ? phone : '+91' + phone) : '';

        //             window.dataLayer.push({
        //                 event: "kenyt_ContactFormSubmit",
        //                 enhanced_conversion_data: {
        //                     name: name,
        //                     email: email,
        //                     phone: phone_number,
        //                 },
        //             });

        //             console.log('GTM DataLayer Push', window.dataLayer);
        //         }
        //     };

        //     window.addEventListener('message', function(event) {
        //         try {
        //             if (event.data?.type === 'kenytCustomEventDispatch') {
        //                 const eventName = event.data.value?.EventName;
        //                 const eventData = event.data.value?.EventData;

        //                 switch (eventName) {
        //                     case 'kenyt_ContactFormSubmit':
        //                         handlers.onContactFormSubmit(eventData);
        //                         break;
        //                     default:
        //                         console.log('Unknown Event', {
        //                             eventName,
        //                             eventData
        //                         });
        //                 }
        //             }
        //         } catch (error) {
        //             console.error('[Kenyt Event Listener Error]', error);
        //         }
        //     });
        // })();
    </script>


  <script>
    const mapMarkersData = {
      'IT Hubs': [
        { name: 'Bhartiya City IT Park', lat: 13.0569, lng: 77.6322 },
        { name: 'Purvankara Business Park', lat: 13.0800, lng: 77.6300 },
        { name: 'L&T Tech Park', lat: 13.0500, lng: 77.6200 },
        { name: 'Century Downtown', lat: 13.0600, lng: 77.6000 }
      ],
      'Educational Institutions': [
        { name: 'Delhi Public School', lat: 13.1250, lng: 77.6350 },
        { name: 'Reva University', lat: 13.1118, lng: 77.6320 },
        { name: 'EuroSchool North Campus', lat: 13.0800, lng: 77.6200 },
        { name: 'Presidency PU College', lat: 13.0500, lng: 77.5900 }
      ],
      'Hospitals': [
        { name: 'Apex Multi Speciality', lat: 13.1000, lng: 77.6200 },
        { name: 'Manipal Hospital', lat: 13.0450, lng: 77.5900 },
        { name: 'Cytecare Hospital', lat: 13.1119, lng: 77.6134 },
        { name: 'Sparsh Hospital', lat: 13.0900, lng: 77.6100 }
      ],
      'Retail Hubs': [
        { name: 'Bhartiya City Mall', lat: 13.0569, lng: 77.6322 },
        { name: 'Elements Mall', lat: 13.0435, lng: 77.6253 },
        { name: 'Phoenix Mall of Asia', lat: 13.0650, lng: 77.5950 },
        { name: 'Esteem Mall', lat: 13.0455, lng: 77.5905 }
      ],
      'Connectivity': [
        { name: 'Bagalur Cross Metro Station', lat: 13.1212, lng: 77.6109 },
        { name: 'Bettahalasuru Metro Station', lat: 13.1340, lng: 77.6260 },
        { name: 'Yelahanka Metro Station', lat: 13.10210, lng: 77.60035 },
        { name: 'Yelahanka Railway Station', lat: 13.1040, lng: 77.5910 }
      ]
    };

    let locationMap;
    let markersLayer;

    $(document).ready(function () {
      if (!document.getElementById('location-map')) return;

      // Define site coordinates first so they are available everywhere
      const tvsEmeraldLat = 13.123068;
      const tvsEmeraldLng = 77.633272;

      const greenIcon = L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      });

      // Create map
      locationMap = L.map('location-map', {
        scrollWheelZoom: false
      }).setView([tvsEmeraldLat, tvsEmeraldLng], 14);
      window.locationMap = locationMap;

      // Google Maps - clean roadmap style (no POIs/business labels)
      L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}&style=feature:poi|visibility:off&style=feature:transit|visibility:simplified', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: '&copy; Google Maps'
      }).addTo(locationMap);


      markersLayer = L.layerGroup().addTo(locationMap);

      // --- PERMANENT GREEN MARKER: TVS EMERALD ---
      const tvsMarker = L.marker([tvsEmeraldLat, tvsEmeraldLng], { icon: greenIcon, zIndexOffset: 1000 }).addTo(locationMap);
      tvsMarker.bindTooltip(`<b>TVS Emerald Altura</b>`, { permanent: true, direction: 'top', offset: [0, -35] }).openTooltip();

      window.renderMapMarkers = function (category) {
        markersLayer.clearLayers();

        const locations = mapMarkersData[category] || [];
        if (locations.length === 0) {
          locationMap.setView([tvsEmeraldLat, tvsEmeraldLng], 13);
          return;
        }

        let iconSvg = '';
        let iconBorder = '#b1381f';

        if (category === 'IT Hubs') {
          iconBorder = '#4285F4'; // Blue
          iconSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="${iconBorder}"><path d="M20 18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2H0v2h24v-2h-4zM4 6h16v10H4V6z"/></svg>`;
        } else if (category === 'Educational Institutions') {
          iconBorder = '#F4B400'; // Orange
          iconSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="${iconBorder}"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2.12-1.15V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>`;
        } else if (category === 'Hospitals') {
          iconBorder = '#E35336'; // TVS Red / Orange-Red
          iconSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="${iconBorder}"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>`;
        } else if (category === 'Retail Hubs') {
          iconBorder = '#9C27B0'; // Violet
          iconSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="${iconBorder}"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>`;
        } else if (category === 'Connectivity') {
          iconBorder = '#607D8B'; // Blue-Grey
          iconSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="${iconBorder}"><path d="M12 2c-4.42 0-8 .5-8 4v9.5C4 17.43 5.34 19 7 19l-1 1v1h12v-1l-1-1c1.66 0 3-1.57 3-3.5V6c0-3.5-3.58-4-8-4zM7.5 17c-.83 0-1.5-.67-1.5-1.5S6.67 14 7.5 14s1.5.67 1.5 1.5S8.33 17 7.5 17zm3.5-6H6V6h5v5zm5.5 6c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm1.5-6h-5V6h5v5z"/></svg>`;
        }

        const customIcon = L.divIcon({
          className: 'custom-map-marker',
          html: `<div class="marker-pin" style="border-color:${iconBorder}"></div><div class="marker-icon">${iconSvg}</div>`,
          iconSize: [32, 42],
          iconAnchor: [16, 42],
          popupAnchor: [0, -32]
        });

        let maxDLat = 0;
        let maxDLng = 0;

        window.locationMarkers = [];
        locations.forEach(location => {
          const marker = L.marker([location.lat, location.lng], { icon: customIcon });
          marker.bindPopup(`<b>${location.name}</b>`);
          markersLayer.addLayer(marker);
          window.locationMarkers.push({ name: location.name, lat: location.lat, lng: location.lng, marker: marker });

          const dLat = Math.abs(location.lat - tvsEmeraldLat);
          const dLng = Math.abs(location.lng - tvsEmeraldLng);
          if (dLat > maxDLat) maxDLat = dLat;
          if (dLng > maxDLng) maxDLng = dLng;
        });

        // Create symmetric bounds so site remains center
        const symBounds = [
          [tvsEmeraldLat - maxDLat, tvsEmeraldLng - maxDLng],
          [tvsEmeraldLat + maxDLat, tvsEmeraldLng + maxDLng]
        ];

        setTimeout(() => locationMap.fitBounds(symBounds, { padding: [40, 40] }), 100);
      };

      // Initial load - first highlight is Educational Institutions
      setTimeout(() => {
        renderMapMarkers('Educational Institutions');
      }, 500);
    });
  </script>
  
   <script>
    (function() {
      const sectionIds = ['hero', 'about', 'highlights', 'location-highlights', 'amenities', 'clubhouse', 'masterplan', 'gallery', 'contact'];
      let currentIndex = 0;

      document.getElementById('scroll-down-btn').addEventListener('click', function() {
        currentIndex = (currentIndex + 1) % sectionIds.length;
        const target = document.getElementById(sectionIds[currentIndex]);
        if (target) {
          const headerOffset = 50;
          const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerOffset;
          window.scrollTo({ top: targetPosition, behavior: 'smooth' });
        }
      });

      const scrollBtn = document.getElementById('scroll-down-btn');
      const heroEl = document.getElementById('hero');
      const bannerForm = document.getElementById('banner_form');
      const chevrons = scrollBtn.querySelectorAll('path');

      function updateScrollBtnPosition() {
        const isOnHero = window.scrollY <= 10;

        if (isOnHero) {
          // Centered above the banner form
          scrollBtn.style.left = '50%';
          scrollBtn.style.transform = 'translateX(-50%)';
          scrollBtn.style.right = 'auto';
          var heroBottomOffset = '80px';
          scrollBtn.style.bottom = window.innerWidth >= 768 ? heroBottomOffset : '300px';
          chevrons.forEach(function(p) {
            p.setAttribute('stroke', '#ffffff');
          });
        } else {
          // Bottom-left on mobile, bottom-right on desktop
          if (window.innerWidth >= 768) {
            scrollBtn.style.left = '24px';
            scrollBtn.style.transform = 'none';
            scrollBtn.style.right = 'auto';
            scrollBtn.style.bottom = '30px';
          } else {
            scrollBtn.style.left = '18px';
            scrollBtn.style.right = 'auto';
            scrollBtn.style.transform = 'none';
            scrollBtn.style.bottom = '80px';
          }
          chevrons.forEach(function(p) {
            p.setAttribute('stroke', '#C9A84C');
          });
        }

        for (let i = sectionIds.length - 1; i >= 0; i--) {
          const el = document.getElementById(sectionIds[i]);
          if (el && el.getBoundingClientRect().top <= 120) {
            currentIndex = i;
            break;
          }
        }
      }

      window.addEventListener('scroll', updateScrollBtnPosition, {
        passive: true
      });
      updateScrollBtnPosition();
    })();

    // Call Me Now popup
    (function() {
      var modal = document.getElementById('call-me-modal');
      var overlay = document.getElementById('call-me-overlay');
      var closeBtn = document.getElementById('call-me-close');
      var openBtn = document.getElementById('call-me-btn');

      function openModal() { modal.classList.remove('hidden'); document.body.style.overflow = 'hidden'; }
      function closeModal() { modal.classList.add('hidden'); document.body.style.overflow = ''; }

      openBtn.addEventListener('click', function() {
        openModal();
      });
      var mobileCallBtn = document.querySelector('.mobile-call-me-btn');
      if (mobileCallBtn) {
        mobileCallBtn.addEventListener('click', function() {
          document.getElementById('mobile-menu').classList.remove('open');
          document.getElementById('mobile-menu-overlay').classList.remove('active');
          openModal();
        });
      }
      closeBtn.addEventListener('click', closeModal);
      overlay.addEventListener('click', closeModal);
    })();
  </script>
<!-- Privacy Policy Popup Modal -->
<div id="privacyModal" class="fixed inset-0 z-[100000] hidden items-center justify-center bg-black/60 backdrop-blur-sm" onclick="if(event.target===this)closePrivacyModal()">
  <div class="relative bg-white rounded-[16px] w-[95%] max-w-[800px] max-h-[85vh] mx-auto overflow-hidden shadow-2xl">
    <!-- Header -->
    <div class="sticky top-0 bg-white z-10 flex items-center justify-between px-[24px] py-[16px] border-b border-gray-200">
      <h2 class="font-caudex font-bold text-[22px] md:text-[26px] text-black">Privacy Policy</h2>
      <button onclick="closePrivacyModal()" class="w-[36px] h-[36px] flex items-center justify-center rounded-full hover:bg-gray-100 transition-colors">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M1 1L17 17M17 1L1 17" stroke="#2c2c2c" stroke-width="2.5" stroke-linecap="round"/></svg>
      </button>
    </div>
    <!-- Body -->
    <div class="overflow-y-auto max-h-[calc(85vh-70px)] px-[24px] md:px-[32px] py-[20px] text-[14px] md:text-[15px] text-[#333] font-body leading-[1.8] privacy-content">
      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px]">Introduction</h3>
      <p class="mb-[16px]">Your Privacy is of paramount importance to us. We are committed to safeguarding your privacy and protecting your Personal Data that is with us. This Privacy Notice outlines the details of the Personal Data we collect and process, how we handle it and the purposes for which we use it. Please read the following carefully to understand our practices regarding your Personal Data.</p>
      <p class="mb-[16px]">Throughout this document, the terms "we", "us", "our" & "ours" refer to TVS Emerald. And the terms "you", "your" & "yours" refer to YOU (the individual whose Personal Data we are referring to).</p>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">What Personal Data Do We Collect, Store and Process?</h3>
      <p class="mb-[8px]">Categories of Personal Data that we collect, store and process are as follows:</p>
      <ul class="list-disc pl-[24px] mb-[16px] space-y-[4px]">
        <li>Demographic, Identity & Contact Data (for e.g., name, last name, date of birth, gender, email address, address proof, contact number, language, occupation, physical address with pin code, preferences and interests.)</li>
        <li>Personal Identification Number (for e.g., PAN Card No, GST no, Passport and Aadhaar Number)</li>
        <li>Financial Account Details (for e.g., Bank account details)</li>
        <li>Educational & Professional Data</li>
        <li>Online Identifiers and other Technical Data (for e.g., IP address, browser type, device identifiers)</li>
        <li>Personal Data collected via permissions on our mobile applications (for e.g., camera, contacts, location data, storage, photos, fingerprint/biometric and SMS)</li>
        <li>Communications details (for e.g., communication done through emails)</li>
        <li>Generated Data (for e.g., logs, transaction records)</li>
        <li>Information relevant to surveys that we undertake.</li>
        <li>Testimonials that may contain some Personal Data.</li>
        <li>Voice recordings for training and analytics purpose.</li>
        <li>Videos for analytics purpose.</li>
      </ul>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">Where Do We Collect Your Personal Data From?</h3>
      <p class="mb-[8px]">We collect your Personal Data in the following ways:</p>
      <ul class="list-disc pl-[24px] mb-[16px] space-y-[4px]">
        <li>When you visit our website or social media pages and fill in the registration form and use the Contact Us facility.</li>
        <li>When you interact with us via our websites or use services on our websites including customer support.</li>
        <li>When you use the chatbot on our website.</li>
        <li>When we reach out to via WhatsApp based on your interest through landing pages on our website.</li>
        <li>When you interact with our channel partners.</li>
        <li>When you visit our site.</li>
        <li>When you submit your KYC details for the purpose of booking the units and registration of agreements.</li>
      </ul>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">How Do We Use Your Personal Data?</h3>
      <p class="mb-[8px]">We use your Personal Data for the following purposes:</p>
      <ul class="list-disc pl-[24px] mb-[16px] space-y-[4px]">
        <li>If you express an interest in our services, we collect and share your Personal Data to schedule a site/office visit and follow up on the requirement.</li>
        <li>If you are an existing customer, we collect your Personal Data to authenticate your account, provide projects and services, communicate regarding existing projects and services via SMS, WhatsApp, Email and other media, evaluate and improve our services, for market and product analysis, to send information about other products or services, to obtain feedback and handle enquiries and complaints, to comply with legal or regulatory requirements, and to reach out for service and maintenance reminders.</li>
        <li>If you are a channel partner, we collect your Personal Data for onboarding and invoicing purposes.</li>
        <li>If you are a website visitor, we process your Personal Data to optimize your website experience and customize content.</li>
        <li>If you are a prospective employee, we collect your Personal Data for employment evaluation purposes.</li>
        <li>We may record communications including telephone calls for identification, investigation, regulatory, training and quality purposes.</li>
        <li>We may use CCTV in and around our premises for security purposes and to prevent crimes.</li>
        <li>We also use your Personal Data for marketing and promotional campaigns.</li>
        <li>KYC documents will be used for registration of agreements and to submit relevant details to competent authorities.</li>
      </ul>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">On What Legal Grounds Do We Process Your Personal Data?</h3>
      <ul class="list-disc pl-[24px] mb-[16px] space-y-[4px]">
        <li>You have consented to us processing your Personal Data for specified reasons.</li>
        <li>The processing is necessary to carry out our contractual obligation with you.</li>
        <li>To evaluate, develop and improve our projects and services.</li>
        <li>The processing is necessary for compliance with a legal obligation.</li>
      </ul>
      <p class="mb-[16px]">Where the processing is based on your consent, you have the right to withdraw your consent at any point in time. Upon receipt of your request, the consequences of withdrawal will be communicated to you. You may withdraw your consent by contacting us using the details specified in the 'Contact Us' section.</p>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">Who Do We Share Your Personal Data With?</h3>
      <ul class="list-disc pl-[24px] mb-[16px] space-y-[4px]">
        <li>Our Parent Company for business and operational purposes.</li>
        <li>Our affiliates or group companies.</li>
        <li>Third Party Service Providers who work for us or provide services or products to us.</li>
        <li>To respond to court orders, or legal process, or to establish our legal rights or defend against legal claims.</li>
        <li>If we are acquired by or merged with another company.</li>
        <li>To competent authorities to comply with statutory requirements.</li>
      </ul>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">International Data Transfer</h3>
      <p class="mb-[16px]">The data collected from you is stored in India. We may transfer your Personal Data to other countries outside your country of residence for any of the purposes defined in this Privacy Notice. Any Personal Data that we transfer will be protected in accordance with this Privacy Notice.</p>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">How Do We Secure Your Personal Data?</h3>
      <p class="mb-[16px]">We are committed to protecting your Personal Data in our custody. We take reasonable steps to ensure that appropriate physical, technical and managerial safeguards are in place to protect your Personal Data from unauthorized access, alteration, transmission, and deletion.</p>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">How Long Do We Keep Your Personal Data?</h3>
      <p class="mb-[16px]">We retain your Personal Data for as long as it is required to fulfil the purposes outlined in this Privacy Notice and for legal or regulatory reasons.</p>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">How Do We Use Cookies and Other Tracking Mechanisms?</h3>
      <p class="mb-[16px]">We use cookies and other tracking mechanisms on our website to collect data about you. We use the data collected from cookies and trackers to analyze trends and statistics. This will help us optimize and customize your website experience and to provide better website functionalities.</p>
      <p class="mb-[16px]">We collect Personal Data about you via Mobile Applications using permissions such as camera, contacts/telephone, location, photo, SMS, etc. Your iOS and Android devices will notify you of the permissions that our app seeks and will provide you with an option to consent to or refuse the permission.</p>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">What Are Your Privacy Rights?</h3>
      <ul class="list-disc pl-[24px] mb-[16px] space-y-[4px]">
        <li><strong>Right to Confirmation and Access:</strong> You have the right to get confirmation and access to your Personal Data that is with us along with other supporting information.</li>
        <li><strong>Right to Correction:</strong> You have the right to ask us to correct your Personal Data that is with us that you think is inaccurate or incomplete.</li>
        <li><strong>Right to Erasure:</strong> You have the right to ask us to erase your Personal Data under certain circumstances.</li>
        <li><strong>Right to Data Portability:</strong> You have the right to ask that we transfer the Personal Data you gave us to another organisation, or to you, under certain circumstances.</li>
        <li><strong>Right to be Forgotten:</strong> You have the right to restrict or prevent the continuing disclosure of your personal data under certain circumstances.</li>
        <li><strong>Right to Lodge a Complaint:</strong> You have the right to lodge a complaint with the Regulator.</li>
      </ul>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">Links to Other Websites</h3>
      <p class="mb-[16px]">Our website may contain links to websites of other organisations. This Privacy Notice does not cover how that organisation processes Personal Data. We encourage you to read the Privacy Notices of the other websites you visit.</p>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">How Do We Keep This Notice Up to Date?</h3>
      <p class="mb-[16px]">We regularly review and update our Privacy Notice to ensure it is up-to-date and accurate. Any changes we may make to this Privacy Notice in the future will be posted on this page.</p>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">Limitation of Liability</h3>
      <p class="mb-[16px]">To the extent permissible under the law, we shall not be liable for any indirect, incidental, special, consequential or exemplary damages or damages due to data theft by any person or agency vide an illegal access despite our efforts to protect such data, including but not limited to, damages for loss of profits, goodwill, data, information, or other intangible losses.</p>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">Governing Law, Jurisdiction and Dispute Resolution</h3>
      <p class="mb-[16px]">This Privacy Policy shall be construed and governed by the laws of India without regard to principles of conflict of laws. All disputes shall be referred to sole arbitration of an arbitrator to be nominated by the MCCI Arbitration, Mediation and Conciliation Centre (MAMC), The Madras Chamber of Commerce and Industry, Chennai - 600 035, and such arbitration shall be conducted in accordance with the provisions of the Arbitration and Conciliation (Amendment) Act, 2021, in English language, and the seat of arbitration shall be at Chennai.</p>

      <h3 class="font-caudex font-bold text-[18px] text-black mb-[8px] mt-[20px]">How Do You Contact Us?</h3>
      <p class="mb-[16px]">For any further queries and complaints related to privacy, you could reach us at <a href="mailto:gdpo@tvsemerald.com" class="text-tvs-red underline">gdpo@tvsemerald.com</a>.</p>
    </div>
  </div>
</div>

<script>
  function openPrivacyModal() { document.getElementById('privacyModal').classList.remove('hidden'); document.getElementById('privacyModal').classList.add('flex'); document.body.style.overflow = 'hidden'; }
  function closePrivacyModal() { document.getElementById('privacyModal').classList.add('hidden'); document.getElementById('privacyModal').classList.remove('flex'); document.body.style.overflow = ''; }
</script>

</body>

</html>
    