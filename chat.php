<?php
include('session.php');
include('config.php');
require_once('sidebar.php');
require_once('topnavbar.php');
?>

    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 col-md-offset-1">
              <div class="card">
                <form role="form" action="" method="post" class="l-form">
                  <div class="form-group">
                    <label class="sr-only" for="l-form-search">Search</label>
                    <input type="text" name="l-form-search" placeholder="Search..." class="l-form-search form-control" id="l-form-search">
                  </div>
                </form>
                <hr />
                <div class="scrollPeople">
                  <ul class="people">
                    <li class="person" data-chat="person1">
                      <img src="images/about/vitor.jpg" alt="" />
                      <span class="name">Thomas Bangalter</span>
                      <span class="time">2:09 PM</span>
                      <span class="preview">Yeah you do!</span>
                    </li>
                    <li class="person" data-chat="person2">
                      <img src="images/about/vitor.jpg" alt="" />
                      <span class="name">Thomas Bangalter</span>
                      <span class="time">2:09 PM</span>
                      <span class="preview">I've forgotten how it felt before</span>
                    </li>
                    <li class="person" data-chat="person3">
                      <img src="images/about/vitor.jpg" alt="" />
                      <span class="name">Thomas Bangalter</span>
                      <span class="time">2:09 PM</span>
                      <span class="preview">Amo-te MUITO!</span>
                    </li>
                    <li class="person" data-chat="person4">
                      <img src="images/about/vitor.jpg" alt="" />
                      <span class="name">Thomas Bangalter</span>
                      <span class="time">2:09 PM</span>
                      <span class="preview">check the "variaible"!!!</span>
                    </li>
                  </ul>
                </div>
                <div id="freeSpace">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="chatContainer">
                  <div class="chatTo">
                    <h4><strong>To:</strong> Vitor Monteiro</h4>
                  </div>
                  <div class="messagesDiv" id="messagesDiv">
                    <div class="chat" data-chat="person1" id="person1">
                      <div class="conversation-start">
                        <span>Yesterday, 4:20 PM</span>
                      </div>
                      <div class="bubble me">
                          I fucking rock!
                      </div>
                      <div class="bubble you">
                          Yeah you do!
                      </div>
                    </div>
                    <div class="chat" data-chat="person2" id="person2">
                      <div class="conversation-start">
                        <span>Yesterday, 4:20 PM</span>
                      </div>
                      <div class="bubble you">
                          Hello, can you hear me?
                      </div>
                      <div class="bubble you">
                          I'm in California dreaming
                      </div>
                      <div class="bubble me">
                          ... about who we used to be.
                      </div>
                      <div class="bubble me">
                          Are you serious?
                      </div>
                      <div class="bubble you">
                          When we were younger and free...
                      </div>
                      <div class="bubble you">
                          I've forgotten how it felt before
                      </div>
                    </div>
                    <div class="chat" data-chat="person3" id="person3">
                      <div class="conversation-start">
                        <span>Yesterday, 4:20 PM</span>
                      </div>
                      <div class="bubble me">
                          Catarina
                      </div>
                      <div class="bubble you">
                          Sim?
                      </div>
                      <div class="bubble me">
                          Amo-te MUITO!
                      </div>
                    </div>
                    <div class="chat" data-chat="person4" id="person4">
                      <div class="conversation-start">
                        <span>Yesterday, 4:20 PM</span>
                      </div>
                      <div class="bubble me">
                          DUMB BITX!
                      </div>
                      <div class="bubble you">
                          check the "variaible"!!!
                      </div>
                    </div>
                  </div>
                  <div class="sendMessage">
                  <div class="form-group">
                    <label class="sr-only" for="l-form-message">Message</label>
                    <input type="text" name="l-form-message" placeholder="Type a message..." class="l-form-message form-control" id="l-form-message">
                  </div>
                  <button id="sendMessageBtn" onClick="sendMessage(document.getElementById('l-form-message').value);"><i class="fa fa-paper-plane" id="sendIcon" aria-hidden="true"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <?php require_once('footer.php'); ?>

    <script src="js/chat.js" type="text/javascript"></script>
</html>
