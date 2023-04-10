$(document).ready(function () {
    //Get the user data from local storage
    let userid = localStorage.getItem("userid");
    if (userid == null) {
      location.href = "login.html";
    }
    // Display the user data on the page
    
    // Set the value of the email input field
    $("#submit").click(function (e) {
      e.preventDefault();
      let userid = localStorage.getItem("userid");
      let fullname = $("#fullname").val();
      let education = $("#education").val();
      let email = $("#email").val();
      let age = $("#age").val();
      let phone = $("#phone").val();
      let dob = $("#dob").val();
      let street = $("#street").val();
      let city = $("#city").val();
      let state = $("#state").val();
      let zip = $("#zip").val();
      $.ajax({
        url: "http://localhost/guvi/php/profile.php",
        type: "POST",
        data: {
          userid: userid,
          fullname: fullname,
          education: education,
          email: email,
          age: age,
          phone: phone,
          dob: dob,
          street: street,
          city: city,
          state: state,
          zip: zip,
        },
        async: true,
        success: function (res) {
          alert("Profile updated");
          console.log(res);
          location.href = "profile.html";
        },
      });
    });
  });
  