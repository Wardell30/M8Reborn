function getNews(section){
  section = section.toLowerCase();
  section = section.replace(/\s/g,'');
  section = section.replace(/\//g,'');

  var node = document.getElementById('append');

  while (node.hasChildNodes()) {
      node.removeChild(node.lastChild);
  }

  var url = "https://api.nytimes.com/svc/topstories/v2/"+section+".json";
  url += '?' + $.param({
  'api-key': "fe0ce41ec25347c0a87ae5b3972b0c56",
  });
  $.ajax({
  url: url,
  method: 'GET',
  }).done(function(result) {
    var arrayResults = result.results;
    for(var i = 0; i < arrayResults.length; i++){
        init = document.createElement("div");
        cardContainer = document.createElement("div");
        card = document.createElement("div");
        front = document.createElement("div");
        bigcover = document.createElement("div");
        content = document.createElement("div");
        contentMain = document.createElement("div");
        back = document.createElement("div");
        contentb = document.createElement("div");
        contentMainb = document.createElement("div");
        statsContainer = document.createElement("div");
        stats1 = document.createElement("div");
        stats2 = document.createElement("div");
        stats3 = document.createElement("div");
        img = document.createElement("img");
        h3 = document.createElement("h3");
        ul = document.createElement("ul");
        profession = document.createElement("p");
        textCenter = document.createElement("p");
        p1 = document.createElement("p");
        p2 = document.createElement("p");
        p3 = document.createElement("p");
        h4TextCenter = document.createElement("h4");
        h41 = document.createElement("h4");
        h42 = document.createElement("h4");
        h43 = document.createElement("h4");
        li1 = document.createElement("li");
        li2 = document.createElement("li");
        li3 = document.createElement("li");

      init.className = "col-md-4 col-sm-6";
      init.id = "init" + i;
      cardContainer.className = "card2-container";
      cardContainer.id = "cardcontainer" + i;
      card.className = "card2";
      card.id = "card" + i;
      front.className = "front";
      front.id = "front" + i;
      bigcover.className = "bigcover";
      bigcover.id = "bigcover" + i;
      content.className = "content";
      content.id = "content" + i;
      contentMain.className = "main";
      contentMain.id = "contentMain" + i;
      back.className = "back";
      back.id = "back" + i;
      contentb.className = "content";
      contentb.id = "contentb" + i;
      contentMainb.className = "main";
      contentMainb.id = "contentMainb" + i;
      statsContainer.className = "stats-container";
      statsContainer.id = "statsContainer" + i;
      stats1.className = "stats";
      stats1.id = "stats1" + i;
      stats2.className = "stats";
      stats2.id = "stats2" + i;
      stats3.className = "stats";
      stats3.id = "stats3" + i;
      h3.className = "name";
      profession.className = "profession";
      textCenter.className = "text-center";
      if (arrayResults[i].multimedia[4] != undefined && arrayResults[i].multimedia[4] != null){
        img.src = arrayResults[i].multimedia[4].url;
        text1 = document.createTextNode("Image Caption: " + arrayResults[i].multimedia[4].caption.substring(0, 50) + "...");
        text2 = document.createTextNode("Image copyright: " + arrayResults[i].multimedia[4].copyright);
      } else {
        img.src = "images/rotating_card_thumb2.png";
        text1 = document.createTextNode("Image Caption: ...");
        text2 = document.createTextNode("Image copyright: ...");
      }

      h4TextCenter.className = "text-center";
      ul.className = "joblist";
      ul.id = "ul" + i;

      document.getElementById('append').appendChild(init);
      document.getElementById('init' + i).appendChild(cardContainer);
      document.getElementById('cardcontainer' + i).appendChild(card);
      document.getElementById('card' + i).appendChild(front);
      document.getElementById('card' + i).appendChild(back);
      document.getElementById('back' + i).appendChild(contentb);
      document.getElementById('contentb' + i).appendChild(contentMainb);
      document.getElementById('front' + i).appendChild(bigcover);
      document.getElementById('front' + i).appendChild(content);
      document.getElementById('content' + i).appendChild(contentMain);
      document.getElementById('contentMainb' + i).appendChild(statsContainer);
      document.getElementById('statsContainer' + i).appendChild(stats1);
      document.getElementById('statsContainer' + i).appendChild(stats2);
      document.getElementById('statsContainer' + i).appendChild(stats3);

      document.getElementById('bigcover' + i).appendChild(img);

        title = document.createTextNode(arrayResults[i].title);
        subtitle = document.createTextNode(arrayResults[i].byline);
        abstract = document.createTextNode(arrayResults[i].abstract);
      h3.appendChild(title);
      profession.appendChild(subtitle);
      textCenter.appendChild(abstract);
      document.getElementById('contentMain' + i).appendChild(h3);
      document.getElementById('contentMain' + i).appendChild(profession);
      document.getElementById('contentMain' + i).appendChild(textCenter);

        details = document.createTextNode("Details");
      h4TextCenter.appendChild(details);
      document.getElementById('contentMainb' + i).appendChild(h4TextCenter);
      document.getElementById('contentMainb' + i).appendChild(ul);
        text3 = document.createTextNode("Short URL: " + arrayResults[i].short_url);
      li1.appendChild(text1);
      li2.appendChild(text2);
      li3.appendChild(text3);
      document.getElementById('ul' + i).appendChild(li1);
      document.getElementById('ul' + i).appendChild(li2);
      document.getElementById('ul' + i).appendChild(li3);
      document.getElementById('contentMainb' + i).appendChild(statsContainer);
      document.getElementById('statsContainer' + i).appendChild(stats1);
      document.getElementById('statsContainer' + i).appendChild(stats2);
      document.getElementById('statsContainer' + i).appendChild(stats3);
        hh1 = document.createTextNode(arrayResults[i].published_date.substring(0, 10));
        hh2 = document.createTextNode(arrayResults[i].section);
        hh3 = document.createTextNode(arrayResults[i].item_type);
        pp1 = document.createTextNode("Date");
        pp2 = document.createTextNode("Section");
        pp3 = document.createTextNode("Type");
      h41.appendChild(hh1);
      h42.appendChild(hh2);
      h43.appendChild(hh3);
      p1.appendChild(pp1);
      p2.appendChild(pp2);
      p3.appendChild(pp3);
      document.getElementById('stats1' + i).appendChild(h41);
      document.getElementById('stats1' + i).appendChild(p1);
      document.getElementById('stats2' + i).appendChild(h42);
      document.getElementById('stats2' + i).appendChild(p2);
      document.getElementById('stats3' + i).appendChild(h43);
      document.getElementById('stats3' + i).appendChild(p3);
    }
  }).fail(function(err) {
  throw err;
  });
}
