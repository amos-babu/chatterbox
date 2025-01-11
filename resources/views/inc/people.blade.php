<!-- Button trigger modal -->
<div class="mb-3">
  <span class="material-symbols-outlined" type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
  person_add
  </span>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Start Conversation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        @foreach($users as $user)
        <div class="list-group">

              <a href="{{ url($user->id.'/chat') }}" class="list-group-item" aria-current="true">


                <div class="rounded-circle overflow-hidden me-2 float-start" style="width: 60px; height: 60px; border: 2px solid #fff;">
                    <img src="{!! asset('images/amos.png') !!}" alt="Avatar" style="width: 100%; height: 100%;">
                </div>
                <h5 class="">{{$user->username}}</h5>


              </a>

        </div>

      @endforeach

        <nav class="mt-4" aria-label="...">
          <ul class="pagination">
            <li class="page-item disabled">
              <span class="page-link">Previous</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
              <span class="page-link">2</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
