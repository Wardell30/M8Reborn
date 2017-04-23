window.onload = function(){
    var dashboardNav = document.getElementById("dashboardNav");
    var uniTrackerNav = document.getElementById("uniTrackerNav");
    var budgetTrackerNav = document.getElementById("budgetTrackerNav");
    var noteTakingNav = document.getElementById("noteTakingNav");
    var hangout = document.getElementById("hangOutNav");
    var profileNav = document.getElementById("profileNav");
    var settingsNav = document.getElementById("settingsNav");
    var courseNav = document.getElementById("courseNav");
    var teachersNav = document.getElementById("teachersNav");
    var place = document.getElementById("place");
    var placeIcon = document.getElementById("placeIcon");
    var news = document.getElementById("newsNav");

    //change icon after

    if(window.location.href.indexOf("dashboard") > -1) {
        removeActiveClass();
        dashboardNav.className = "active";
        place.innerHTML = "Dashboard";
        placeIcon.className = "pe-7s-graph";
    } else if (window.location.href.indexOf("unitracker") > -1) {
        removeActiveClass();
        uniTrackerNav.className = "active";
        place.innerHTML = "Uni Tracker";
        placeIcon.className = "pe-7s-study";
    } else if(window.location.href.indexOf("budgettracker") > -1) {
        removeActiveClass();
        budgetTrackerNav.className = "active";
        place.innerHTML = "Budget Tracker";
        placeIcon.className = "pe-7s-piggy";
    } else if (window.location.href.indexOf("notetaking") > -1){
        removeActiveClass();
        noteTakingNav.className = "active";
        place.innerHTML = "Note Taking";
        placeIcon.className = "pe-7s-note2";
    } else if(window.location.href.indexOf("hangout") > -1) {
        removeActiveClass();
        hangout.className = "active";
        place.innerHTML = "Hang out";
        placeIcon.className = "pe-7s-users";
    } else if (window.location.href.indexOf("profile") > -1){
        removeActiveClass();
        profileNav.className = "active";
        place.innerHTML = "Username";
        placeIcon.className = "pe-7s-user";
    } else if (window.location.href.indexOf("settings") > -1){
        removeActiveClass();
        settingsNav.className = "active";
        place.innerHTML = "Settings";
        placeIcon.className = "pe-7s-settings";
    } else if(window.location.href.indexOf("courses") > -1){
        removeActiveClass();
        courseNav.className = "active";
        place.innerHTML = "Courses/UCs";
        placeIcon.className = "pe-7s-note2";
    } else if(window.location.href.indexOf("teachers") > -1){
      removeActiveClass();
      teachersNav.className = "active";
      place.innerHTML = "Teachers";
      placeIcon.className = "pe-7s-user";
    } else if(window.location.href.indexOf("news") > -1){
      removeActiveClass();
      newsNav.className = "active";
      place.innerHTML = "News";
      placeIcon.className = "pe-7s-news-paper";
    }

    function removeActiveClass(){
        dashboardNav.className = "";

        if(uniTrackerNav !== null){
            uniTrackerNav.className = "";
        }

        if(budgetTrackerNav !== null){
            budgetTrackerNav.className = "";
        }

        if(noteTakingNav !== null){
            noteTakingNav.className = "";
        }

        if(settingsNav !== null){
            settingsNav.className = "";
        }

        if(profileNav !== null){
            profileNav.className = "";
        }

        if(hangout !== null){
            hangout.className = "";
        }

        if(courseNav !== null){
            courseNav.className = "";
        }

        if(teachersNav !== null){
            teachersNav.className = "";
        }

        if(newsNav !== null){
          newsNav.className = "";
        }
    }
}
