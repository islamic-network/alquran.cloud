jQuery( document ).ready( function( $ ) {
    $.alQuranJuz = {
        editions: function (element, reference) {
            this.monitorEditions(element, reference);
        },
        juzs: function (element) {
            $(element).on('change', function () {
                var juz = ($(this).val());
                window.location.href = '/juz/' + juz;
            });
        },
        monitorEditions: function (element, reference) {
            var w = this;
            $(element).on('change', function () {
                editions = $(this).val();
                if (editions != 'undefined') {
                    $("div[class^=singleEditionAyah]").empty();
                    $.each(editions, function (i, v) {
                        //console.log(v);
                        w.juz(v, reference);
                    });
                }
            });
        },
        juz: function (edition, reference) {
            var w = this;
            $.ajax({
                type: "GET",
                url: "https://api.alquran.cloud/v1/juz/" + reference + '/' + edition,
                cache: false,
                //dataType: 'jsonp',
                success: function (data) {
                    // Update timings
                    if (data.code == 200) {
                        w.renderJuz(data.data);
                    }
                }
            });
        },
        renderJuz: function (juz) {
            $.each(juz.ayahs, function (i, v) {
                var ayah = '<p class="translationText">' + v.numberInSurah + '. ' + v.text + ' <span class="label label-default">Juz ' + juz.number + '</span>' + '</p>';
                var identifier = '.singleEditionAyah' + juz.number + '_' + v.number;
                $(identifier).append(ayah);
            });
        }

    };
});