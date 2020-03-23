// Sidenav
const sideNav = document.querySelector('.sidenav')
M.Sidenav.init(sideNav, {})

$(document).ready(() => {
  $('.fixed-action-btn').floatingActionButton();
});

$(document).ready(() => {
  $('.tooltipped').tooltip();
});

$(document).ready(() => {
  $('select').formSelect();
});


