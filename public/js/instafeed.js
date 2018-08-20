var userFeed = new Instafeed({
  get: 'user',
  userId: 473471489,
  limit: 9,
  accessToken: '473471489.6c9f008.6c79234a84d3424c89a78a682dce4768',
  template: '<figure class="instafeed"><img src="{{image}}" />     <a class="icon" href="{{link}}"> <i class="fab fa-instagram"></i>  </a>       </figure>'
});
  userFeed.run();
