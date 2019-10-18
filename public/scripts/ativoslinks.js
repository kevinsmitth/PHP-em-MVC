$(document).ready(function() {
  $(
    ".navi li a[href='" +
      location.href.substring(location.href.lastIndexOf('/'), 255) +
      "']"
  ).css('color', '#FFF');
});
