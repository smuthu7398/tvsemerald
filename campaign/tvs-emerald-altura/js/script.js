// ============================================================
// Lead-capture (client-side bits only; UTM/pageUrl/referrer come from PHP):
//   Browser / OS / device → navigator.userAgent
//   City / Country        → ipapi.co geolocation (best effort, cached)
// ============================================================
(function () {
  var STORAGE_KEY = "tvs_lead_geo";
  var ua = navigator.userAgent || "";

  function detectBrowser(ua) {
    if (/Edg\//i.test(ua)) return "Microsoft Edge";
    if (/OPR\/|Opera/i.test(ua)) return "Opera";
    if (/Chrome/i.test(ua) && !/Chromium/i.test(ua)) return "Google Chrome";
    if (/Safari/i.test(ua) && !/Chrome/i.test(ua)) return "Safari";
    if (/Firefox/i.test(ua)) return "Firefox";
    if (/MSIE|Trident/i.test(ua)) return "Internet Explorer";
    return "Other";
  }
  function detectOS(ua) {
    if (/Windows NT 10/i.test(ua)) return "Windows 10";
    if (/Windows NT 6\.3/i.test(ua)) return "Windows 8.1";
    if (/Windows NT 6\.2/i.test(ua)) return "Windows 8";
    if (/Windows NT 6\.1/i.test(ua)) return "Windows 7";
    if (/Windows/i.test(ua)) return "Windows";
    if (/Android/i.test(ua)) return "Android";
    if (/iPhone|iPad|iPod/i.test(ua)) return "iOS";
    if (/Mac OS X/i.test(ua)) return "Mac OS";
    if (/Linux/i.test(ua)) return "Linux";
    return "Other";
  }
  function detectDeviceType(ua) {
    if (/iPad|Tablet|PlayBook|(Android(?!.*Mobile))/i.test(ua)) return "t";
    if (/Mobile|iPhone|iPod|Android.*Mobile|BlackBerry|Opera Mini|IEMobile/i.test(ua)) return "m";
    return "c";
  }
  function detectDeviceName(ua, os) {
    if (/iPhone/i.test(ua)) return "iPhone";
    if (/iPad/i.test(ua)) return "iPad";
    if (/Android.*Mobile/i.test(ua)) return "Android Phone";
    if (/Android/i.test(ua)) return "Android Tablet";
    return os + " PC";
  }

  var browserName = detectBrowser(ua);
  var osName = detectOS(ua);
  var deviceType = detectDeviceType(ua);
  var deviceName = detectDeviceName(ua, osName);

  function setHidden(name, value) {
    if (value == null) return;
    document.querySelectorAll('input[type="hidden"][name="' + name + '"]').forEach(function (el) {
      el.value = value;
    });
  }

  var geo = {};
  try { geo = JSON.parse(sessionStorage.getItem(STORAGE_KEY) || "{}"); } catch (e) {}

  function populate() {
    setHidden("Browser__c", browserName);
    setHidden("Operating_System__c", osName);
    setHidden("detect_device", deviceType);
    setHidden("detect_device_name", deviceName);
    if (geo.City__c) setHidden("City__c", geo.City__c);
    if (geo.Country__c) setHidden("Country__c", geo.Country__c);
  }

  populate();

  if (!geo.City__c || !geo.Country__c) {
    try {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "https://ipapi.co/json/", true);
      xhr.timeout = 4000;
      xhr.onload = function () {
        if (xhr.status < 200 || xhr.status >= 300) return;
        try {
          var r = JSON.parse(xhr.responseText);
          if (r && r.city) geo.City__c = r.city;
          if (r && r.country_name) geo.Country__c = r.country_name;
          try { sessionStorage.setItem(STORAGE_KEY, JSON.stringify(geo)); } catch (e) {}
          setHidden("City__c", geo.City__c || "");
          setHidden("Country__c", geo.Country__c || "");
        } catch (e) {}
      };
      xhr.send();
    } catch (e) {}
  }

  document.addEventListener("submit", populate, true);
})();

$(document).ready(function () {
  // MOBILE MENU TOGGLE
  $("#hamburger-btn").on("click", function () {
    $("#mobile-menu").addClass("active");
    $("#mobile-menu-overlay").addClass("active");
    $("body").css("overflow", "hidden");
  });

  $("#mobile-menu-close, #mobile-menu-overlay").on("click", function () {
    $("#mobile-menu").removeClass("active");
    $("#mobile-menu-overlay").removeClass("active");
    $("body").css("overflow", "");
  });

  // Close mobile menu on nav link click
  $(".mobile-nav-link").on("click", function () {
    $("#mobile-menu").removeClass("active");
    $("#mobile-menu-overlay").removeClass("active");
    $("body").css("overflow", "");
  });

  // PROJECT HIGHLIGHTS CAROUSEL
  const highlightsData = [
    {
      number: "01",
      title: "Forest Living",
      cardTitle: "Vaastu-compliant harmonious homes",
      cardDesc:
        "Spacious 2 & 3 BHK layouts with excellent ventilation, thoughtfully planned for family living, privacy and views in a well-connected sanctuary.",
    },
    {
      number: "02",
      title: "Grand Clubhouses",
      cardTitle: "2 Grand Clubhouses with 35+ Amenities",
      cardDesc:
        "State-of-the-art facilities including swimming pool, gym, badminton court, spa, golf simulator, pilates studio, and multipurpose halls.",
    },
    {
      number: "03",
      title: "Premium Location",
      cardTitle: "Strategic location on Bagalur Main Road",
      cardDesc:
        "Excellent connectivity to IT hubs, schools, hospitals and shopping centres. Minutes from the upcoming metro station and international airport.",
    },
  ];
  let highlightIndex = 0;

  function updateHighlight(index) {
    // Fade slides
    $(".highlight-slide").each(function () {
      $(this).css({ opacity: 0, transition: "opacity 0.6s ease" });
    });
    $(`.highlight-slide[data-index="${index}"]`).css({ opacity: 1 });

    // Update text
    $(".highlight-number").text(highlightsData[index].number);
    $(".highlight-title").text(highlightsData[index].title);
    $(".highlight-card-title").text(highlightsData[index].cardTitle);
    $(".highlight-card-desc").text(highlightsData[index].cardDesc);
  }

  // AMENITIES CAROUSEL — handled in separate script block below

  // CLUBHOUSE CAROUSEL

  let clubIndex = 0;
  const totalClubSlides = $(".clubhouse-slide-item").length;

  function getClubSlideWidth() {
    var $container = $("#clubhouse-slider-track").parent();
    return $container.width();
  }

  function updateClubhouse(index) {
    var slideW = getClubSlideWidth();
    // Set explicit widths so slides fill the visible container
    $("#clubhouse-slider-track").css("width", (totalClubSlides * slideW) + "px");
    $(".clubhouse-slide-item").css("width", slideW + "px");
    // Move slider
    $(".clubhouse-slider").css({
      transform: `translateX(-${index * slideW}px)`,
      transition: "transform 0.5s ease",
    });

    // Update background
    $(".clubhouse-bg").each(function () {
      $(this).css({ opacity: 0, transition: "opacity 0.6s ease" });
    });
    $(`.clubhouse-bg[data-index="${index}"]`).css({ opacity: 1 });
  }

  $("#club-next").on("click", function () {
    clubIndex = (clubIndex + 1) % totalClubSlides;
    updateClubhouse(clubIndex);
  });

  $("#club-prev").on("click", function () {
    clubIndex = (clubIndex - 1 + totalClubSlides) % totalClubSlides;
    updateClubhouse(clubIndex);
  });

  // Mobile Swipe for Clubhouse Gallery
  const clubhouseContainer = document.getElementById("clubhouse-slider-track");
  if (clubhouseContainer) {
    let cbTouchX = 0;
    let cbTouchY = 0;
    clubhouseContainer.addEventListener(
      "touchstart",
      (e) => {
        cbTouchX = e.changedTouches[0].screenX;
        cbTouchY = e.changedTouches[0].screenY;
      },
      { passive: true },
    );
    clubhouseContainer.addEventListener(
      "touchend",
      (e) => {
        let endX = e.changedTouches[0].screenX;
        let endY = e.changedTouches[0].screenY;
        let diffX = endX - cbTouchX;
        let diffY = endY - cbTouchY;
        if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 40) {
          if (diffX < 0)
            $("#club-next").click(); // Swipe left -> next
          else $("#club-prev").click(); // Swipe right -> prev
        }
      },
      { passive: true },
    );
  }

  // Set initial slide widths
  updateClubhouse(clubIndex);

  // Recalculate clubhouse slider on resize
  $(window).on("resize", function () {
    updateClubhouse(clubIndex);
  });

  // ===============================
  // MASTER PLAN TABS
  // ===============================
  $(".masterplan-tab").on("click", function () {
    $(".masterplan-tab").removeClass("tab-active").addClass("text-[#3c3b3b]");
    $(this).addClass("tab-active").removeClass("text-[#3c3b3b]");
  });

  // ===============================
  // GALLERY TABS
  // ===============================
  // $('.gallery-tab').on('click', function () {
  //   $('.gallery-tab').removeClass('tab-active').addClass('text-[#3c3b3b]');
  //   $(this).addClass('tab-active').removeClass('text-[#3c3b3b]');
  // });
  $(".gallery-tab").on("click", function () {
    const tab = $(this).data("tab");

    // tab active styling
    $(".gallery-tab").removeClass("tab-active").addClass("text-[#3c3b3b]");

    $(this).addClass("tab-active").removeClass("text-[#3c3b3b]");

    // show/hide content
    $(".gallery-content").addClass("hidden");
    $("#" + tab).removeClass("hidden");

    // refresh owl after switching
    $("#" + tab)
      .find(".gallery-carousel")
      .trigger("refresh.owl.carousel");
  });

  // ===============================
  // GALLERY IMAGE HOVER TITLES
  // ===============================
  $(".gallery-carousel .item.gallery-image-popup").each(function () {
    var title = $(this).find("img").attr("alt");
    if (title) {
      $(this).addClass("overflow-hidden group");
      $(this).append(
        '<span class="md:hidden absolute top-[10px] left-[20px] bg-black/60 text-white font-blacker text-[12px] px-[10px] py-[4px] rounded-[4px] pointer-events-none z-10">' + title + '</span>' +
        '<div class="hidden md:flex absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 items-center justify-center pointer-events-none z-10">' +
        '<span class="text-white font-blacker text-[16px] md:text-[20px] text-center px-3">' + title + '</span>' +
        '</div>'
      );
    }
  });

  // ===============================
  // LOCATION HIGHLIGHTS CAROUSEL
  // ===============================
  window.locationData = [
    {
      category: "IT Hubs",
      items: [
        { num: "01", name: "Bhartiya City IT Park", dist: "5.3 Km" },
        { num: "02", name: "Purvankara Business Park", dist: "8.4 Km" },
        { num: "03", name: "L&T Tech Park", dist: "11 Km" },
        { num: "04", name: "Century Downtown", dist: "10.5 Km" },
        { num: "05", name: "Manyata Tech Park", dist: "10.2 Km" },
        { num: "06", name: "Prestige Century Landmark", dist: "12.9 Km" },
      ],
    },
    {
      category: "Educational Institutions",
      items: [
        { num: "01", name: "Delhi Public School", dist: "1.6 Km" },
        { num: "02", name: "Reva University", dist: "1.3 Km" },
        { num: "03", name: "EuroSchool North Campus", dist: "4 Km" },
        { num: "04", name: "Presidency PU College", dist: "4 Km" },
        { num: "05", name: "Ryan International", dist: "5.9 Km" },
        { num: "06", name: "Chrysalis High School", dist: "11.2 Km" },
      ],
    },
    {
      category: "Hospitals",
      items: [
        { num: "01", name: "Apex Multi Speciality", dist: "1.6 Km" },
        { num: "02", name: "Manipal Hospital", dist: "4.3 Km" },
        { num: "03", name: "Cytecare Hospital", dist: "4.8 Km" },
        { num: "04", name: "Sparsh Hospital", dist: "5.8 Km" },
        { num: "05", name: "Cloudnine", dist: "12.3 Km" },
        { num: "06", name: "Aster CMI", dist: "14.8 Km" },
      ],
    },
    {
      category: "Retail Hubs",
      items: [
        { num: "01", name: "Bhartiya City Mall", dist: "5.9 Km" },
        { num: "02", name: "Elements Mall", dist: "9.3 Km" },
        { num: "03", name: "Phoenix Mall of Asia", dist: "12.1 Km" },
        { num: "04", name: "Esteem Mall", dist: "12.7 Km" },
      ],
    },
    {
      category: "Transportation",
      items: [
        { num: "01", name: "Upcoming Bagalur Cross Metro Station", dist: "2.5 Km" },
        { num: "02", name: "Upcoming Bettahalasuru Metro Station", dist: "3 Km" },
        { num: "03", name: "Yelahanka Railway Station", dist: "6 Km" },
        { num: "04", name: "Kempegowda International Airport, Bengaluru", dist: "16 Km" },
        { num: "05", name: "Upcoming Nagawara Metro Station", dist: "9.9 Km" },
        { num: "06", name: "Upcoming Jakkur Metro Station", dist: "10.4 Km" },
        { num: "07", name: "Upcoming Kodigehalli Metro Station", dist: "11.8 Km" },
        { num: "08", name: "Upcoming Hebbal Metro Station", dist: "16.4 Km" },
        { num: "09", name: "Kempegowda International Airport", dist: "16.1 Km" },
      ],
    },
  ];
  let locationIndex = 0;

  function updateLocation(index) {
    const data = locationData[index];
    $(".location-category-title").fadeOut(200, function () {
      $(this).text(data.category).fadeIn(200);
    });

    let html = "";
    data.items.forEach(function (item) {
      html += `
          <div class="location-item flex items-center font-poppins text-[16px] md:text-[17px] lg:text-[18px] text-[#0b253e] capitalize leading-normal">
            <span class="w-[50px] md:w-[67px] text-center">${item.num}</span>
            <span class="flex-1">${item.name}</span>
            <span class="text-right">${item.dist}</span>
          </div>
        `;
    });

    $(".location-list").fadeOut(200, function () {
      $(this).html(html).fadeIn(200);
    });

    if (window.renderMapMarkers) {
      window.renderMapMarkers(data.category);
    }
  }

  $(document).on("click", ".location-next", function () {
    locationIndex = (locationIndex + 1) % locationData.length;
    updateLocation(locationIndex);
  });

  $(document).on("click", ".location-prev", function () {
    locationIndex =
      (locationIndex - 1 + locationData.length) % locationData.length;
    updateLocation(locationIndex);
  });

  // ===============================
  // SMOOTH SCROLL FOR NAV LINKS
  // ===============================
  $('a[href^="#"]')
    .not(".popup-link")
    .on("click", function (e) {
      e.preventDefault();
      const target = $(this).attr("href");
      if ($(target).length) {
        $("html, body").animate(
          {
            scrollTop: $(target).offset().top - 50,
          },
          600,
        );
      }
    });
});

const mainHeader = document.getElementById("main-header");
const headerLogo = document.getElementById("header-logo");

function updateHeader() {
  var heroSection = document.getElementById("hero");
  var threshold = heroSection ? heroSection.offsetHeight - 100 : 10;

  if (window.scrollY > threshold) {
    mainHeader.classList.add("bg-[#faf7f0]", "shadow-[0_4px_20px_rgba(0,0,0,0.15)]");
    mainHeader.classList.remove("header-transparent");
    headerLogo.src = "assets/images/logo.png";
  } else {
    mainHeader.classList.remove("bg-[#faf7f0]", "shadow-[0_4px_20px_rgba(0,0,0,0.15)]");
    mainHeader.classList.add("header-transparent");
    headerLogo.src = "assets/images/tvs-altura-white-logo.png";
  }
}

window.addEventListener("scroll", updateHeader);
updateHeader();

document.addEventListener("DOMContentLoaded", function () {
  const tab = document.getElementById("sticky-form-tab");
  const panel = document.getElementById("sticky-form-panel");
  const closeBtn = document.getElementById("sticky-form-close");
  const overlay = document.getElementById("sticky-overlay");

  if (tab && panel && closeBtn) {
    tab.addEventListener("click", function () {
      panel.classList.add("open");
      tab.classList.add("hidden-tab");
      // Fade overlay in only after the slide-in transition completes
      panel.addEventListener("transitionend", function onOpen(e) {
        if (e.propertyName === "transform") {
          overlay.style.opacity = "1";
          overlay.style.pointerEvents = "auto";
          panel.removeEventListener("transitionend", onOpen);
        }
      });
    });

    function closePanel() {
      // Fade overlay out first, then slide the panel away
      overlay.style.opacity = "0";
      overlay.style.pointerEvents = "none";
      setTimeout(function () {
        panel.classList.remove("open");
        tab.classList.remove("hidden-tab");
      }, 300); // match overlay fade duration
    }

    closeBtn.addEventListener("click", closePanel);
    overlay.addEventListener("click", closePanel);
  }

  const footerSection = document.getElementById("contact");
  const mobileStickyBar = document.getElementById("mobile-sticky-bar");
  const scrollDownBtn = document.getElementById("scroll-down-btn");
  const heroSection = document.getElementById("hero");

  let footerVisible = false;

  function getHeroBottom() {
    if (!heroSection) return 0;
    return heroSection.offsetTop + heroSection.offsetHeight;
  }

  function updateStickyVisibility() {
    var pastHero = window.scrollY > getHeroBottom();
    var shouldHide = !pastHero || footerVisible;

    tab.style.transition =
      "opacity 0.3s ease, transform 0.4s cubic-bezier(0.4, 0, 0.2, 1)";

    if (shouldHide) {
      tab.style.opacity = "0";
      tab.style.pointerEvents = "none";

      if (mobileStickyBar) {
        mobileStickyBar.style.opacity = "0";
        mobileStickyBar.style.pointerEvents = "none";
      }

      if (panel.classList.contains("open")) {
        overlay.style.opacity = "0";
        overlay.style.pointerEvents = "none";
        panel.classList.remove("open");
        tab.classList.remove("hidden-tab");
      }
    } else {
      tab.style.opacity = "1";
      tab.style.pointerEvents = "auto";

      if (mobileStickyBar) {
        mobileStickyBar.style.opacity = "1";
        mobileStickyBar.style.pointerEvents = "auto";
      }
    }
  }

  // Use scroll event for reliable position-based check
  window.addEventListener("scroll", updateStickyVisibility, { passive: true });

  // Also hide when footer is visible
  const footerObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.target === footerSection)
          footerVisible = entry.isIntersecting;
      });
      updateStickyVisibility();
    },
    { threshold: 0.1 },
  );

  if (footerSection) footerObserver.observe(footerSection);
});

// ========== PROJECT HIGHLIGHTS - ACCORDION + OWL CAROUSEL ON MOBILE/TABLET ==========
var highlightsOwl = null;
function handleHighlightsCarousel() {
  var needCarousel = $(window).width() < 1025;
  if (needCarousel && !highlightsOwl) {
    highlightsOwl = $('#highlightsGrid').addClass('owl-carousel owl-theme').owlCarousel({
      loop: true,
      nav: false,
      dots: true,
      autoplay: true,
      autoplayTimeout: 5000,
      smartSpeed: 500,
      margin: 10,
      touchDrag: true,
      mouseDrag: true,
      pullDrag: true,
      responsive: {
        0: { items: 1, stagePadding: 30 },
        640: { items: 3, stagePadding: 0 }
      }
    });
  } else if (!needCarousel && highlightsOwl) {
    highlightsOwl.trigger('destroy.owl.carousel');
    $('#highlightsGrid').removeClass('owl-carousel owl-theme owl-loaded');
    highlightsOwl = null;
  }
}
$(document).ready(function() {
  handleHighlightsCarousel();
  $(window).on('resize', handleHighlightsCarousel);
  $('#highlightsPrev').on('click', function () { $('#highlightsGrid').trigger('prev.owl.carousel'); });
  $('#highlightsNext').on('click', function () { $('#highlightsGrid').trigger('next.owl.carousel'); });

});

// LOCATION HIGHLIGHTS CAROUSEL
// Supports both: original (opacity slides) and stage (owl carousel) versions

var locationHighlightCardData = [
  { number: "01", title: "Connectivity", description: "Easy access to metro, rail & airport", mapCategory: "Connectivity", bulletCategory: "Transportation" },
  { number: "02", title: "Educational Institutions", description: "Ensure the best education for your kids", mapCategory: "Educational Institutions", bulletCategory: "Educational Institutions" },
  { number: "03", title: "IT Hubs", description: "Seamless connectivity to key business centres", mapCategory: "IT Hubs", bulletCategory: "IT Hubs" },
  { number: "04", title: "Hospitals", description: "Access trusted healthcare facilities in minutes", mapCategory: "Hospitals", bulletCategory: "Hospitals" },
  { number: "05", title: "Retail Hubs", description: "Shop, dine, and unwind close to home", mapCategory: "Retail Hubs", bulletCategory: "Retail Hubs" },
];

$(document).ready(function () {
  var $locThumb = $("#locationThumbCarousel");

  // Stage version: Owl Carousel (thumb carousel drives everything)
  if ($locThumb.length) {

    $locThumb.owlCarousel({
      items: 1, loop: true, dots: false, nav: false,
      animateOut: "fadeOut", animateIn: "fadeIn", smartSpeed: 500,
    });

    function updateLocationText(index) {
      var d = locationHighlightCardData[index % locationHighlightCardData.length];
      $("#locationTitle").text(d.title);
      $("#locationDescription").text(d.description);

      // Update map markers
      if (window.renderMapMarkers && d.mapCategory) {
        window.renderMapMarkers(d.mapCategory);
      }

      // Update location bullets from locationData
      var bulletCategory = d.bulletCategory;
      var matchedData = null;
      if (typeof window.locationData !== 'undefined') {
        for (var i = 0; i < window.locationData.length; i++) {
          if (window.locationData[i].category === bulletCategory) {
            matchedData = window.locationData[i];
            break;
          }
        }
      }
      if (matchedData) {
        var bulletHtml = "";
        // Show first 4 items in consistent format: Name – Distance
        matchedData.items.slice(0, 4).forEach(function(item, idx) {
          var num = ('0' + (idx + 1)).slice(-2);
          bulletHtml += '<div class="flex items-start font-poppins text-[12px] md:text-[13px] text-[#0b253e] leading-[22px] rounded py-[2px]">' +
            '<span class="w-[24px] flex-shrink-0">' + num + '.</span>' +
            '<span>' + item.name + ' \u2013 ' + item.dist + '</span>' +
            '</div>';
        });
        $(".location-bullet-list").fadeOut(200, function() {
          $(this).html(bulletHtml).fadeIn(200);
        });
      }
    }

    $locThumb.on("changed.owl.carousel", function (e) {
      var idx = e.item.index - e.relatedTarget._clones.length / 2;
      var count = e.item.count;
      idx = ((idx % count) + count) % count;
      updateLocationText(idx);
    });

    $("#location-highlights-next").on("click", function () {
      $locThumb.trigger("next.owl.carousel");
    });
    $("#location-highlights-prev").on("click", function () {
      $locThumb.trigger("prev.owl.carousel");
    });

    // Initial load of bullets
    updateLocationText(0);

  }
  // Original version: opacity-based slides
  else {
    var locationSlides = document.querySelectorAll(".location-highlight-slide");
    var locationLine = document.getElementById("location-active-line");
    var locationCurrent = 0;

    function updateLocationUI() {
      locationSlides.forEach(function (slide, i) {
        slide.classList.toggle("opacity-0", i !== locationCurrent);
      });
      if (locationLine) {
        var move = locationCurrent * 130;
        locationLine.style.transform = "translateX(" + move + "px)";
      }
      var d = locationHighlightCardData[locationCurrent];
      var numEl = document.querySelector(".location-highlight-number");
      var titleEl = document.querySelector(".location-highlight-title");
      var cardEl = document.querySelector(".location-highlight-card-title");
      if (numEl) numEl.textContent = d.number;
      if (titleEl) titleEl.textContent = d.title;
      if (cardEl) cardEl.textContent = d.cardTitle;
    }

    var nextBtn = document.getElementById("location-highlights-next");
    var prevBtn = document.getElementById("location-highlights-prev");

    if (nextBtn) nextBtn.onclick = function () {
      locationCurrent = (locationCurrent + 1) % locationSlides.length;
      updateLocationUI();
    };
    if (prevBtn) prevBtn.onclick = function () {
      locationCurrent = (locationCurrent - 1 + locationSlides.length) % locationSlides.length;
      updateLocationUI();
    };

    // Mobile Swipe
    var locContainer = document.getElementById("location-highlights");
    if (locContainer) {
      var locTouchX = 0, locTouchY = 0;
      locContainer.addEventListener("touchstart", function (e) {
        locTouchX = e.changedTouches[0].screenX;
        locTouchY = e.changedTouches[0].screenY;
      }, { passive: true });
      locContainer.addEventListener("touchend", function (e) {
        var diffX = e.changedTouches[0].screenX - locTouchX;
        var diffY = e.changedTouches[0].screenY - locTouchY;
        if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 40) {
          if (diffX < 0) nextBtn.click();
          else prevBtn.click();
        }
      }, { passive: true });
    }
  }
});

let amenityIndex = 0;
const totalAmenities = $(".amenity-slide").length;
let amenityAnimating = false;

const line1 = document.getElementById("amenity-active-line");

function animateAmenity(newIndex, direction) {
  if (amenityAnimating) return;
  amenityAnimating = true;

  var $current = $(`.amenity-slide[data-index="${amenityIndex}"]`);
  var $next = $(`.amenity-slide[data-index="${newIndex}"]`);

  // direction: 'down' = next (current leaves left/up, new enters from right/below)
  // direction: 'up' = prev (current leaves right/down, new enters from left/above)
  var enterFrom = direction === "down" ? "100%" : "-100%";
  var exitTo = direction === "down" ? "-100%" : "100%";

  var isMobile = window.innerWidth < 768;
  var transformProp = isMobile ? "translateX" : "translateY";

  // Position new slide at start position (no transition)
  $next.css({
    transform: transformProp + "(" + enterFrom + ")",
    transition: "none",
  });

  // Force reflow
  $next[0].offsetHeight;

  // Animate both slides
  $current.css({
    transform: transformProp + "(" + exitTo + ")",
    transition: "transform 0.7s cubic-bezier(0.4, 0, 0.2, 1)",
  });
  $next.css({
    transform: transformProp + "(0)",
    transition: "transform 0.7s cubic-bezier(0.4, 0, 0.2, 1)",
  });

  // Move vertical indicator (Desktop only)
  var move = newIndex * 80;
  if (line1) {
    line1.style.transform = "translateY(" + move + "px)";
  }

  amenityIndex = newIndex;

  setTimeout(function () {
    amenityAnimating = false;
  }, 700);
}

// next button
$(document).on("click", ".amenity-next", function () {
  var newIndex = (amenityIndex + 1) % totalAmenities;
  animateAmenity(newIndex, "down");
});

// prev button
$(document).on("click", ".amenity-prev", function () {
  var newIndex = (amenityIndex - 1 + totalAmenities) % totalAmenities;
  animateAmenity(newIndex, "up");
});

// Mobile Swipe for Amenities
const amenityContainer =
  document.getElementById("amenities") ||
  document.getElementById("clubhouse") ||
  document.querySelector(".amenity-slide").parentNode;
if (amenityContainer) {
  let amTouchY = 0;
  let amTouchX = 0;
  amenityContainer.addEventListener(
    "touchstart",
    (e) => {
      amTouchY = e.changedTouches[0].screenY;
      amTouchX = e.changedTouches[0].screenX;
    },
    { passive: true },
  );
  amenityContainer.addEventListener(
    "touchend",
    (e) => {
      let endY = e.changedTouches[0].screenY;
      let endX = e.changedTouches[0].screenX;
      let diffY = endY - amTouchY;
      let diffX = endX - amTouchX;

      // Since amenity slider is vertical, user might swipe up/down. Or left/right. Let's support both.
      if (Math.max(Math.abs(diffX), Math.abs(diffY)) > 40) {
        if (Math.abs(diffY) > Math.abs(diffX)) {
          if (diffY < 0)
            $(".amenity-next").click(); // swipe up -> next
          else $(".amenity-prev").click(); // swipe down -> prev
        } else {
          if (diffX < 0)
            $(".amenity-next").click(); // swipe left -> next
          else $(".amenity-prev").click(); // swipe right -> prev
        }
      }
    },
    { passive: true },
  );
}

$(document).on("click", ".gallery-image-popup", function (e) {
  e.preventDefault();
  var $this = $(this);
  var $gallery = $this.closest(".gallery-carousel");
  var titleSrc = function () {
    return "Artistic Impression. Not an actual Site Image";
  };

  if ($gallery.length) {
    var items = [];
    var seen = {};
    var currentIndex = 0;
    $gallery.find(".gallery-image-popup").each(function () {
      if ($(this).closest(".owl-item.cloned").length) return;
      var itemSrc = $(this).data("src") || $(this).attr("href");
      if (!itemSrc || seen[itemSrc]) return;
      seen[itemSrc] = true;
      if (this === $this[0]) currentIndex = items.length;
      items.push({ src: itemSrc });
    });

    $.magnificPopup.open(
      {
        items: items,
        type: "image",
        gallery: { enabled: true, navigateByImgClick: true, preload: [0, 1] },
        image: { titleSrc: titleSrc },
        mainClass: "mfp-fade",
        removalDelay: 300,
      },
      currentIndex,
    );
    return;
  }

  var src = $this.data("src") || $this.attr("href");
  $.magnificPopup.open({
    items: { src: src },
    type: "image",
    image: { titleSrc: titleSrc },
    closeOnContentClick: true,
    mainClass: "mfp-fade",
    removalDelay: 300,
  });
});

const sections = document.querySelectorAll("section[id]");
const navLinks = document.querySelectorAll(".nav-link, .mobile-nav-link");

window.addEventListener("scroll", () => {
  let current = "";

  sections.forEach((section) => {
    const sectionTop = section.offsetTop - 120; // adjust for header height
    const sectionHeight = section.offsetHeight;

    if (pageYOffset >= sectionTop && pageYOffset < sectionTop + sectionHeight) {
      current = section.getAttribute("id");
    }
  });

  navLinks.forEach((link) => {
    link.classList.remove("text-[#b1381f]", "font-medium");

    if (link.getAttribute("href") === "#" + current) {
      link.classList.add("text-[#b1381f]", "font-medium");
    }
  });
});

document.addEventListener(
  "touchmove",
  function (event) {
    if (event.touches.length > 1) {
      event.preventDefault();
    }
  },
  { passive: false },
);

// Prevent Laptop Trackpad Pinch-to-Zoom
document.addEventListener(
  "wheel",
  function (event) {
    if (event.ctrlKey) {
      event.preventDefault();
    }
  },
  { passive: false },
);

$(document).on("click", "#plan-link", function (e) {
  e.preventDefault();

  $.magnificPopup.open({
    items: {
      src: $(this).attr("href"),
    },
    type: "image",
    mainClass: "mfp-masterplan",
    closeOnContentClick: false,
    closeBtnInside: true,
    callbacks: {
      open: function () {
        var zoomLevel = 1;

        $('#scroll-down-btn').hide();

        if (!$('.mfp-zoom-controls').length) {
          var $target = $(window).width() <= 768 ? $('.mfp-figure') : $('.mfp-container');
          $target.append(
            '<div class="mfp-zoom-controls">' +
            '<button class="mfp-zoom-out">−</button>' +
            '<button class="mfp-zoom-reset">1x</button>' +
            '<button class="mfp-zoom-in">+</button>' +
            '</div>'
          );
        }

        $('.mfp-zoom-controls').off('click').on('click', function (e) {
          e.stopPropagation();
        });
        $('.mfp-zoom-in').off('click').on('click', function (e) {
          e.stopPropagation();
          e.preventDefault();
          zoomLevel = Math.min(zoomLevel + 0.3, 4);
          $('.mfp-img').css('transform', 'scale(' + zoomLevel + ')');
        });
        $('.mfp-zoom-out').off('click').on('click', function (e) {
          e.stopPropagation();
          e.preventDefault();
          zoomLevel = Math.max(zoomLevel - 0.3, 0.5);
          $('.mfp-img').css('transform', 'scale(' + zoomLevel + ')');
        });
        $('.mfp-zoom-reset').off('click').on('click', function (e) {
          e.stopPropagation();
          e.preventDefault();
          zoomLevel = 1;
          $('.mfp-img').css('transform', 'scale(1)');
        });

        $('.mfp-img').css({ 'transition': 'transform 0.2s ease', 'transform-origin': 'center center' });
      },
      beforeClose: function () {
        $('.mfp-zoom-controls').remove();
        $('.mfp-img').css('transform', 'scale(1)');
        $('#scroll-down-btn').show();
      },
    },
  });
});

$(document).ready(function () {
  $(".popup-link").magnificPopup({
    type: "inline",

    fixedContentPos: true, // 🔥 makes popup fixed
    fixedBgPos: true,

    overflowY: "auto",

    closeBtnInside: true,
    preloader: false,
    midClick: true,

    removalDelay: 300,
    mainClass: "mfp-fade",
  });
});

const phoneInputs = document.querySelectorAll(
  ".phone-input, .phone-input-mobile",
);

phoneInputs.forEach((input) => {
  window.intlTelInput(input, {
    initialCountry: "in",
    separateDialCode: true,
    preferredCountries: ["in", "us", "gb"],
    dropdownContainer: document.body,
    utilsScript:
      "https://cdn.jsdelivr.net/npm/intl-tel-input@18.5.3/build/js/utils.js",
  });
});

$("#gallery .gallery-tab").on("click", function () {
  // remove active only inside gallery
  $("#gallery .gallery-tab")
    .removeClass("tab-active")
    .addClass("text-[#3c3b3b]");

  // add active to clicked tab
  $(this).addClass("tab-active").removeClass("text-[#3c3b3b]");

  // hide only gallery contents
  $("#gallery .gallery-content").addClass("hidden");

  // show selected content
  const tab = $(this).data("tab");
  $("#gallery #" + tab).removeClass("hidden");

  // Lazy-init + lazy-load when the Video Gallery becomes visible.
  // Step 1: promote every iframe's data-src → src on the ORIGINAL DOM
  //         (must happen before Owl clones slides, otherwise clones inherit
  //          the unset src and stay blank).
  // Step 2: init / re-init Owl after layout settles so slide widths are real.
  if (tab === "videos") {
    $("#gallery #videos iframe[data-src]").each(function () {
      this.src = this.getAttribute("data-src");
      this.removeAttribute("data-src");
    });
    requestAnimationFrame(function () {
      if (typeof window.initVideoGalleryCarousel === "function") {
        window.initVideoGalleryCarousel();
      }
    });
  }
});

$(".masterplan-tab").on("click", function () {
  const tab = $(this).data("tab");

  $(".masterplan-tab").removeClass("tab-active").addClass("text-[#3c3b3b]");

  $(this).addClass("tab-active").removeClass("text-[#3c3b3b]");

  const $singleView = $("#single-plan-view");
  const $floorCarouselView = $("#floor-plan-carousel-view");
  const $unitPlanContainer = $("#unitplan-container-view");

  const activeViewMap = {
    "masterplan-content": $singleView,
    "floorplan-content": $floorCarouselView,
    "unitplan-content": $unitPlanContainer,
  };

  const $nextView = activeViewMap[tab];
  const allViews = [$singleView, $floorCarouselView, $unitPlanContainer];

  // Instant swap (no fade) — fading caused a visible blank/transparent
  // gap during tab switches. Update the src first so the next view is
  // already painted before being shown.
  if (tab === "masterplan-content") {
    const newSrc = planImages[tab];
    $("#plan-image").attr("src", newSrc);
    $("#plan-link").attr("href", newSrc);
  }

  allViews.forEach(function ($view) {
    if ($view.attr("id") !== $nextView.attr("id")) {
      $view.hide().addClass("hidden");
    }
  });

  $nextView.removeClass("hidden").show();

  // Always stop All Plans autoplay when leaving the Unit Plan tab —
  // prevents it from continuing to run while hidden.
  if (tab !== "unitplan-content" && window.upAllplansCarousel) {
    window.upAllplansCarousel.trigger("stop.owl.autoplay");
  }

  if (tab === "floorplan-content") {
    if (window.fpCarousel) {
      window.fpCarousel.trigger("to.owl.carousel", [0, 0]);
      window.fpCarousel.trigger("refresh.owl.carousel");
    }
  } else if (tab === "unitplan-content") {
    const activeSub =
      $(".unitplan-subtab.text-\\[\\#E35336\\]").data("target") || "2bhk2t";
    const subCarouselMap = {
      "2bhkclassic": window.up2bhkclassicCarousel,
      "2bhkpremium": window.up2bhkpremiumCarousel,
      "3bhkclassic": window.up3bhkclassicCarousel,
      "3bhkpremium": window.up3bhkpremiumCarousel,
      "3bhkluxe": window.up3bhkluxeCarousel,
      allplans: window.upAllplansCarousel,
    };
    const $active = subCarouselMap[activeSub];
    if ($active) {
      $active.trigger("to.owl.carousel", [0, 0]);
      $active.trigger("refresh.owl.carousel");
    }
    if (activeSub === "allplans" && window.upAllplansCarousel) {
      window.upAllplansCarousel.trigger("play.owl.autoplay");
    }
  }
});

$(document).ready(function () {
  // Map of sub-tab targets to their Owl carousel instance getters
  const unitplanCarousels = {
    "2bhkclassic": () => window.up2bhkclassicCarousel,
    "2bhkpremium": () => window.up2bhkpremiumCarousel,
    "3bhkclassic": () => window.up3bhkclassicCarousel,
    "3bhkpremium": () => window.up3bhkpremiumCarousel,
    "3bhkluxe": () => window.up3bhkluxeCarousel,
    allplans: () => window.upAllplansCarousel,
  };

  // Reset a carousel: stop autoplay, jump back to slide 0, refresh layout
  function resetUnitplanCarousel(key) {
    const $c = unitplanCarousels[key] && unitplanCarousels[key]();
    if (!$c) return;
    $c.trigger("stop.owl.autoplay");
    $c.trigger("to.owl.carousel", [0, 0]);
    $c.trigger("refresh.owl.carousel");
  }

  // Subtab logic for Unit Plan
  $(".unitplan-subtab").on("click", function () {
    const target = $(this).data("target");

    $(".unitplan-subtab")
      .removeClass("text-[#E35336] border-[#E35336] bg-white/70")
      .addClass("text-[#3c3b3b] border-[#3c3b3b]/40 bg-white/20");

    $(this)
      .addClass("text-[#E35336] border-[#E35336] bg-white/70")
      .removeClass("text-[#3c3b3b] border-[#3c3b3b]/40 bg-white/20");

    // Pause any currently-running carousel before swapping views
    Object.keys(unitplanCarousels).forEach(function (key) {
      const $c = unitplanCarousels[key]();
      if ($c) $c.trigger("stop.owl.autoplay");
    });

    $(".unitplan-slider-wrap").each(function () {
      if (
        $(this).is(":visible") &&
        $(this).attr("id") !== "unitplan-" + target + "-carousel-view"
      ) {
        $(this).fadeOut(200, function () {
          $(this).addClass("hidden");
        });
      }
    });

    $("#unitplan-" + target + "-carousel-view")
      .delay(200)
      .queue(function (next) {
        $(this).removeClass("hidden").css({ display: "block", opacity: 0 });
        // Refresh while visible but transparent so Owl recomputes widths
        // before the user sees anything — prevents the stacked-items flash.
        resetUnitplanCarousel(target);
        next();
      })
      .animate({ opacity: 1 }, 300, function () {
        if (target === "allplans" && window.upAllplansCarousel) {
          window.upAllplansCarousel.trigger("play.owl.autoplay");
        }
      });
  });

  // Navigation text (SVG arrows) shared across masterplan carousels
  const masterplanNavText = [
    '<svg width="12" height="20" viewBox="0 0 15 30" fill="none"><path d="M13 2L3 15L13 28" stroke-width="4"></path></svg>',
    '<svg width="12" height="20" viewBox="0 0 15 30" fill="none"><path d="M2 2L12 15L2 28" stroke-width="4"></path></svg>',
  ];

  // Initialize Carousels
  window.fpCarousel = $(".floorplan-carousel").owlCarousel({
    loop: false,
    margin: 20,
    nav: true,
    navText: masterplanNavText,
    dots: false,
    items: 1,
    autoplay: false,
    autoHeight: true,
  });
  var unitPlanOpts = {
    loop: false, margin: 20, nav: false, navText: masterplanNavText, dots: false, autoplay: false, items: 1,
  };
  window.up2bhkclassicCarousel = $(".unitplan-2bhkclassic-carousel").owlCarousel(unitPlanOpts);
  window.up2bhkpremiumCarousel = $(".unitplan-2bhkpremium-carousel").owlCarousel(unitPlanOpts);
  window.up3bhkclassicCarousel = $(".unitplan-3bhkclassic-carousel").owlCarousel(unitPlanOpts);
  window.up3bhkpremiumCarousel = $(".unitplan-3bhkpremium-carousel").owlCarousel(unitPlanOpts);
  window.up3bhkluxeCarousel = $(".unitplan-3bhkluxe-carousel").owlCarousel(unitPlanOpts);
  window.upAllplansCarousel = $(".unitplan-allplans-carousel").owlCarousel({
    loop: false,
    margin: 20,
    nav: true,
    navText: masterplanNavText,
    dots: false,
    autoplay: true,
    autoplayTimeout: 2500,
    items: 1,
  });

  // Magnific Popups
  $(
    "#floor-plan-carousel-view, #unitplan-2bhkclassic-carousel-view, #unitplan-2bhkpremium-carousel-view, #unitplan-3bhkclassic-carousel-view, #unitplan-3bhkpremium-carousel-view, #unitplan-3bhkluxe-carousel-view",
  ).magnificPopup({
    delegate: ".plan-popup",
    type: "image",
    closeOnContentClick: false,
    closeBtnInside: true,
    gallery: { enabled: true, navigateByImgClick: true, preload: [0, 1] },
    callbacks: {
      open: function() {
        var zoomLevel = 1;
        var $content = this.content;

        $('#scroll-down-btn').hide();

        // Add mobile nav arrows below image
        if ($(window).width() <= 768) {
          if (!$('.mfp-mobile-arrows').length) {
            var $mobileArrows = $('<div class="mfp-mobile-arrows">' +
              '<button class="mfp-mobile-prev">&#10094;</button>' +
              '<button class="mfp-mobile-next">&#10095;</button>' +
              '</div>');
            $('.mfp-container').append($mobileArrows);
            $mobileArrows.on('click', 'button', function(e) {
              e.stopPropagation();
              e.preventDefault();
              if ($(this).hasClass('mfp-mobile-prev')) {
                $.magnificPopup.instance.prev();
              } else {
                $.magnificPopup.instance.next();
              }
            });
          }
        }

        // Add zoom controls
        if (!$('.mfp-zoom-controls').length) {
          $('.mfp-container').append(
            '<div class="mfp-zoom-controls">' +
            '<button class="mfp-zoom-out">−</button>' +
            '<button class="mfp-zoom-reset">1x</button>' +
            '<button class="mfp-zoom-in">+</button>' +
            '</div>'
          );
        }

        $('.mfp-zoom-controls').off('click').on('click', function(e) {
          e.stopPropagation();
        });
        $('.mfp-zoom-in').off('click').on('click', function(e) {
          e.stopPropagation();
          e.preventDefault();
          zoomLevel = Math.min(zoomLevel + 0.3, 4);
          $('.mfp-img').css('transform', 'scale(' + zoomLevel + ')');
        });
        $('.mfp-zoom-out').off('click').on('click', function(e) {
          e.stopPropagation();
          e.preventDefault();
          zoomLevel = Math.max(zoomLevel - 0.3, 0.5);
          $('.mfp-img').css('transform', 'scale(' + zoomLevel + ')');
        });
        $('.mfp-zoom-reset').off('click').on('click', function(e) {
          e.stopPropagation();
          e.preventDefault();
          zoomLevel = 1;
          $('.mfp-img').css('transform', 'scale(1)');
        });

        // Reset zoom on slide change
        $('.mfp-img').css({ 'transition': 'transform 0.2s ease', 'transform-origin': 'center center' });
      },
      beforeClose: function() {
        $('.mfp-zoom-controls').remove();
        $('.mfp-mobile-arrows').remove();
        $('.mfp-img').css('transform', 'scale(1)');
        $('#scroll-down-btn').show();
      },
      change: function() {
        setTimeout(function() {
          $('.mfp-img').css({ 'transform': 'scale(1)', 'transition': 'transform 0.2s ease', 'transform-origin': 'center center' });
        }, 50);
      }
    }
  });
});

const planImages = {
  "masterplan-content": "assets/images/master-plan/MLP.webp",
};

$(document).ready(function () {
  function initCarousel() {
    $(".gallery-carousel").each(function () {
      if ($(this).hasClass("owl-loaded")) {
        $(this).trigger("destroy.owl.carousel");
        $(this).removeClass("owl-loaded");
        $(this).find(".owl-stage-outer").children().unwrap();
      }

      $(this).owlCarousel({
        loop: true,
        margin: 20,
        center: true,
        nav: false,
        dots: false,

        smartSpeed: 800,
        slideTransition: "ease",

        slideBy: 1,

        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,

        responsive: {
          0: { items: 1, center: false },
          767: { items: 2, center: false },
          1024: { items: 3 },
          1200: { items: 3 },
        },
      });
    });
  }

  initCarousel();

  // Video gallery carousel — initialised lazily on first tab click,
  // because Owl computes zero widths when its container is display:none,
  // and YouTube iframes throw Error 153 if loaded in a zero-size container.
  window.initVideoGalleryCarousel = function () {
    var $vc = $(".video-gallery-carousel");
    if (!$vc.length || $vc.hasClass("owl-loaded")) return;
    $vc.owlCarousel({
      loop: true,
      margin: 20,
      center: true,
      nav: false,
      dots: false,
      smartSpeed: 800,
      responsive: {
        0:    { items: 1, center: false },
        768:  { items: 3 },
      },
    });
  };

  // arrows
  $("#nextBtn").click(function () {
    $(".gallery-content:not(.hidden) .gallery-carousel, .gallery-content:not(.hidden) .video-gallery-carousel").trigger(
      "next.owl.carousel",
    );
  });

  $("#prevBtn").click(function () {
    $(".gallery-content:not(.hidden) .gallery-carousel, .gallery-content:not(.hidden) .video-gallery-carousel").trigger(
      "prev.owl.carousel",
    );
  });
});

$(document).ready(function () {
  $.validator.addMethod(
    "validPhoneNumber",
    function (value, element) {
      return this.optional(element) || /^\d{10}$/.test(value);
    },
    "Please enter a valid 10-digit phone number.",
  );

  $("form").each(function () {
    console.log();
    var form = $(this);
    if (form.length) {
      form.validate({
        rules: {
          name: {
            required: true,
          },
          phone: {
            required: true,
            validPhoneNumber: true,
          },
          email: {
            required: true,
            // email: true,
          },
        },
        submitHandler: function (form) {
          console.log(form.id);
          var btn = $("#" + form.id + ' [type="submit"]'),
            _form = $(form),
            loading = _form.find(".loading");
          (loading.fadeIn(),
            btn.attr("disabled", ""),
            _form.addClass("disabled"));
          $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            success: function (data) {
              (loading.fadeOut(),
                btn.removeAttr("disabled"),
                _form.removeClass("disabled"));
              if (data) {
                try {
                  if (typeof data === "string") {
                    data = jQuery.parseJSON(data);
                  }
                  // Now data is guaranteed to be a JS object
                } catch (e) {
                  console.log(e);
                }
              }
              response = data.response;
              console.log(data);
              if (response.code == 0)
                ohSnap("Failed sending your informations, please try again!", {
                  color: "red",
                });
              else if (response.code == 1) {
                form.reset();
                // If brochure form, redirect to thankyou page which then opens the Brochure PDF
                if (form.id === "brochure-form") {
                  ohSnap("Your information successfully reached us.", {
                    color: "green",
                    duration: "3000",
                  });
                  setTimeout(function () {
                    window.location = "./thankyou.php?brochure=true";
                  }, 3000);
                }
                // If download plans form, redirect to thankyou page which then opens the Unit Plans PDF
                else if (form.id === "download-plans-form") {
                  ohSnap("Your information successfully reached us.", {
                    color: "green",
                    duration: "3000",
                  });
                  setTimeout(function () {
                    window.location = "./thankyou.php?unitplans=true";
                  }, 3000);
                } else {
                ohSnap("Your information successfully reached us.", {
                  color: "green",
                  duration: "3000",
                });
                setTimeout(function () {
                  window.location = "./thankyou.php";
                }, 3000);
                }
              } else if (response.code == 10) {
                form.reset();
                ohSnap("Your information successfully reached us.", {
                  color: "green",
                  duration: "3000",
                });
                setTimeout(function () {
                  window.location = "./thankyou.php?brochure=true";
                }, 3000);
              } else if (response.code == 11) {
                form.reset();
                ohSnap("Your information successfully reached us.", {
                  color: "green",
                  duration: "500",
                });
                setTimeout(function () {
                  // debugger;
                  window.location.href = "tel:+918069236652";
                }, 500);
              } else if (response.code == 2) {
                ohSnap("User already exists!", {
                  color: "red",
                });
                form.reset();
              } else
                ohSnap("Technical Error: Please contact administrator!", {
                  color: "green",
                });
            },
          });
          return false;
        },
      });
    }
  });
});
