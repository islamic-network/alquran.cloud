jQuery( document ).ready( function( $ ) {
    $.alQuranArabicScriptChecker = {
        monitorFont: function(element) {
            var w = this;
            $(element).on('change', function() {
                var font = $(this).val();
                $('#ayahFont').removeClass().addClass(font);
            });
        },
        monitorEdition: function(element, reference) {
            var w = this;
            $(element).on('change', function() {
                var edition = $(this).val();
                w.ayah(edition, reference);
            });
        },
        ayah: function(edition, reference) {
            var w = this;
            $.ajax({
                type: "GET",
                url: "https://api.alquran.cloud/v1/ayah/" + reference + '/' + edition,
                cache: false,
                //dataType: 'jsonp',
                success: function(data) {
                    // Update timings
                    if (data.code == 200) {
                        w.renderAyah(data.data);
                    }
                }
            });
        },
        renderAyah: function(ayah) {
            $('#ayahFont').html(ayah.text);
        }
    };
});
