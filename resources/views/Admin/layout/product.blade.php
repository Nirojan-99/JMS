<div class="card px-0" style="width: 17rem;">
  <a href="#" class="text-decoration-none">
    <img src="{{ asset('uploads/products/' . $product->images[0]) }}" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">{{$product->name}}</h5>
      <p class="card-text mb-1">RS {{$product->price}}</p>
      <p class="card-text mb-1 badge text-bg-info">Available : {{$product->store_available}}</p>
      <div class=" d-flex flex-row  justify-content-end gap-4 align-items-start  ">
        <a class=" mr-2 " href="{{route('edit_product',['id'=>$product->id])}}"><img src="{{ URL('img/icon/pen-solid.svg') }}" alt="" class="edit_icon"></a>
        <button type="submit" class="btn p-0 m-0 ml-2 border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <img src="{{ URL('img/icon/trash-can-solid.svg') }}" alt="" class="trash_icon">
        </button>
      </div>
    </div>
  </a>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Alert!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form method="post" action="{{route('destroy_categories', ['id' => $product->id])}}">
          @csrf
          @method('delete')
          <input class="btn btn-outline-primary" type="submit" value="Yes"></input>
        </form>
      </div>
    </div>
  </div>
</div>