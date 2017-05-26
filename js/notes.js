var person = 'uc1';
var uc = "";


window.onload = function(){
  $('.chat[data-uc=uc1]').addClass('active-chat');
  $('.person[data-uc=uc1]').addClass('active');
  uc = $('#name1').text();
  $('#ucName').html(uc);
  window.history.pushState('notetaking', 'M8Reborn | NoteTaking', '/M8Reborn/notetaking.php?uc=' + uc);

  $('.person.not').mousedown(function(){
    if ($(this).hasClass('.active')) {
        return false;
    } else {
        var findChat = $(this).attr('data-uc');
        var personName = $(this).find('.name.course').text();
        $('#ucName').html(personName);
        uc = personName;
        $('.chat').removeClass('active-chat');
        $('.person').removeClass('active');
        $(this).addClass('active');
        person = findChat;
        $('.chat[data-uc = '+findChat+']').addClass('active-chat');
        window.history.pushState('notetaking', 'M8Reborn | NoteTaking', '/M8Reborn/notetaking.php?uc=' + uc);
    }
});

  $("#submitNote").click(function(){
    $.ajax({
         type: "POST",
         url: "notetaking.php?uc=" + uc,
         data:{action:'call_this'},
         success:function(html) {
           console.log(html);
         }
    });
      location.reload();
  });
}
