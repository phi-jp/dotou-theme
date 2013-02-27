window.onload = function(){
  // クラスを付加
  addClass("input[type='submit']", "btn btn-primary");
  addClass(".sns_login a", "btn");
  addClass(".comment-reply-link", "btn");
  addClass(".comment-edit-link", "btn");

  function addClass(elm, cls){
    var element = tm.dom.ElementList(elm);
    element.forEach(function(e, i) {
      var tmp = e.attr.get("class");
      console.log();
      tmp += " "+cls;
      e.attr.set("class", tmp);
    });
  }
};

