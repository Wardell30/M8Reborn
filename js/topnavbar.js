setInterval(getNotifications, 10000);

function getNotifications(){
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && (this.status === 200 || this.status === 0)) {
        if(this.responseText !== ''){
          document.getElementById('notificationNumber').innerHTML = this.responseText.substring(0,1);
          document.getElementById('dropdown-menu').innerHTML = this.responseText.substring(1,this.responseText.indexOf(';'));

          /*if(this.responseText.substring(1,this.responseText.indexOf(';')) == ''){
            if("Notification" in window){
        			if(Notification.permission === "granted"){
        				var n = new Notification(this.responseText.substring(1,this.responseText.indexOf(';')));
        			  setTimeout(n.close.bind(n), 3000);
        			} else if(Notification.permission !== 'denied'){
        				Notification.requestPermission(function (permission) {
        	      	// If the user accepts, let's create a notification
        		      if (permission === "granted") {
                    var n = new Notification(this.responseText.substring(1,this.responseText.indexOf(';')));
            			  setTimeout(n.close.bind(n), 3000);
        	      	}
        	    	});
        			}
        		}
          }*/
        }
      }
  };
  xmlhttp.open("GET","topnavbar.php?ajax=true",true);
  xmlhttp.send();
}

function getTaskInfo(title, start, description, end){
  if(description == undefined){
    description = "None";
  }

  if(end == null || end == undefined){
    end = "Not Defined";
  }

  document.getElementById('myModalLabelTask').innerHTML = title;
  document.getElementById('start').innerHTML = 'Event Start: ' + start;
  document.getElementById('description').innerHTML = 'Description: ' + description;
  document.getElementById('end').innerHTML = 'Event End: ' + end;

  $("#deleteTask").click(function(){
      myAjax(title);
      location.reload();
  });
}

function myAjax(title){
      $.ajax({
           type: "POST",
           url: 'deletetask.php?name='+title,
           data:{action:'call_this'},
           success:function(html) {
           }
      });
 }
