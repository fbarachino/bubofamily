// Rende spostabili le varie finestre

$( function() {
    $( ".resizable" ).resizable({
      handles: "se"
    });
  } );
$(".draggable").draggable();	
/*$.get('https://www.ansa.it/trentino/notizie/trentino_rss.xml', function(content) {
  // Insert the content into the specified element
  $('#contenuto').html(content);
});*/
// Load the RSS feed
