    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                  <a class="navbar-brand font-uthmani rtl" href="https://alquran.cloud">الْقُرْآن الْكَرِيْم</a>
              </li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="<?= $view == 'home' ? 'active' : ''; ?>"><a href="https://alquran.cloud">Home</a></li>
            <li><a href="/read" >Quran</a></li>
            <li><a href="/juzs">Juz</a></li>
            <li><a href="/surahs">Surah</a></li>
            <li><a href="/ayah">Ayah</a></li>
            <li class="dropdown <?= $view == 'api' ? 'active' : ''; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">API <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="/api">API Documentation</a></li>
                    <li><a href="/cdn">Content Delivery Network</a></li>
                    <li><a href="/api-clients">API Clients</a></li>
                    <li><a href="/tajweed-guide">Tajweed Guide</a></li>
                    <li><a href="/download-media">Download Quran Media</a></li>
                </ul>
            </li>

          </ul>
            <form class="navbar-form pull-right" style="margin-right: 20px;" role="search" method="GET" action="/search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search the Quran" name="keyword" id="search-term" value="<?= isset($keyword) ? $keyword : ''; ?>">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>

        </div>
      </div>
  </nav>
