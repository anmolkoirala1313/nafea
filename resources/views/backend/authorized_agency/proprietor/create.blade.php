<!-- right offcanvas -->
<div class="offcanvas offcanvas-end offcanvas-md" tabindex="-1" id="offcanvasRight1" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <h5 id="offcanvasRightLabel">Create {{ $page }}'s Proprietor</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @include($view_path.'proprietor.includes.form',['button' => 'Create'])
    </div>
</div>
