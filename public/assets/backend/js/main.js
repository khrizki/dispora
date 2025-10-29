// ===================== SLIDE ANIMATION =====================
function slideToggle(t, e, o) {
  if (!t) return; // ← prevent error
  t.clientHeight === 0 ? slideHandler(t, e, o, true) : slideHandler(t, e, o);
}
function slideUp(t, e, o) {
  if (!t) return;
  slideHandler(t, e, o);
}
function slideDown(t, e, o) {
  if (!t) return;
  slideHandler(t, e, o, true);
}
function slideHandler(t, e, o, i) {
  if (!t) return;
  e = e || 400;
  i = i || false;
  t.style.overflow = "hidden";
  if (i) t.style.display = "block";
  var l = window.getComputedStyle(t),
    n = parseFloat(l.height),
    a = parseFloat(l.paddingTop),
    s = parseFloat(l.paddingBottom),
    r = parseFloat(l.marginTop),
    d = parseFloat(l.marginBottom),
    g = n / e,
    y = a / e,
    m = s / e,
    u = r / e,
    h = d / e;
  window.requestAnimationFrame(function loop(x) {
    if (!t._start) t._start = x;
    var f = x - t._start;
    if (i) {
      t.style.height = g * f + "px";
      t.style.paddingTop = y * f + "px";
      t.style.paddingBottom = m * f + "px";
      t.style.marginTop = u * f + "px";
      t.style.marginBottom = h * f + "px";
    } else {
      t.style.height = n - g * f + "px";
      t.style.paddingTop = a - y * f + "px";
      t.style.paddingBottom = s - m * f + "px";
      t.style.marginTop = r - u * f + "px";
      t.style.marginBottom = d - h * f + "px";
    }
    if (f >= e) {
      t.style.height = "";
      t.style.paddingTop = "";
      t.style.paddingBottom = "";
      t.style.marginTop = "";
      t.style.marginBottom = "";
      t.style.overflow = "";
      if (!i) t.style.display = "none";
      if (typeof o === "function") o();
    } else {
      window.requestAnimationFrame(loop);
    }
  });
}

// ===================== SIDEBAR SUBMENU =====================
let sidebarItems = document.querySelectorAll(".sidebar-item.has-sub");
sidebarItems.forEach((item) => {
  const link = item.querySelector(".sidebar-link");
  const submenu = item.querySelector(".submenu");
  if (link && submenu) {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      if (submenu.classList.contains("active")) submenu.style.display = "block";
      submenu.classList.toggle("active");
      slideToggle(submenu, 300);
    });
  }
});

// ===================== RESPONSIVE SIDEBAR =====================
window.addEventListener("DOMContentLoaded", () => {
  const sidebar = document.getElementById("sidebar");
  if (!sidebar) return;
  if (window.innerWidth < 1200) sidebar.classList.remove("active");
});
window.addEventListener("resize", () => {
  const sidebar = document.getElementById("sidebar");
  if (!sidebar) return;
  if (window.innerWidth < 1200) sidebar.classList.remove("active");
  else sidebar.classList.add("active");
});

// ===================== BURGER & HIDE BUTTON =====================
const burgerBtn = document.querySelector(".burger-btn");
const sidebarHide = document.querySelector(".sidebar-hide");

if (burgerBtn) {
  burgerBtn.addEventListener("click", () => {
    const sidebar = document.getElementById("sidebar");
    if (sidebar) sidebar.classList.toggle("active");
  });
}

if (sidebarHide) {
  sidebarHide.addEventListener("click", () => {
    const sidebar = document.getElementById("sidebar");
    if (sidebar) sidebar.classList.toggle("active");
  });
}

// ===================== PERFECT SCROLLBAR =====================
if (typeof PerfectScrollbar === "function") {
  const container = document.querySelector(".sidebar-wrapper");
  if (container) {
    new PerfectScrollbar(container, { wheelPropagation: false });
  }
}

// ===================== AUTO SCROLL KE MENU AKTIF =====================
const activeItem = document.querySelector(".sidebar-item.active");
if (activeItem) activeItem.scrollIntoView(false);

// ===================== MANUAL TOGGLE OPEN/CLOSE (DARI TOMBOL LUAR) =====================
document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sidebar");
  const toggleBtn = document.getElementById("toggleSidebarBtn");
  const closeBtn = document.getElementById("closeSidebarBtn");

  if (toggleBtn && sidebar) {
    toggleBtn.addEventListener("click", () => {
      sidebar.classList.toggle("inactive");
    });
  }

  if (closeBtn && sidebar) {
    closeBtn.addEventListener("click", () => {
      sidebar.classList.add("inactive");
    });
  }
});
