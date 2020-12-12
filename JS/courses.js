$(document).ready(function () {
  var u = window.location.href; 
  var split = u.split("?");
  var courseName = split[1].substring(3);

  var URL = "JSON/"+courseName+"Course.json";


  loadVids();
  
  console.log(courseName);
  

  function loadVids() {
    $.getJSON(URL, function (data) {

      
      var id = data[0].snippet.resourceId.videoId;
      mainVideo(id);
      resultLoop(data);
    });
  }

  function mainVideo(id){
    $('#currentVideo').html(`
    
    <iframe
          width="100%"
          height="500px"
          src="https://www.youtube.com/embed/${id}"
          frameborder="0"
          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen>    
    </iframe>
    
    `);
  }


  function resultLoop(data)
  {

    $.each(data ,function(i,item){

      var img = item.snippet.thumbnails.medium.url;
      var title = item.snippet.title;
      var video = item.snippet.resourceId.videoId;

      $('.coursesList').append(`
  
      <div class="video" datakey="${video}">
            <div>
              <img src="${img}" alt="${title}" /></div>
            <div>
              ${title}
            </div>
        </div>
      
      `);
      
      

    });

    $(".video").click(function(){
      var id = $(this).attr('datakey');
      
      $(this).css({

        "height": "60px",
        "backgroundColor": "#1b98e0",
        "color": "#e8f1f8"

      });

      $(".video").not(this).css({

        "height": "50px",
        "backgroundColor": "#e8f1f8",
        "color" : "black"
      });
      mainVideo(id);
    });


  }
  
  
  
  // $(".coursesList").click('article',function(){
  //       var id = $(this).attr('datakey');
  //       alert(id);
  //       // mainVideo(id);
  //     });
});
