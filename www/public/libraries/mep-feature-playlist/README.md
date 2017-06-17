mep-feature-playlist -  A playlist plugin for MediaElement.js
=
[Demo] (http://andrewberezovsky.ru/demo/backgroundaudio7/)

Usage:

1 - Download **[MediaElement.js] (http://mediaelementjs.com/)**

2 - Download **[mep-feature-playlist] (https://github.com/duozersk/mep-feature-playlist/archive/master.zip)**

3 - Include

- **mediaelement-and-player.js**
- **mediaelementplayer.min.css**
- **mep-feature-playlist.js**
- **mep-feature-playlist.css**

4 - Add this code to your page:

    <script>
    $(function(){
        $('audio,video').mediaelementplayer({
            loop: true,
            shuffle: true,
            playlist: true,
            audioHeight: 30,
            playlistposition: 'bottom',
            features: ['playlistfeature', 'prevtrack', 'playpause', 'nexttrack', 'loop', 'shuffle', 'playlist', 'current', 'progress', 'duration', 'volume'],
        });
    });
    </script>

Options:
- **loop** - loop through the playlist; defaults to 'false'
- **shuffle** - shuffle playlist; defaults to 'false'
- **playlist** - controls either to show playlist by default or not; defaults to 'false'
- **playlistposition** - can be either 'top' or 'bottom' to show playlist on top of the player or under it; defaults to 'top'

Features:
- **playlistfeature** - general feature to enable playlist functionality; it just builds the internal playlist layer, it should be present if you want to use playlist
- **prevtrack** - button to play the previous track in the playlist
- **nexttrack** - button to play the next track in the playlist
- **loop** - toggle to turn repeat on or off
- **shuffle** - toggle to turn shuffle on or off
- **playlist** - playlist button to show/hide playlist

5 - Add the audio tag and your tracks:

    <audio controls="controls" autoplay="autoplay">
        <source src="media/AirReview-Landmarks-02-ChasingCorporate.mp3" title="Chasing Corporate" type="audio/mpeg"/>
        <source src="media/framing.mp3" title="Framing" type="audio/mpeg"/>
    </audio>

It will use title attribute as track name, falls back to file name if no title is specified.

Screenshots
==
**Playlist Collapsed**

![MediaElement.js Collapsed playlist](http://andrewberezovsky.ru/demo/screenshots/playlist_collapsed.png "MediaElement.js Collapsed playlist")

**Playlist Expanded**

![MediaElement.js Expanded playlist](http://andrewberezovsky.ru/demo/screenshots/playlist_expanded.png "MediaElement.js Expanded playlist")

- Yellow - playing track
- Green - track to play on click

More options and installation instructions related to MediaElement.js can be found [here] (http://mediaelementjs.com/#installation).
