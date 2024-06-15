<!-- Modal trigger button -->
<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalId-{{ $category->id }}">
    <i class="fas fa-trash fa-xs fa-fw"></i>
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalId-{{ $category->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitle-{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="modalTitle-{{ $category->id }}">
                    Oh no!
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white">
                Are you sure to delete <strong> {{ $category->name }}</strong> category?

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>


                <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Confirm
                    </button>

                </form>


            </div>
        </div>
    </div>
</div>
