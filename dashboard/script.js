const body = document.querySelector("body");
const darkBtn = document.querySelector(".dark");
const toggleNav = document.querySelector(".fa-chevron-left");
const sidebar = document.querySelector(".sidebar");
const navbar = document.querySelector(".dash-bar");
const navmenu = document.querySelector(".badges");

navbar.addEventListener("click", () => {

  navmenu.classList.toggle("added");

});


toggleNav.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    
    var closed;
    if (sidebar.classList.contains("close")) {
      closed = "yes";
    } else {
      closed = "no";
    }

    localStorage.setItem("closed", JSON.stringify(closed));
});

let ifClosed = JSON.parse(localStorage.getItem("closed"));

if (ifClosed == "yes") {
  sidebar.classList.add("close");
}



darkBtn.addEventListener("click", () => {
    body.classList.toggle('dark');
    var theme;
    if (body.classList.contains("dark")) {
      theme = "dark";
    } else {
      theme = "light";
    }
    localStorage.setItem("pagetheme", JSON.stringify(theme));
});

let getTheme = JSON.parse(localStorage.getItem("pagetheme"));
if (getTheme == "dark") {
    document.body.classList.add('dark');
}
