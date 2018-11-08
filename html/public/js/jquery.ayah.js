jQuery( document ).ready( function( $ ) {
    $.alQuranAyah = {
        init: function(element, reference) {
            this.monitorEditions(element, reference);
        },
        monitorEditions: function(element, reference) {
            var w = this;
            $(element).on('change', function() {
                editions = $(this).val();
                if (editions != 'undefined') {
                    $('#editions').empty();
                    $.each(editions, function(i,v) {
                       //console.log(v); 
                        w.ayah(v, reference);
                    });
                }
            });
        },
        ayah: function(edition, reference) {
            var w = this;
           $.ajax({
                    type: "GET",
                    url: "https://api.alquran.cloud/ayah/" + reference + '/' + edition,
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
            var ayahHtml = 
            '<div class="row">' +
			    '<div class="col-md-12 ltr"><p class="translationText">' + ayah.text + '</p></div>' +
		    '</div>' +
		    '<div class="row">' + 
			    '<div class="col-md-6 lead">' + 
				    '<span class="label label-default">' + ayah.edition.englishName + '</span>' + 
			'</div>' + 
    			'<div class="col-md-6 lead pull-right align-right">'
				    '<span class="label label-default margin-left-15">' + ayah.edition.type + '</span>' + 
			    '</div>' +
		    '</div>';
            $('#editions').append(ayahHtml);
        }
        
    };
});
