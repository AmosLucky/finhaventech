// //preload-container
// alert("ppp99000000");

// var loginBtn = document.getElementById("loginBtn");
// loginBtn.addEventListener("click",function(){
//   alert("john")
// })

// $(document).ready(function () {
//     alert("pppp");
//     console.log("oooo");
//     $("#loginBtn").on("click", function (e) {
//         e.preventDefault();
//         $(".preload-container").show();
//         var id = $("#id").val();
//         alert("pppp");
//         //    if (id=="") {
//         //     $("#ermptyErrro").html("<i style='color:red'>Id cant be empty</i>");
//         //    }
//         $.ajax({
//             url: "Authentication/logion.php",
//             type: "POST",
//             data: { id: id },

//             beforSend: function () {
//                 $(".preload-container").show();
//             },

//             success: function (data) {
//                 //console.log(data);

//                 if (data == 'block') {
//                     Swal.fire({
//                         title: "Opps!",
//                         text: "Opps you dont have access to this account contact our support!",
//                         icon: "error",
//                         button: "Ok!",

//                     })

//                 } else if (data == "emptyId") {
//                     $("#ermptyErrro").html("<i style='color:red;input'>Id can't be empty</i>");

//                 } else if (data == "invakidACC") {
//                     Swal.fire({
//                         title: "Opps!",
//                         text: "Invalid Account!",
//                         icon: "error",
//                         button: "Ok!",

//                     })
//                 } else if (data == "succesdash") {
//                     window.location.href = 'costomer/dashboard.php';

//                 }
//             },

//             complete: function () {
//                 $(".preload-container").hide();
//             }
//         })
//     })
// })