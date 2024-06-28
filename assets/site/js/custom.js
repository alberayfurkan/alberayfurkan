function startSearch() {
  var s_text = $("#searchHome").val();
  var searchUrl = site_url + "search?search_text=" + encodeURIComponent(s_text) + "&lang=" + site_lang;
  window.location.href = searchUrl;
}

$(document).ready(function () {
  $("#cf_form").on("submit", function (e) {
    e.preventDefault();
    
    // Serialize form data and add site_lang
    var formData = $(this).serializeArray();
    formData.push({ name: "site_lang", value: site_lang });

    // Ajax request
    $.ajax({
      url: site_url + "admin/ajax/util/cForm.php",
      type: "POST",
      data: $.param(formData),
      headers: {
        "X-Requested-With": "XMLHttpRequest"
      },
      success: function (response) {
        try {
          response = JSON.parse(response);
        } catch (e) {
          console.error("Error parsing JSON response: ", e);
          response = { success: false, message: "Invalid server response." };
        }

        // Display message
        var messageClass = response.success ? "alert-success" : "alert-danger";
        $("#form-messages").html('<div class="alert ' + messageClass + '">' + response.message + '</div>');
      },
      error: function (xhr, status, error) {
        console.error("Ajax request error:", status, error);
        $("#form-messages").html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
      }
    });
  });
});
