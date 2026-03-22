$(() => {
  $("#application-self_tool").on("click", function () {
    if ($(this).prop("checked")) {
      $("#application-tool_id").prop("disabled", true).val("");
    } else {
      $("#application-tool_id").prop("disabled", false);
    }
  });

  $("#application-rule").on("click", function () {
    if ($(this).prop("checked")) {
      $(".btn").prop("disabled", false);
    } else {
      $(".btn").prop("disabled", true);
    }
  });
});
