jQuery( document ).ready( function( $ ) {
    $.alQuranMediaPlayer = {
        getAyahPlayer: function(identifier) {
            return new MediaElementPlayer(identifier, {
                loop: false,
                playlist: false,
                features: ['playlistfeature', 'playpause', 'loop', 'progress', 'duration', 'volume'],
                keyActions: []
                }
            );
        },
        getSurahPlayer: function(identifier) {
            return new MediaElementPlayer(identifier, {
                loop: true,
                shuffle: false,
                playlist: false,
                audioHeight: 30,
                playlistposition: 'bottom',
                features: ['playlistfeature', 'prevtrack', 'playpause', 'nexttrack', 'volume', 'duration', 'progress', 'current'],
                keyActions: []
                }
            );
        },
        getJuzPlayer: function(identifier) {
            return new MediaElementPlayer(identifier, {
                loop: true,
                shuffle: false,
                playlist: false,
                audioHeight: 30,
                playlistposition: 'bottom',
                features: ['playlistfeature', 'prevtrack', 'playpause', 'nexttrack', 'current', 'progress', 'duration', 'volume'],
                keyActions: []
                }
            );
        },
        getQuranPlayer: function(identifier) {
            return new MediaElementPlayer(identifier, {
                loop: true,
                shuffle: false,
                playlist: false,
                audioHeight: 30,
                playlistposition: 'bottom',
                features: ['playlistfeature', 'prevtrack', 'playpause', 'nexttrack', 'current', 'progress', 'duration', 'volume'],
                keyActions: []
                }
            );

        }

    };
});
