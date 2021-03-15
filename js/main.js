function login() {
  var user = $("#email").val();
  var pwd = $("#pss").val();

  $("#emailalert").html("");
  $("#pssalert").html("");
  $("#loginalert").html("");

  if (user == "") {
    $("#emailalert").html("Please insert a valid email");
    return;
  }

  if (pwd == "") {
    $("#pssalert").html("Please insert your password");
    return;
  }
  $.ajax({
    url: "/xentral-test-git/php/process/login.php",
    type: "POST",
    dataType: "JSON",
    data: { user: $("#email").val(), password: $("#pss").val() },
    success: function (resp) {
      var result_data = resp;
      var option = result_data[0];
      var action = result_data[1];

      if (option == 0) {
        $("#loginalert").html(action);
      }
      if (option == 1) {
        window.location.href = action;
      } else {
        $("#alertlogin").html("Something went worng");
      }
    },
  });
}

$(document).ready(function () {
  $.ajax({
    url: "/xentral-test-git/php/process/session_activity.php",
    type: "POST",
    dataType: "JSON",
    data: { run: "validation" },
    success: function (data) {
      var info_s = data;
      var case_action = info_s[0];
      var url_action = info_s[1];
      var user_define = info_s[2];
      if (case_action == 0) {
        $("#current_user").html(user_define);
        if (window.location.pathname != "/xentral-test-git/index.html") {
          window.location.href = `${url_action}`;
        }
        $("#logout_div").hide();
      }
      if (case_action == 1) {
        $("#current_user").html(user_define);
        if (window.location.pathname != "/xentral-test-git/dashboard.html") {
          window.location.href = `${url_action}`;
        }

        $("input[name=author]").val(user_define);
      }
    },
  });
});

function close_session() {
  $.ajax({
    url: "/xentral-test-git/php/process/session_activity.php",
    type: "POST",
    dataType: "JSON",
    data: { run: "logout" },
    success: function (data) {
      location.reload();
    },
  });
}

function registerPost() {
  postTitle = $("#titlePost").val();
  author = $("#author").val();
  textArea = $("#textArea").val();

  if (postTitle == "") {
    alert("The field Post Title can not be empty");
    return;
  } else if (author == "") {
    alert("The field Author can not be empty");
    return;
  }
  ckeditorText = CKEDITOR.instances["textArea"]
    .getData()
    .replace(/<[^>]*>/gi, "").length;
  if (!ckeditorText) {
    alert("The field Text can not be empty");
    return;
  }

  var textEditor = CKEDITOR.instances.textArea.getData();
  $.ajax({
    url: "/xentral-test-git/php/process/posts.php",
    type: "POST",
    data: {
      run: "registerPost",
      title: postTitle,
      author: author,
      content: textEditor,
    },
    success: function (data) {
      alert(data);
      location.reload();
    },
  });
}
