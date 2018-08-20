var admin = {
  toggle1: document.querySelector(".toggle1"),
  toggle2: document.querySelector(".toggle2"),
  admin_post: document.querySelector(".admin_post"),
  admin_comment: document.querySelector(".admin_comment"),

// événements lors d'un clic sur un bouton
buttonEvents: function(){
    var app = this;

    // toggle entre les deux sections et change la couleur des boutons 
  app.toggle1.onclick = function() {
    app.admin_post.style.display = "block";
    app.admin_comment.style.display = "none";

    app.toggle2.classList.remove('pink');
    app.toggle2.classList.add('white');

    app.toggle1.classList.remove('white');
    app.toggle1.classList.add('pink');
  }

  app.toggle2.onclick = function() {
    app.admin_comment.style.display = "block";
    app.admin_post.style.display = "none";

    app.toggle1.classList.remove('pink');
    app.toggle1.classList.add('white');

    app.toggle2.classList.remove('white');
    app.toggle2.classList.add('pink');
  }
}
}

admin.buttonEvents();
