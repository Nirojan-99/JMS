<div>

    <div class="d-flex flex-row border-bottom pb-2 mt-2  w-100 align-items-center justify-center">
        @yield("index")
        <div class="col-1 ">{{$category->category_id}}</div>
        <div class=" row col-11">
            <div class="col-5 ">
                <img src="{{ asset('img/images/category/' . $category->image) }}" alt="" class="cat_img_container rounded-3">
            </div>
            <div class="row col-7 align-items-center text-left   ">
                <div class="col-9 fs-base fw-semibold text-dark-subtle" style="color: #686868;">{{$category->name}}</div>
                <div class="col-3 ">
                    <div class=" row align-items-center justify-content-between gap-0 gap-xs-3">
                        <button class="col-6" style="outline: 0;border: 0;background-color: transparent;">
                            <a href="{{route('edit_categories', ['id' => $category->category_id])}}"><img src="{{ URL('img/icon/pen-solid.svg') }}" alt="" class="edit_icon"></a>
                        </button>
                        <button class="col-6" style="outline: 0;border: 0;background-color: transparent;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                            <img src="{{ URL('img/icon/trash-can-solid.svg') }}" alt="" class="trash_icon">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Alert !</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to Delete?
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{route('destroy_categories', ['id' => $category->category_id])}}">
                        @csrf
                        @method('delete')
                        <input class="btn btn-outline-primary" type="submit" value="Confirm"></input>
                    </form>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>