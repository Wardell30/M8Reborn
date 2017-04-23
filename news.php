<?php
include('session.php');
require_once('sidebar.php');
require_once('topnavbar.php');
?>
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                        <div class="header">
                            <h4 class="title">News</h4>
                        </div>
                        <div class="tabsSections">
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Home</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Opinion</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">World</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">National</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Politics</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Upshot</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">NY / Region</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Business</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Technology</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Science</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Health</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Sports</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Arts</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Books</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Movies</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Theater</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Sunday Review</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Fashion</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Magazine</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Food</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Travel</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Automobile</button>
                          <button type="button" class="btn btn-primary btn-sm news" onclick="getNews(this.innerHTML);">Insider</button>
                        </div>
                        <div class="content all-icons" id="append">
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    <?php require_once('footer.php'); ?>

    <script>
      getNews("home");
    </script>
</html>
