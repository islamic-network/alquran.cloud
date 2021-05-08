jQuery( document ).ready( function( $ ) {
    $.alQuranSurah = {
        editions: function (element, reference) {
            this.monitorEditions(element, reference);
        },
        surahs: function (element) {
            $(element).on('change', function () {
                var surah = ($(this).val());
                window.location.href = '/surah/' + surah;
            });
        },
        monitorEditions: function(element, reference) {
            var w = this;
            $(element).on('change', function() {
                editions = $(this).val();
                if (editions != 'undefined') {
                    $("div[class^=singleEditionAyah]").empty();
                    $.each(editions, function(i,v) {
                       //console.log(v); 
                        w.surah(v, reference);
                    });
                }
            });
        },
        surah: function(edition, reference) {
            var w = this;
           $.ajax({
                    type: "GET",
                    url: "https://api.alquran.cloud/surah/" + reference + '/' + edition,
                    cache: false,
                    //dataType: 'jsonp',
                    success: function(data) {
                        // Update timings
                        if (data.code == 200) {
                            w.renderSurah(data.data);
                        }
                    }
                });
        },
        renderSurah: function(surah) {
			$.each(surah.ayahs, function(i, v) {
			    var ayah = '<p class="translationText">' + v.numberInSurah + '. ' + v.text +  ' <span class="label label-default">' + surah.edition.name + '</span>' + '</p>';
				var identifier = '.singleEditionAyah' + surah.number + '_' + v.numberInSurah;
				$(identifier).append(ayah);
		   });
        }
        
    };
});
