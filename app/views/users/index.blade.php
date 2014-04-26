<div class="row">
  <div class="small-8 large-centered columns">
    <h3>Send someone a link</h3>
      <div class="row">
        <ul class="users-list">
          @foreach ($users as $user)
            <li class="individual-card">
              <a href="{{$user->id}}/show" class="usernames">
              {{$user->firstname}} {{$user->lastname}} 
              </a>
            </li>
          @endforeach
        </ul>
      </div>
  </div>
</div>
<script>
$(document).ready(function(){
  var $container = $('.users-list');
  // init
  $container.isotope({
    // options
    itemSelector: '.individual-card',
    layoutMode: 'masonry'
  });
});
</script>
