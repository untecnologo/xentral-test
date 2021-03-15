$(document).ready(function () {
  $.ajax({
    url: "/xentral-test-git/php/process/posts.php",
    type: "POST",
    dataType: "JSON",
    data: { run: "showList" },
    success: function (data) {
      var postsData = data;
      for (const property in postsData) {
        var titlePost = postsData[property].title;
        var authorPost = postsData[property].author;
        var textPost = postsData[property].text;
        $("#resultTablePost").append(`
        <tr>
        <td>${titlePost}</td>
        <td>${authorPost}</td>
        <td>${textPost}</td>
      </tr>`);
      }
    },
  });
});
