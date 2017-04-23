var person = 'person2';

window.onload = function(){
  $("#l-form-message").keyup(function(event){
    if(event.keyCode == 13){
        $("#sendMessageBtn").click();
    }
  });

  $('.chat[data-chat=person2]').addClass('active-chat');
  $('.person[data-chat=person2]').addClass('active');

  $('.person').mousedown(function(){
    if ($(this).hasClass('.active')) {
        return false;
    } else {
        var findChat = $(this).attr('data-chat');
        var personName = $(this).find('.name').text();
        $('.name').html(personName);
        $('.chat').removeClass('active-chat');
        $('.person').removeClass('active');
        $(this).addClass('active');
        person = findChat;
        $('.chat[data-chat = '+findChat+']').addClass('active-chat');
    }
});

  setInterval(getMessage, 3000);

  function getMessage() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && (this.status === 200 || this.status === 0)) {
          if(this.responseText !== ''){
            item = document.createElement('div');
            item.textContent = this.responseText;
            item.className = "bubble you";
            document.getElementById(person).appendChild(item);
          }
        }
    };
    xmlhttp.open("GET","getmessages.php",true);
    xmlhttp.send();
  }
};

function sendMessage(message) {
  document.getElementById('l-form-message').value = '';
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && (this.status === 200 || this.status === 0)) {
        item = document.createElement('div');
        item.textContent = this.responseText;
        item.className = "bubble me";
        document.getElementById(person).appendChild(item);
      }
  };

  xmlhttp.open("GET","sendmessages.php?m="+message,true);
  xmlhttp.send();
}
