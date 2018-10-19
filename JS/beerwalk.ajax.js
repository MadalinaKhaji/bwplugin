(function($) {

  const $ENTRYTITLE = $('.entry-title');

  let content =
    '<p id="ViewAllTab" class="tabLabel"> View All Beer Walks </p>' +
    '<p id="CreateTab" class="tabLabel"> Create Beer Walk </p> <hr>' +
    '<div id="ViewAll" class="tab"><p>All</p></div>' +
    '<div id="Create" class="tab" style="display: none"><p>Create</p></div>';

  $ENTRYTITLE.after(content);

  $(".tabLabel").css({"display": "inline", "margin-right": "50px"});

  $('#ViewAllTab').click(function() {
    openTab('ViewAll');
  });

  $('#CreateTab').click(function() {
    openTab('Create');
  });

  console.info('The plugin is working properly!');
}) (jQuery);


function openTab(tabName) {
    var i;
    var x = document.getElementsByClassName("tab");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "block";
}
