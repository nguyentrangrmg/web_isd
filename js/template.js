(function ($) {
  "use strict";
  $(function () {
    var body = $("body");
    var contentWrapper = $(".content-wrapper");
    var scroller = $(".container-scroller");
    var footer = $(".footer");
    var sidebar = $(".sidebar");

    function addActiveClass(element) {
      if (current === "") {
        //for root url
        if (element.attr("href").indexOf("index.html") !== -1) {
          element.parents(".nav-item").last().addClass("active");
          if (element.parents(".sub-menu").length) {
            element.closest(".collapse").addClass("show");
            element.addClass("active");
          }
        }
      } else {
        //for other url
        if (element.attr("href").indexOf(current) !== -1) {
          element.parents(".nav-item").last().addClass("active");
          if (element.parents(".sub-menu").length) {
            element.closest(".collapse").addClass("show");
            element.addClass("active");
          }
          if (element.parents(".submenu-item").length) {
            element.addClass("active");
          }
        }
      }
    }

    var current = location.pathname
      .split("/")
      .slice(-1)[0]
      .replace(/^\/|\/$/g, "");
    $(".nav li a", sidebar).each(function () {
      var $this = $(this);
      addActiveClass($this);
    });

    $(".horizontal-menu .nav li a").each(function () {
      var $this = $(this);
      addActiveClass($this);
    });

    //Close other submenu in sidebar on opening any

    sidebar.on("show.bs.collapse", ".collapse", function () {
      sidebar.find(".collapse.show").collapse("hide");
    });

    //Change sidebar and content-wrapper height
    applyStyles();

    function applyStyles() {
      //Applying perfect scrollbar
      if (!body.hasClass("rtl")) {
        if ($(".settings-panel .tab-content .tab-pane.scroll-wrapper").length) {
          const settingsPanelScroll = new PerfectScrollbar(
            ".settings-panel .tab-content .tab-pane.scroll-wrapper"
          );
        }
        if ($(".chats").length) {
          const chatsScroll = new PerfectScrollbar(".chats");
        }
        if (body.hasClass("sidebar-fixed")) {
          if ($("#sidebar").length) {
            var fixedSidebarScroll = new PerfectScrollbar("#sidebar .nav");
          }
        }
      }
    }

    $('[data-toggle="minimize"]').on("click", function () {
      if (
        body.hasClass("sidebar-toggle-display") ||
        body.hasClass("sidebar-absolute")
      ) {
        body.toggleClass("sidebar-hidden");
      } else {
        body.toggleClass("sidebar-icon-only");
      }
    });
    $(window).scroll(function () {
      if (window.matchMedia("(min-width: 992px)").matches) {
        var header = $(".horizontal-menu");
        if ($(window).scrollTop() >= 70) {
          header.addClass("fixed-on-scroll");
        } else {
          header.removeClass("fixed-on-scroll");
        }
      }
    });
  });
})(jQuery);

document
  .getElementById("modalButton")
  .addEventListener("click", function (event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

    var local = window.location.pathname.toLowerCase();
    local = local.replace("/", "");
    local = local.replace(".html", "");
    console.log(local);
    // Tạo một div mới làm hộp thoại (modal)
    const modal = document.createElement("div");
    modal.style.position = "fixed";
    modal.style.top = "0";
    modal.style.left = "0";
    modal.style.width = "100%";
    modal.style.height = "100%";
    modal.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
    modal.style.display = "flex";
    modal.style.justifyContent = "center";
    modal.style.alignItems = "center";

    // Tạo một phần tử div cho thông báo
    const message = document.createElement("div");
    message.style.backgroundColor = "white";
    message.style.padding = "40px";
    message.style.borderRadius = "8px";
    message.style.textAlign = "center";
    message.style.width = "50%";

    // Thêm icon thể hiện đã xong từ FontAwesome
    const icon = document.createElement("div");
    icon.innerHTML =
      '<i class="fas fa-check-circle" style="font-size:48px; color:green;"></i>';
    icon.style.marginBottom = "10px";

    // Thêm icon vào thông báo
    message.appendChild(icon);

    // Thêm thông điệp dựa trên hành động
    const textDiv = document.createElement("p");
    if (local === "tao_moi") {
      textDiv.textContent = "Tạo mới thành công";
    } else if (local === "chinh_sua") {
      textDiv.textContent = "Chỉnh sửa thành công";
    }
    message.appendChild(textDiv);

    // Tạo nút "Xong"
    const button = document.createElement("button");
    button.textContent = "Xong";
    button.style.display = "block";
    button.style.margin = "20px auto 0"; // Căn giữa nút
    button.style.padding = "10px 20px";
    button.style.backgroundColor = "#374375";
    button.style.color = "white";
    button.style.border = "none";
    button.style.borderRadius = "5px";
    button.style.cursor = "pointer";

    // Xử lý sự kiện khi nhấn nút "Xong" để tải lại trang
    button.addEventListener("click", function () {
      location.reload(); // Tải lại trang
    });

    // Thêm nút vào thông báo
    message.appendChild(button);

    // Thêm thông báo vào hộp thoại (modal)
    modal.appendChild(message);

    // Thêm hộp thoại vào body của trang
    document.body.appendChild(modal);
  });
