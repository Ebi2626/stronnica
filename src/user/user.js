import "../sass/user.scss";

document.addEventListener("DOMContentLoaded", () => {
  const userHook = document.querySelector("#userHook");
  const userNav = document.querySelector(".user");
  userHook.addEventListener("click", () => {
    userNav.classList.contains("user--active")
      ? userNav.classList.remove("user--active")
      : userNav.classList.add("user--active");
    if (window.innerWidth < 768) {
      userNav.classList.contains("user--active")
        ? (document.body.style.overflowY = "hidden")
        : (document.body.style.overflowY = "auto");
    }
  });
});
