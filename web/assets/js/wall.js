var displayIndex = 3;

$( ".messages" ).hide();
$( ".index0" ).show();
$( ".index1" ).show();
$( ".index2" ).show();

$("a[href='#affichePlus']").click(function () {
    $( ".index"+displayIndex ).show();
    displayIndex++;
    $( ".index"+displayIndex ).show();
    displayIndex++;
    $( ".index"+displayIndex ).show();
    displayIndex++;
});

$('#myModal').on('shown.bs.modal', function () {
    $('#appbundle_wall_content').focus();
});

$("a[href='#top']").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
});


