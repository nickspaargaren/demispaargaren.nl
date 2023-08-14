<div class="meldingBg"></div>
<div class="cms_footer">
  <div class="breadcrums">Home <i class="fa fa-caret-right"></i> <?php echo $cms_pagina_titel; ?></div>
</div>

<script>
  // Menu tonen
  $(".btn_submenu").click(function() {
    $(".cms_nav").toggleClass("opengeklapt");
  });

  // Account tonen
  $(".account").click(function() {
    $(this).toggleClass("open");
  });

  // Melding weghalen
  $(".meldingBg").click(function() {
    $(".meldingBg").removeClass("tonen");
    $(".uploadenHolder").removeClass("tonen");
    $("#afbeeldingDetail").empty();
  });

  // esc key melding sluiten
  $(document).keyup(function(e) {
    if (e.keyCode == 27) {
      $('.uploadenHolder').removeClass('tonen');
      $('.meldingBg').removeClass('tonen');
      $("#afbeeldingDetail").empty();
    }
  });
</script>
