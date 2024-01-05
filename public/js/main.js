window.addEventListener("scroll", function() {
    const header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
});
const menuOpen = document.querySelector("#menu-open");
const menuClose = document.querySelector("#menu-close");
const nav = document.querySelector("nav");

menuOpen.addEventListener("click", () => {
    nav.style.right = "0";
});

menuClose.addEventListener("click", () => {
    nav.style.right = "-300px";
});

if ($(".success").length) {
    var modalTitle = $(".success").attr("data-message");
    swal.fire({
        icon: "success",
        title: modalTitle,
        timer: 2000,
        showConfirmButton: false
    });
};

if ($(".error").length) {
    var modalTitle = $(".error").attr("data-message");
    swal.fire({
        icon: "error",
        title: modalTitle,
        timer: 2000,
        showConfirmButton: false
    });
};

$(".delete").click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d32b2b",
        cancelButtonColor: "gray",
        confirmButtonText: "Delete!"
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

window.jsPDF = window.jspdf.jsPDF;
// Convert HTML content to PDF
function Convert_HTML_To_PDF() {
    var doc = new jsPDF();
    // Source HTMLElement or a string containing HTML.
    var elementHTML = document.querySelector("#print");

    doc.html(elementHTML, {
        callback: function(doc) {
            // Save the PDF
            doc.save("resume.pdf");
        },
        autoPaging: "text",
        width: 210, //target width in the PDF document
        windowWidth: 800, //window width in CSS pixels
    });
}

tinymce.init({
    selector: ".myTextarea",
    width: "100%",
    height: 300,
    plugins: [
        "lists", "autoresize", "wordcount"
    ],
    toolbar: "bold italic | bullist numlist",
    menubar: false,
    content_css: "css/content.css"
});

const sidebarOpen = document.querySelector("#sidebar-open");
const sidebarClose = document.querySelector("#sidebar-close");
const sidebar = document.querySelector("#sidebar");

sidebarOpen.addEventListener("click", () => {
    sidebar.style.left = "0";
    sidebarOpen.style.display = "none";
});

sidebarClose.addEventListener("click", () => {
    sidebar.style.left = "-200px";
    sidebarOpen.style.display = "inline-block";
});
