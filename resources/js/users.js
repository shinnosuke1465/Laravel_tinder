$(function () {
  $('#test_jquery').on('click', function() {
      alert("Hello, jQuery!");
  })
})

// $(document).on("change", "#file_photo", function(e) {
//   if (e.target.files.length) {
//     const reader = new FileReader();
//     reader.onload = function(e) {
//       const userThumbnail = document.getElementById('thumbnail');
//       $("#userImgPreview").addClass("is-active");
//       userThumbnail.setAttribute('src', e.target.result);
//     };
//     reader.readAsDataURL(e.target.files[0]);
//   }
// });
// console.log('users.js loaded');